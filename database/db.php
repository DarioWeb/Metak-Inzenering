<?php

class db
{
    protected function connect(){
        try {
            $username = "root";
            $password = "";
            $db = new PDO("mysql:dbname=stankovski;host=localhost",$username,$password);
            return $db;
        }
        catch (PDOException $e){
            die("COnnection error: ".$e);
        }
    }
}
