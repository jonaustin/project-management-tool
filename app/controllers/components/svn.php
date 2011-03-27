<?php

class SvnComponent 
{

    function create_project($job_code, $name, $client, $repo='projects') {
        $name = $job_code . "_" . $name;
        `mkdir /tmp/$name`;
        `svn import /tmp/$name/ file:///var/svn/$repo/$client/$name -m "$client::$name: initial project creation"`;
        return "$repo/$client/$name";
    }

    

}
