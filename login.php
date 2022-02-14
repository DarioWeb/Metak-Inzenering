<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php include "includes/includes.php";
// poD4EzX6yHIe4^2$DtcX web psw
    ?>
</head>
<body>
<?php include "includes/header.php"; ?>



<center>
    <form action="actions/login/login_submit.php" method="post" class="login_form" >
        <h2>Login for admin</h2>
        <br>
        <input type="text" autocomplete="off" name="email" placeholder="Your Email" >
        <input type="password" autocomplete="off" name="password" placeholder="Your Password" >
        <button name="submit" class="btn btn-primary" >Login</button>

    </form>
</center>


<!--@if(Session::get("fall"))-->

<!--@endif-->

<?php

if (isset($_SESSION['fall'])){
    ?>
    <center>
        <div id="incPsw" class="alert_div">
            <?php echo $_SESSION['fall'] ?> <span id="close_alert_login" >&times;</span>
        </div>
    </center>
<?php
    unset($_SESSION['fall']);
}
//&9/X%$QM&8@?ethC db psw
?>

<script>
    document.getElementById("close_alert_login").onclick = function (){
        document.getElementById("incPsw").remove();
    }
</script>
<br>
<br>
<br>
<?php include "includes/footer.php"; ?>
</body>
</html>
