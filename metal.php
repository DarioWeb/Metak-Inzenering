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

<div class="metal_hero">
    <center>
        <h1>Metal Industry</h1>
        <p>
            Stankovski deals with the manufacture of metal structures, machine overhauls, repairs, and any other type of machine and metal industry
        </p>
    </center>
</div>

<br>
<br>
<div class="metal_boxes_group">

    <div class="container">
        <div class="metal_box">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <center>
                            <img width="100%" src="images/masina.jpg" alt="">
                        </center>
                    </div>
                    <div class="col-md-6">
                        <div class="metal_box_txt">
                            <center>
                                <h2>machine maintenance and overhauls</h2>
                                <br>
                                <br>
                                <p>
                                    Stankovski deals with maintenance of locksmith machines and any other type of machines in the machine industry.
                                </p>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="metal_box">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <center>
                            <img style="float: left"  width="50%" src="images/skali.jpg" alt="">
                            <img style="float: right" width="50%" src="images/skali2.jpg" alt="">
                        </center>
                    </div>
                    <div class="col-md-6">
                        <div class="metal_box_txt">
                            <center>
                                <h2>Metal constructions</h2>
                                <br>
                                <br>
                                <p>
                                    Stankovski deals with the construction of metal structures of any kind.                             </p>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="metal_box">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <center>
                            <img width="100%" src="images/gelenderi.jpg" alt="">
                        </center>
                    </div>
                    <div class="col-md-6">
                        <div class="metal_box_txt">
                            <center>
                                <h2>Small metal constructions</h2>
                                <br>
                                <br>
                                <p>
                                    Stankovski also makes smaller metal structures such as fences, eaves, garages and other smaller metal products.                             </p>
                            </center>
                        </div>
                    </div>
                </div>
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

            $sql = $pvc->gallery("metal");


          if (!$sql){
              echo "<center><h2 style='color: white' >There is not images!</h2></center>";
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
                          <img width="100%" src="auth/admin_actions/<?php echo $row['url'] ?>" alt="stankovski_metal">
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
<script>
    function show_image(el){
        let source = el.getAttribute("src");
        document.getElementById("modal_prifil_img").src = source;
    }
</script>

<?php include "includes/footer.php"; ?>
</body>
</html>
