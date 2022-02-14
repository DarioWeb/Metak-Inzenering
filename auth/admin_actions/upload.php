<?php
session_start();
if (isset($_POST['submit'])){

    $file = $_FILES['fileToUpload'];
    $type = strip_tags($_POST['img_type']);

    include "../../database/db.php";
    include "uploadControl.php";
    $upload = new uploadControl($file,$type);
    $upload->upload();
}