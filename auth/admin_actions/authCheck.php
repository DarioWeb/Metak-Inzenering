<?php

class authCheck extends db
{

    public function checkUser(){

        if (!isset($_SESSION['login']) || !$_SESSION['login'] || !isset($_SESSION['email'])){
            $_SESSION['fall'] = "You must be logged in!";
            header("location:../login.php");
        }else{
            $sql = $this->connect()->prepare("SELECT email FROM users WHERE email = ?");

            if (!$sql->execute(array($_SESSION['email']))){
                $sql = null;
                $_SESSION['fall'] = "Something went wrong!";
                header("location:../login.php");
            }

            if ($sql->rowCount() > 0){
                return true;
            }else{
                $sql = null;
                $_SESSION['fall'] = "You must be logged in!";
                header("location:../login.php");
            }

        }
    }

}