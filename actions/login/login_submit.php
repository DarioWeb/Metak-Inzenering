<?php
session_start();
if (isset($_POST['submit'])){

    $email = strip_tags($_POST['email']);
    $psw = strip_tags($_POST['password']);

    include "../../database/db.php";
    include "loginControl.php";

    $login = new loginControl($email,$psw);
    $login->login();

}else{
    header("location:../../login.php");
}