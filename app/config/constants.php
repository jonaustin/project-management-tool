<?php

if (stristr($_SERVER['SCRIPT_FILENAME'], 'ProjectTool')) { 
    // sandbox

    # Mantis DB
    define('MANTIS_PATH', '/var/www/ProjectTool_sand/app/vendors/mantis');
    define('MANTIS_DB_NAME', 'mantis_sand');
    define('MANTIS_DB_LOGIN', 'xxxxxx');
    define('MANTIS_DB_PASSWORD', 'xxxxxx');
    define('MANTIS_DEFAULT_PASSWD', 'xxxxxx');

    define('MANTIS_URL', 'http://example.com/mantis_sand');
    define('WIKI_URL', 'http://example.com/twiki_sand');
    define('WIKI_VIEW_URL', WIKI_URL . '/bin/view');
    define('WIKI_PATH', '/var/www/ProjectTool_sand/app/vendors/twiki/');
    define('WIKI_CLIENTS_PATH', WIKI_PATH . 'data/Clients/');
    define('SVN_URL', 'https://svn.example.com/svn/');
    define('PROJECTS_REPO', 'testrepo');

} else {
    // real

    # Mantis DB
    define('MANTIS_PATH', '/var/www/ProjectTool/app/vendors/mantis');
    define('MANTIS_DB_NAME', 'mantis');
    define('MANTIS_DB_LOGIN', 'xxxxxxx');
    define('MANTIS_DB_PASSWORD', 'xxxxxxx');
    define('MANTIS_DEFAULT_PASSWD', 'xxxxxxx');

    define('MANTIS_URL', 'http://bugs.example.com');
    define('WIKI_URL', 'http://projects.example.com');
    define('WIKI_VIEW_URL', WIKI_URL . '/bin/view');
    define('WIKI_PATH', '/var/www/ProjectTools/app/vendors/twiki/');
    define('WIKI_CLIENTS_PATH', WIKI_PATH . 'data/Clients/');
    define('SVN_URL', 'https://svn.example.com/svn/');
    define('PROJECTS_REPO', 'projects');
}

?>
