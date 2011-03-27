<?php

class TwikiComponent
{
    function initialize(&$controller) {
       // saving the controller reference for later use
        $this->controller =& $controller;
    }

	function project_topic_create ($client, $data) {
        foreach($data as $key => $val) {
            foreach ($data[$key] as $subkey => $val) {
                $expr = "$" . $subkey . " = '" . $val . "';";
                #echo $expr . "\n<br>";
                eval($expr);
            }
        }
        /* EVAL produces: 
         * $name = 'asdfsadf';
         * $client_id = '6';
         * $language = 'php';
         * $dns_dev = 'velcro.proto.cmdpdx.com';
         * $dns_proto = 'velcro.proto.cmdpdx.com';
         * $dns_live = '';
         * $database_name = 'esaa2_test';
         * $mantis_project = '1';
         * $wiki = '1';
         * $linkchecker = '1';
         * $code = '43231';
         * $description = 'asdfasdf';
         * $project_id = '58';
         * $initial = '1';
         * $Employee = 'Array'; 
         */
        $project_name = $name;
        $department_employee = array();
        $producers = '';
        $accounts = '';
        $tech_dir = '';
        $programmers = '';
        $designers = '';
        $writers = '';
        foreach ($data['Employee']['Employee'] as $i => $id) {
            $emp = $this->controller->Employee->find('id='.$id, null, null, 0);
            $ename = $emp['Employee']['common_name'];
            $department = $emp['Employee']['department'];
            $title = $emp['Employee']['title'];

            if ($department == 'developer'){
                $programmers .= $ename . ", ";
            }
            elseif (stristr($title, 'account')) {
                $accounts .= $ename . ", ";
            }

            elseif (stristr($title, 'producer') or stristr($title, 'project')) {
                $producers .= $ename . ", ";
            }

            elseif (stristr($title, 'designer') or stristr($title, 'artist') or stristr($title, 'creative')){
                $designers .= $ename . ", ";
            }

            elseif (stristr($title, 'writer') or stristr($title, 'information')) {
                $writers .= $ename . ", ";
            }



            
        }
        $accounts = rtrim($accounts, ", ");

        $producers = rtrim($producers, ", ");

        $tech_dir = rtrim($tech_dir, ", ");

        $programmers = rtrim($programmers, ", ");

        $designers = rtrim($designers, ", ");

        $writers = rtrim($writers, ", ");

		$timestamp = mktime();
		$date = date('Y-m-d');

		$topic = <<<EOF
%META:TOPICINFO{author="JonAustin" date="$timestamp" format="1.1" reprev="1.1" version="1.1"}%
%META:TOPICPARENT{name="$client"}%
---+ $code - $project_name

---++ Team 

%TWISTY{mode="div" showlink="Show&nbsp;" hidelink="Hide&nbsp;"
showimgright="%ICONURLPATH{toggleopen-small}%" 
hideimgright="%ICONURLPATH{toggleclose-small}%"}%
   $  *Producer* : $producers
   $  *Tech Lead* : 
   $  *Technical Director* : $tech_dir
   $  *Programmer* : $programmers
   $  *Art Director* : 
   $  *Designer* : $designers
   $  *Accounts* : $accounts
   $  *Writer/IA* : $writers
%ENDTWISTY%
---++ Summary 
%TWISTY{mode="div" showlink="Show&nbsp;" hidelink="Hide&nbsp;"
showimgright="%ICONURLPATH{toggleopen-small}%" 
hideimgright="%ICONURLPATH{toggleclose-small}%"}%
   $  *Start Date* : $date
   $  *Alpha Date* : 
   $  *Beta Date* : 
   $  *Deployment Date* : 
   $  *Description* : $description
%ENDTWISTY%

---++ Technologies 
   * $language
---++ Change Log 
%TWISTY{mode="div" showlink="Show&nbsp;" hidelink="Hide&nbsp;" 
showimgright="%ICONURLPATH{toggleopen-small}%" 
hideimgright="%ICONURLPATH{toggleclose-small}%"remember="on";"}%
%EDITTABLE{ header="on" format="| row, -1 | textarea, 3x80 | date, 20, %SERVERTIME{"\$year/\$mo/\$day"}%, %Y/%m/%d | textarea, 1x20 |select, 1,pending,approved,complete| textarea, 3x40 |" changerows="on" }%
|*id*|*description*|*date*|*due*|*status*|*assigned to*|
| 1 | Change log begins  | $date |  | complete |  |
%ENDTWISTY%
---++ Additional Comments 
%COMMENT{type="belowthreadmode" button="Add Note"}%


---++ View the Projects

---++++The online address for this project's proto site is http://$dns_proto and in the iframe src
%TWISTY{mode="div" showlink="Show&nbsp;" hidelink="Hide&nbsp;"
showimgright="%ICONURLPATH{toggleopen-small}%" 
hideimgright="%ICONURLPATH{toggleclose-small}%"remember="on";"}%
<iframe src="http://$dns_proto" width="100%" height="500"></iframe>
%ENDTWISTY%
EOF;
        
		if (file_exists(WIKI_CLIENTS_PATH . $code . '.txt')) {
			return false; #"Wiki Topic with job code $job_code already exists, please enter a different job code";
		}
		
		$handle = fopen(WIKI_CLIENTS_PATH . $code.'.txt', 'w');
		fwrite($handle, $topic);

		fclose($handle);
		return true;
	}

	function client_topic_create ($client_name) {
		$timestamp = mktime();
		$date = date('Y-m-d');

		$topic = <<<EOF
---+ $client_name

---++ Client Summary

   *Contact People*:


---++ Client Projects

   * [[NewProject]]
EOF;

		if (file_exists(WIKI_CLIENTS_PATH . $client_name . '.txt')) {
			return false; 
		}
		
		$handle = fopen(WIKI_CLIENTS_PATH . $client_name.'.txt', 'w');
		fwrite($handle, $topic);

		fclose($handle);
		return true;
	}


	function client_exists($client_name) {
		#$clients = file_get_contents(WIKI_CLIENTS_PATH . 'WebHome.txt');
		#if (stristr($clients, $client_name) && file_exists(WIKI_CLIENTS_PATH . $client_name . '.txt')) {
		if (file_exists(WIKI_CLIENTS_PATH . $client_name . '.txt')) {
			return true;
		} else {
			return false;
		}
	}

	function project_exists($client_name, $job_code) {
		if (!$this->client_exists($client_name)) {
			return false;
		}

		#$projects = file_get_contents(WIKI_CLIENTS_PATH . $client_name . '.txt');
		#if (stristr($projects, "[[".$job_code."]]") && file_exists(WIKI_CLIENTS_PATH . $job_code . '.txt')) {
		if (file_exists(WIKI_CLIENTS_PATH . $job_code . '.txt')) {
			return true;
		} else {
			return false;
		}
	}

	function add_client($client_name) {
		# make sure new client doesn't already exist
		if ($this->client_exists($client_name)) {
			return false;
		}

		# make sure [[NewClient]] exists in the Clients webhome
		$clients = file_get_contents(WIKI_CLIENTS_PATH . 'WebHome.txt');
		if (!stristr($clients, "[[NewClient]]") ) {
			return false;
		}

		$clients = file_get_contents(WIKI_CLIENTS_PATH . 'WebHome.txt');
		$clients = str_ireplace("[[NewClient]]", "[[$client_name]]\n   * [[NewClient]]", $clients);

		$handle = fopen(WIKI_CLIENTS_PATH . 'WebHome.txt', 'w');
		fwrite($handle, $clients);

		fclose($handle);

		$this->client_topic_create($client_name);
		return true;
	}

	function add_project_to_client($client_name, $data) {
		# first check if <jobcode>.txt exists in client dir
        $job_code = $data['JobCode']['code'];
		if ($this->project_exists($client_name, $data['JobCode']['code'])) {
			return false;
		}

		# make sure [[NewProject]] exists in $client_name's page
		$projects = file_get_contents(WIKI_CLIENTS_PATH . $client_name . '.txt');
		if (!stristr($projects, "[[NewProject]]") ) {
			return false;
		}

		$projects = file_get_contents(WIKI_CLIENTS_PATH . $client_name . '.txt');
		$projects = str_ireplace("[[NewProject]]", "[[$job_code]]\n   * [[NewProject]]", $projects);

		$handle = fopen(WIKI_CLIENTS_PATH . $client_name . '.txt', 'w');
		fwrite($handle, $projects);

		fclose($handle);

		$this->project_topic_create($client_name, $data); 
		return true;

		
		
	}

}

?>
