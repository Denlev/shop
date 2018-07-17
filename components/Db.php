<?php

class Db
{
    function getConnection(){
        $host = "localhost";
        $user = "root";
        $password = "";
        $db_name = "shop";

        $db = new mysqli($host,$user,$password,$db_name);
        $db->set_charset('utf8');

        return $db;

    }

}