<?php
class Project extends AppModel {

	var $name = 'Project';
	var $useTable = 'projects';

	var $validate = array(
		'id' => array('_extract'),
		'name' => array(
            'rule' => 'alphanumeric',
            'required' => true,
            'message' => 'Please enter an UpperCamelCased name (no spaces or punctuation and first letter of each word capitalized)'
        ), 
		'client_id' => VALID_NOT_EMPTY,
        'language' => array(
            'rule' => 'alphanumeric',
            'required' => true,
            'message' => 'Please select an option'
        ), 
        'dns_dev' => array(
            'rule' => 'url',
            'message' => 'Please enter a valid URL (i.e. google.com)'
        ), 
        'dns_proto' => array(
            'rule' => 'url',
            'message' => 'Please enter a valid URL (i.e. google.com)'
        ), 
		'database_name' => VALID_NOT_EMPTY,
		'subversion_url' => array(
            'rule' => 'url',
            'message' => 'Please enter a valid SVN URL (i.e. svn.cmdpdx.com/svn/projects/CMD/ProjectTool)'
        ), 
		'wiki_url' => array(
            'rule' => 'url',
            'message' => 'Please enter a valid Wiki URL'
        ), 
	);


    function getNewProjectEmployees($mantis_project_id, $project_id, $employees_id_arr) {
        $sql = "SELECT id FROM employees_projects where project_id=".$project_id;
        $existing_employees = $this->query($sql);

        return $existing_employees;
    }













	var $hasMany = array(
			'JobCode' => array('className' => 'JobCode',
								'foreignKey' => 'project_id',
								'dependent' => false,
								'conditions' => '',
								'fields' => '',
								'order' => '',
								'limit' => '',
								'offset' => '',
								'exclusive' => '',
								'finderQuery' => '',
								'counterQuery' => ''
			)
	);

	var $hasAndBelongsToMany = array(
			'Employee' => array('className' => 'Employee',
						'joinTable' => 'employees_projects',
						'foreignKey' => 'project_id',
						'associationForeignKey' => 'employee_id',
						'unique' => true,
						'conditions' => '',
						'fields' => '',
						'order' => '',
						'limit' => '',
						'offset' => '',
						'finderQuery' => '',
						'deleteQuery' => '',
						'insertQuery' => ''
			)
	);

	var $belongsTo = array(
			'Client' => array('className' => 'Client',
								'foreignKey' => 'client_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);

}
?>
