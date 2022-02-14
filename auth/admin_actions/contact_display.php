<?php

class contact_display extends db
{

    public function display_con(){

        $sql = $this->connect()->prepare("SELECT * FROM contact WHERE id = ?");
        if (!$sql->execute(array(1))){
            $sql = null;
            $_SESSION['fall'] = "SQL_ERROR";
            header("location:../");
        }

        if ($sql->rowCount() > 0){
            return $sql;
        }else{
          die("SQL_ERROR");
        }

    }

}