<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Metal Inzenering Stankovski | Home</title>
    <?php
    include "includes/includes.php";
    ?>
</head>
<body>

<?php
include"includes/header.php";
include "database/db.php";
include "auth/admin_actions/contact_display.php";
$con_dis = new contact_display();

$row = $con_dis->display_con()->fetch(PDO::FETCH_ASSOC);
?>



<div class="swiper mySwiper">
    <div class="swiper-wrapper">


        <div  class="swiper-slide">

            <div style="background-image: url('images/metal_back_hero.jpg')" class="hero_content">
                <div  class="hero-c">
                    <div class="container">
                        <h2>
                            metal constructions, machine industry, machine repairs fast and quality
                        </h2>
                        <br>
                        <a class="btn2" href="#contact">Contact Us</a>
                    </div>
                </div>
            </div>


        </div>
        <div  class="swiper-slide">

            <div style="background-image: url('images/pvc_back_hero.jpg');    background-position: center;
                  " class="hero_content">
                <div  class="hero-c">
                    <div class="container">
                        <h2>
                            PVC carpentry with high quality and <br> modern design
                        </h2>
                        <br>
                        <a  class="btn2" href="#contact">Contact Us</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

</div>

<section class="about">
    <div class="container">

        <center>
            <h1>Metal-Inzenering</h1>
            <br>
            <br>
            <h2>
                Welcome to the official Metal Inzenering STANKOVSKI website. STANKOVSKI is engaged in
                the production of Metal constructions and PVC carpentry, Blinds.
            </h2>
        </center>
    </div>

</section>

<section class="services">
    <center>
        <h1 class="services_naslov" >Our Services</h1>
    </center>
    <div class="container-fluid">
        <div class="row">

            <div id="pvc" class="col-sm-6 pvc">
                <br>
                <center>
                    <img  src="images/pvc.jpg" alt="">
                    <br>
                    <br>
                    <br>
                    <h2  >Pvc carpentry</h2>
                </center>
            </div>

            <div id="metal" class="col-sm-6 metal">
                <br>
                <center>
                    <img  src="images/metal.jpg" alt="">
                    <br>
                    <br>
                    <br>
                    <h2  >Metal industry</h2>
                </center>
            </div>

        </div>
    </div>

</section>


<section class="contact" id="contact">

    <div class="container-fluid">
        <div class="row">

            <div style="background-color: #000" class="col-md-4">
                <h2 class="con_info_naslov" >Contact Info</h2>
                <div class="contact_info">
                    <div class="contact_label_info">
                        <a href="tel:<?php echo $row['phone'] ?>"><?php echo $row['phone'] ?></a>
                    </div>

                    <div class="contact_label_info">
                        <a class="home_email" href="mailto:<?php echo $row['email'] ?>"><?php echo $row['email'] ?></a>
                    </div>

                    <div class="contact_label_info">
                        <a  href="">Addresa:<?php echo $row['adresa'] ?></a>
                    </div>


                </div>

            </div>

            <div class="col-md-8">

                <div class="contact_form">
                    <h1>Contact Form</h1>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <input id="name_email" style="color: #fff" type="text" name="name" autocomplete="off" placeholder="Your name" >
                        </div>
                        <div class="col-md-6">
                            <input id="email_email" style="color: #fff" type="text" autocomplete="off" name="email" placeholder="Your email" >
                        </div>
                    </div>
                    <input id="phone_email" style="color: #fff" type="number" autocomplete="off" name="phone" placeholder="Your phone" >
                    <textarea id="msg_email" style="color: #fff" name="message" placeholder="Your message" ></textarea>
                    <button class="btn3" onclick="send_email()" style="border: none" >Send</button>
                    <br>
                    <br>
                    <p style="font-size: 19px;" class="text-danger" id="mail_error" ></p>


                </div>

            </div>

        </div>
    </div>

</section>

<script  src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="js/swiper.js"></script>
<script src="js/main.js"></script>
<script>
    document.getElementById("pvc").onclick = function (){
        window.location = "services/pvc";
    }

    document.getElementById("metal").onclick = function (){
        window.location = "services/metal";
    }


</script>
<script src="js/send_email.js"></script>
<?php include "includes/footer.php"; ?>



</body>
</html>
