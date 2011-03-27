<?php

class MantisComponent
{
    function MantisComponent() {
        $mantis_location = MANTIS_PATH;       # mantis installation
        
        // require_once isn't working correctly for some reason so check if a function already exists in the namespace first
        require_once( $mantis_location.DIRECTORY_SEPARATOR.'core.php' );
    }

    function pt_project_create($name, $description) {
        if (!project_is_name_unique($name)) {
            return false;
        }
        
        //note 10 = create as Status=development (there's no constant for this one)
        $project_id = project_create($name, $description, 10, VS_PRIVATE);
        
        return $project_id;
    }

    function pt_project_add_user($project_id, $mantis_user_id, $access_level='') {
        if ($access_level == '') {
            // just use default access level for this user
            $access_level = db_prepare_int( user_get_access_level ( $mantis_user_id ) );
        }

        $success = project_add_user( $project_id, $mantis_user_id, $access_level );

        return $success;
    }

    function pt_project_remove_all_users($mantis_project_id) {

        return project_remove_all_users($mantis_project_id);
    }

    function pt_user_create( $p_username, $p_password, $p_email='', $p_realname='', $p_access_level ) {
        $mantis_user_id = user_create_cmd($p_username, $p_password, $p_email, $p_access_level, false, true, $p_realname );
        return $mantis_user_id;
    }




}

























?>
