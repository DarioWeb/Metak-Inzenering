<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php include "includes/includes.php"; ?>
</head>
<body>
<?php include "includes/header.php"; ?>


<div class="pvc_txt">
    <h1>PVC Carpentry</h1>
    <br>
    <center>
        <p>
            WE HAVE OUR OWN PRODUCTION FOR PVC CARPENTRY SO YOU CAN ORDER A WINDOW OR DOOR ACCORDING TO YOUR OWN MEASURES. WE WORK WITH MORE PLASTIC PROFILES WHICH YOU CAN SEE BELOW. OUR PRODUCTS ARE OF TOP AND GUARANTEED QUALITY.
        </p>
    </center>
</div>


<div class="container">
    <div class="profils">

        <div class="profil_box">
            <div class="row">
                <div class="col-md-6">
                    <img  data-bs-toggle="modal" data-bs-target="#profils" onclick="show_image(this)" width="100%" src="images/salamander.jpg" alt="">
                </div>
                <div class="col-md-6">
                    <center>
                        <h1>Salamander</h1>
                        <br>
                        <p>
                            SALAMANDER is a German production with 5 chamber profile, also its average width is 70mm. Salamander is one of the highest quality profiles as well.
                        </p>
                    </center>
                </div>
            </div>
        </div>

        <div class="profil_box">
            <div class="row">
                <div class="col-md-6">
                    <img  data-bs-toggle="modal" data-bs-target="#profils" onclick="show_image(this)" width="100%" src="images/weiss.jpg" alt="">
                </div>
                <div class="col-md-6">
                    <center>
                        <h1>weiss</h1>
                        <br>
                        <p>
                            WEISS is an Austrian production with 3/5 chamber profile, also its average width is 70mm-5 chamber profile and 60mm 3 chamber profile Weiss has a very shiny and quality profile                        </p>
                    </center>
                </div>
            </div>
        </div>



        <div class="profil_box">
            <div class="row">
                <div class="col-md-6">
                    <img  data-bs-toggle="modal" data-bs-target="#profils" onclick="show_image(this)" width="100%" src="images/wingo.jpg" alt="">
                </div>
                <div class="col-md-6">
                    <center>
                        <h1>wingo</h1>
                        <br>
                        <p>
                            WINGO German production with 5 chamber profile, also its average width is 70mm Wingo is quite a shiny and quality profile                        </p>
                    </center>
                </div>
            </div>
        </div>

    </div>
</div>


<!-- The Modal -->
<div class="modal fade" id="profils">
    <div class="modal-dialog">
        <div class="modal-content">



            <!-- Modal body -->
            <div class="modal-body">

                <img width="100%" id="modal_prifil_img" src="" alt="">

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<div class="pvc_gallery">
    <center>
        <h1>Our Gallery</h1>
    </center>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">

            <?php

            include "actions/fetch_data/data_gallery.php";

            $pvc = new data_gallery();

            $sql = $pvc->gallery("pvc");


              if (!$sql){
                  echo "<center><h2 style='color: #fff' >There is not images!</h2></center>";
              }else{
                  while ($row = $sql->fetch(PDO::FETCH_ASSOC)){
                      if ($row['ext'] == "mp4"){
                          ?>
                          <div style="margin-bottom: 15px" class="col-md-4">
                              <video width="100%" controls>
                                  <source src="auth/admin_actions/<?php echo $row['url'] ?>" type="video/mp4">
                                  Your browser does not support the video tag.
                              </video>
                          </div>
                          <?php
                      }else{
                          ?>
                          <div style="margin-bottom: 15px" class="col-md-4">
                              <img width="100%" src="auth/admin_actions/<?php echo $row['url'] ?>" alt="stankovski_pvc">
                          </div>
                          <?php
                      }
                  }

              }

            ?>

        </div>
    </div>

    <br>
    <br>
    <br>
</div>


<?php include "includes/footer.php"; ?>

<script>
    function show_image(el){
        let source = el.getAttribute("src");
        document.getElementById("modal_prifil_img").src = source;
    }
</script>
</body>
</html>
