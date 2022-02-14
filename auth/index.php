<?php
include "admin_actions/admin_menu.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>

        .admin{
            width: 100%;
            padding: 100px 0 100px 0;
        }
    </style>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Beastly&display=swap" rel="stylesheet">
    <!--'Rubik Beastly', cursive-->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Rubik+Beastly&display=swap" rel="stylesheet">
    <!--font-family: 'Rubik Beastly', cursive;-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/responsive.css">

</head>
<body style="background-color: #0c83ef" >
<a style="margin: 10px" class="btn btn-danger" href="logOut.php">LogOut</a>
<center>
    <section style="background-color: #0c83ef" class="admin">

        <form style="margin-top: 0" class="login_form" action="admin_actions/upload.php" method="post" enctype="multipart/form-data">
            <p style="color: white" >Select image or video to upload</p>
            <input type="file" style="color: #fff" name="fileToUpload" id="fileToUpload">
            <select style="float: left;margin: 10px" name="img_type">
                <option value="pvc">Pvc</option>
                <option value="metal">Metal</option>
            </select>
            <label style="color: #fff;float: left" for="img_type">Select type of image or video</label>
            <input type="submit" value="Upload Image" name="submit">
        </form>
    </section>
</center>

<section style="background-color: aqua" class="admin">

    <?php
    include "admin_actions/contact_display.php";
    $con_dis = new contact_display();

    $row = $con_dis->display_con()->fetch(PDO::FETCH_ASSOC);

    ?>

    <center>
        <form style="margin-top: 0" action="admin_actions/con_sub.php" method="post" class="login_form"  >
            <h2>Contact Info</h2>
            <label style="color: #fff" for="phone">Your phone</label>
            <input value="<?php echo $row['phone'] ?>" type="number" name="phone" placeholder="Your Phone" required >
            <label style="color: #fff" for="email">Your email</label>
            <input value="<?php echo $row['email'] ?>" type="email" name="email" placeholder="Your Email" required >
            <label style="color: #fff" for="adresa">Your Address</label>
            <input value="<?php echo $row['adresa'] ?>" type="text" name="adresa" placeholder="Your Address" required >
            <label style="color: #fff" for="about">About us text</label>
            <input value="<?php echo $row['about'] ?>"  name="about" maxlength="300" minlength="50" required >
            <button name="submit" class="btn btn-light" >Update</button>
        </form>
    </center>

</section>

<section style="background-color: #007aff" class="admin">

   <center>
       <form action="admin_actions/login_info.php" style="margin-top: 0" method="post" class="login_form" >
            <h2>login Info</h2>
           <input type="password" name="old_psw" placeholder="Your Old Password" >
           <input type="password" name="new_psw" placeholder="Your New Password" >
           <input type="password" name="confirm" placeholder="Your Old Password" >
           <button name="submit" class="btn btn-light" >Update</button>
       </form>
   </center>

</section>


<?php
if (isset($_SESSION['fall'])){
    echo "<script>alert('".$_SESSION['fall']."')</script>";
    unset($_SESSION['fall']);
}

?>

</body>
</html>

