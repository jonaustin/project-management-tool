<?php
$mantis_location = "/var/www/cmd/mantis";       # mantis installation

require_once( $mantis_location.DIRECTORY_SEPARATOR.'core.php' );

project_create("test_project3", "project description", 10, 50);
#user_create('jon', 'jon', 'jaustin@cmdagency.com', null, false, true, 'jon austin' );

?>

