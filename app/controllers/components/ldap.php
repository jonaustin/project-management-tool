<?php

class LDAPComponent 
{
    var $conn;


    function connect($rdn='canon', $pass='Abc123', $domain='gto.cmdpdx.com') {
        $conn = ldap_connect($domain);
        ldap_set_option($conn, LDAP_OPT_PROTOCOL_VERSION, 3);
        
        $ldap_conn=ldap_bind($conn, $rdn, $pass)
                or die("Couldn't bind to GTO");
        return $conn;
    }

    function search( $ou="ou=Users Current", $filter="ObjectClass=*" ) {
        $this->conn = $this->connect();

        $result = ldap_search($this->conn, $ou.",ou=Portland,dc=cmdpdx,dc=com", $filter);  // Get all Employees
        $entries = ldap_get_entries($this->conn, $result);

        return $entries;
    }

    function close() {
        ldap_unbind($this->conn);
    }
}
