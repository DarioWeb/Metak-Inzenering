<?php

if (isset($_POST['submit'])){

    $name = strip_tags($_POST['name']);
    $phone = strip_tags($_POST['phone']);
    $email = strip_tags($_POST['email']);
    $msg = strip_tags($_POST['msg']);

    include "../database/db.php";
    include "send_email_class.php";
    $mail = new send_email_class($name,$phone,$email,$msg);

    $mail->send_mail();

}else{
    header("location:../");
}
//  m(fwB_~_qZA]39T%