<?php
session_start();
if (isset($_POST['submit'])){

    $phone = strip_tags($_POST['phone']);
    $email = strip_tags($_POST['email']);
    $adresa = strip_tags($_POST['adresa']);
    $about = strip_tags($_POST['about']);

    include "../../database/db.php";
    include "contact.php";

    $contact = new contact($phone,$email,$adresa,$about);
    $contact->update_con();


}else{
    header("location:../");
}