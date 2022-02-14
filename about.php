<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Metal Inzenering Stankovski | about</title>
    <?php include "includes/includes.php"; ?>
</head>
<body style="background-image: url('images/metal_back_hero.jpg');background-size: cover" >

<?php
include "includes/header.php";

include "database/db.php";
include "auth/admin_actions/contact_display.php";
$con_dis = new contact_display();

$row = $con_dis->display_con()->fetch(PDO::FETCH_ASSOC);

?>



<div class="container">
    <div class="about_hero">
        <center>
            <h2 class="ah_naslov" >METAL INZENERING STANKOVSKI</h2>
            <br>
            <br>
            <h2 class="ah_p" >
            <?php echo $row['about'] ?>
            </h2>
        </center>
    </div>
</div>
<br>
<br>
<br>
<style>
    footer{
       margin-top: 100px;
    }
</style>
<?php include "includes/footer.php"; ?>
</body>
</html>
