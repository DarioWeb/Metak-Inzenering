<?php
include "database/db.php";

class data_gallery extends db
{

    public function gallery($where){

        $sql = $this->connect()->prepare("SELECT * FROM uploads WHERE type = ?");
        if (!$sql->execute(array($where))){
            die("Error");
        }
        if ($sql->rowCount() > 0){
            return $sql;
        }else{
            return false;
        }
    }

}