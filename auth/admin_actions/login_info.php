<?php
session_start();
if (isset($_POST['submit'])){

    $old_psw = strip_tags($_POST['old_psw']);
    $new_psw = strip_tags($_POST['new_psw']);
    $confirm = strip_tags($_POST['confirm']);

    include "../../database/db.php";
    include "login_info_class.php";

    $login = new login_info_class($old_psw,$new_psw,$confirm);
    $login->loginUpd();
    $_SESSION['fall'] = "Your login info was successfully udated!";
    header("location:../");

}else{
    header("location:../");
}