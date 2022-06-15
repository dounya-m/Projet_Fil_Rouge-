<?php

class Db
{
    // static public function connect()
    // {
    //     $db = new PDO("mysql:host=localhost, dbname=bestfriend", "root", "");

    //     $db->exec("set names utf8");

    //     $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    //     return $db;
    // }

    static public function connect(){
        
        $db = new PDO("mysql:host=localhost;dbname=bestfriend", "root", "");

        $db->exec("set names utf8");

        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
        return $db;
    }
}











?>