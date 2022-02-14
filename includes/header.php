<?php

session_start();
if (isset($_SESSION['login']) && $_SESSION['login'] && isset($_SESSION['email'])){
    header("location:auth/");
}

?>
<style>
    .logo_img{
        width: 200px;
    }
    @media(max-width: 280px){
        .logo_img{
            width: 150px;
        }
    }
</style>
<header>
    <li><a class="logo" href="index.php"><img class="logo_img" src="images/logo1.png" alt=""></a></li>

    <nav id="nav" >
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li>
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                        Our Products
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="pvc.php">Pvc carpentry</a></li>
                        <li><a class="dropdown-item" href="metal.php">Metal ind.</a></li>
                    </ul>
                </div>
            </li>
            <li><a href="index.php#contact">Contact</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>
    <li id="hamburger" class="hamburger">
        <i class='fas fa-bars'></i>
    </li>
</header>
