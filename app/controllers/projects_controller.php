<?php
class ProjectsController extends AppController {

	var $name = 'Projects';

    var $components = array('ldap','svn', 'mantis', 'twiki', 'Email');

    var $helpers    = array('html','javascript','form');

    var $uses       = array('Project','Employee','JobCode');


	function index() {
		$this->Project->recursive = 0;
		$this->set('projects', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Project.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('project', $this->Project->read(null, $id));
	}


    function add() {
        $employees = $this->Project->Employee->find('list', array('order' => 'common_name ASC'));
        $this->set('employees', $employees);

        $clients = $this->Project->Client->find('list', array('order' => 'name ASC'));
        $this->set('clients', $clients);

        if (!empty($this->data)) {
            #print_r($this->data);die;
            if ($this->Project->JobCode->validates($this->data) && $this->Project->save($this->data)) {
                $this->data['JobCode']['project_id'] = $this->Project->id;
                $this->data['JobCode']['initial'] = 1;

                # create subversion project
                $project = $this->data['Project'];
                $client_name = $this->Project->Client->field('name', 'id='.$this->data['Project']['client_id']);
                $svn_url = $this->svn->create_project($this->data['JobCode']['code'], $project['name'], $client_name, PROJECTS_REPO);
                $this->Project->saveField('subversion_url', $svn_url);

                
                # create mantis project and add users
                if (isset($this->data['Project']['mantis_project'])) {
                    $mantis_project_id = $this->mantis->pt_project_create($project['name'], $this->data['JobCode']['description']);
                    $this->Project->saveField('mantis_project_id', $mantis_project_id);

                    # add users
                    foreach($this->data['Employee']['Employee'] as $i => $employee_id) {
                        $employee = $this->Employee->read(null, $employee_id);
                        $mantis_user_id = $employee['Employee']['mantis_user_id'];
                        $this->mantis->pt_project_add_user( $mantis_project_id, $mantis_user_id );
                    }
                }

                if (isset($this->data['Project']['wiki'])) {
                    # create wiki topic
					$topic_name = $this->data['JobCode']['code'];
					$this->twiki->add_project_to_client($client_name, $this->data);
                    $this->Project->saveField('wiki_url', '/Clients/' . $this->data['JobCode']['code']);
                }

                $this->JobCode->save($this->data['JobCode']);

                $this->Session->setFlash('Project has been successfully created');
                $this->redirect('/projects/edit/'.$this->Project->id);
                exit(0);

            } else {
                // either JobCode model validation failed or project didn't save, this is pointless, but harmless if project didn't save, otherwise JobCode validation failed so it never got to try to save the project so need to validate the project model 
                $this->Project->validates($this->data);
            }
                
        }
    }

    function edit($id = null) {
        $this->set('id',$id);
        $this->Project->id = $id;

        $clients = $this->Project->Client->find('list', array('order' => 'name ASC'));
        $this->set('clients', $clients);
        $this->set('selected_client', $this->Project->field('client_id'));

        $employees = $this->Project->Employee->find('list', array('order' => 'common_name ASC'));
        $this->set('employees', $employees);

        if (empty($this->data)) {
            $this->data = $this->Project->read();
            $this->data['JobCode'] = $this->data['JobCode'][0];
        } else {
            #print_r($this->data);die;
            $this->set('selected_client', $this->data['Project']['client_id']);
            if( $this->Project->save($this->data)) {

                # update mantis project/employee relationships (don't have to worry about projects db -- adds/removes automatically with save)
                # for now we're just going to remove all users and readd the ones we want, later should do a union of something
                $mantis_project_id = $this->Project->field('mantis_project_id', 'id='.$this->Project->id);
                $this->mantis->pt_project_remove_all_users($mantis_project_id);

                foreach($this->data['Employee']['Employee'] as $i => $employee_id) {
                    $employee = $this->Employee->read(null, $employee_id);
                    $mantis_user_id = $employee['Employee']['mantis_user_id'];
                    $this->mantis->pt_project_add_user( $mantis_project_id, $mantis_user_id );
                }

                $this->Session->setFlash('Your project has been updated.');
                $this->redirect('/projects/edit/'.$this->Project->id);
                exit(0);

            }
        }

    /* Disable this until we implement security
	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Project', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Project->del($id)) {
			$this->Session->setFlash(__('Project deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}
    */
}
        













    /********** Utility Functions ***********************/

/**
 * Update employees table from LDAP and add mantis_user_id from mantis db's user table
 *
 */
    function update_employees() {
        ini_set( 'max_execution_time', 600 );
        // get all full-time employees from ldap, then link to 
        $current_ad = $this->ldap->search();
        $this->ldap->close();
        // get all contractors
        $contractors_ad = $this->ldap->search($ou='ou=Users Contractors');
        $this->ldap->close();

        $all = array_merge($current_ad, $contractors_ad);


        $employees = array();
        $cmd_groups = array('developer' => 'CN=Developers Group', 
                            'producer'  => 'CN=Producers', 
                            'account'   => 'CN=Account Services Group');


        foreach($all as $i => $employee_ad) {
            $department = 'default_reporter';

            # I should be just searching ldap with better filters...but this works.
            if (!isset($employee_ad['mail'][0])) {
                continue;
            }

            if (isset($employee_ad['mail'])) {
                if (stristr($employee_ad['distinguishedname'][0], 'Contractors')) {
                    $type = 'contractor';
                } else {
                    $type = 'employee';
                }

                # find out what department they're in
                # for now we'll just search [memberof] for keywords (all we can do with current ldap organization)
                $memberof = $employee_ad['memberof'];

                foreach ($memberof as $i => $ldap_group_str) {
                    foreach ($cmd_groups as $db_val => $ldap_val) {
                        if (stristr($ldap_group_str, $ldap_val)) {
                            $department = $db_val;
                            break 2;
                        }
                    }
                }




                $employee = array('Employee'=>array(
                                    'email'=> strtolower($employee_ad['mail'][0]), 
                                    'common_name' => $employee_ad['cn'][0],
                                    'type' => $type,
                                    'department' => $department,
                                    'title' => $employee_ad['title'][0],
                                )
                            );

                switch ($department) {
                    case 'developer':
                        $access_level = DEVELOPER;
                        break;
                    case 'producer':
                        $access_level = ADMINISTRATOR;
                        break;
                    case 'account':
                        $access_level = REPORTER;
                        break;
                    default:
                        $access_level = REPORTER;
                        break;
                }


                # Get Mantis User ID
                $email_arr = split('@', $employee['Employee']['email']);
                $username = $email_arr[0];
                $db_link = mysql_connect('localhost', MANTIS_DB_LOGIN, MANTIS_DB_PASSWORD);
                mysql_select_db(MANTIS_DB_NAME, $db_link);
                $result = mysql_query("SELECT id from mantis_user_table WHERE username='".$username."'", $db_link); 
                if (mysql_num_rows($result) == 0) {
                    # new user so add new mantis & projectTool user
                    $mantis_user_id = $this->mantis->pt_user_create($username, MANTIS_DEFAULT_PASSWD, $employee['Employee']['email'], $employee['Employee']['common_name'], $access_level);
                    $employee['Employee']['mantis_user_id'] = $mantis_user_id;

                    if ($this->Employee->save($employee)) {
                        ;
                    } else {
                        echo "Failed to save: " . $employee['Employee']['common_name'] . "\n";
                    }
                } else {
                    # current user so just update
                    $cur_id = $this->Employee->field('Employee.id', "Employee.email='" . $employee['Employee']['email'] . "'");
                    if ($cur_id) {
                        $employee['Employee']['mantis_user_id'] = $this->Employee->field('Employee.mantis_user_id', "Employee.id=".$cur_id);
                        $this->Employee->id = $cur_id;
                        $this->Employee->save($employee);
                    }
                    echo "cur_id=".$cur_id;
                }
                $this->Employee->id = null;
                        

                print_r($employee_ad);
            }
            
        }
    }

    function test() {
        if (!$this->twiki->add_project_to_client('123456', 'TestProject', 'HP')) {
            echo "error"; die;
        } else {
            echo "success"; die;
        }

    }



    /********************** UTILITY FUNCTIONS ***********************************************/
    function linkchecker_all() {
        $projects = $this->Project->findAll('linkchecker=1');
        foreach ($projects as $projects => $project) {
            $this->linkchecker($project['Project']['id']);
        }
    }

    function linkchecker($project_id) {
        # get project site link (dev or proto or live?)
        $project = $this->Project->find('Project.id='.$project_id);
        if ($project) {
            # get dev emails
            $emails = "";
            foreach($project['Employee'] as $i => $employee) {
                if ($employee['department'] == 'developer') {
                    $emails = $employee['email'] . ', ';
                }
            }

            # check site -- default to dev site
            $site = "http://" . $project['Project']['dns_dev'];
            $output = `linkchecker -o html $site`;


            # send html email
            $this->Email->template = 'email/linkchecker';
            $this->set('output', $output);
            $this->Email->from = "projectTool_noreply@cmdagency.com";
            $this->Email->fromName = "Project Tool";
            #$this->Email->to = $emails; 
            $this->Email->to = 'jaustin@cmdagency.com'; 
            $this->Email->subject = "$site - linkcheck - " . date("m-d-Y");
            $result = $this->Email->send();
            die;
        }

    }


}
?>
