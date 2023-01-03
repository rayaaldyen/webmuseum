<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Museum Click | Home</title>
    <!-- Favicon
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" /> -->
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?php echo BASEURL;?>/css/style.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins&display=swap"
      rel="stylesheet"
    />
</head>
<body style="
      background: url(http://localhost/webmuseum/public/img/bgok.png) no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size:125%;
    ">
    <?php
    include_once 'nav.php';
    ?>
    
    <section class="py-5 positioning" id="Home">
        <div class="container my-5">
          <div class="row justify-content-left">
            <div class="col-lg-6 justify-content-left style" style ="padding-top:85px">
              <div style ="padding-top:0px">
              <h2 style="font-family: Crimson Pro; color: #d9d9d9; font-size:40px;">
                SELAMAT DATANG
              </h2>
              <h2 style="font-family: Crimson Pro; color: #d9d9d9; font-size :40px;">
                DI MUSEUM BRAWIJAYA
              </h2>
              <p class="mb-0" style="font-family: Crimson Pro; color: #d9d9d9; font-size:30px;">
                <?php
                  // $tampil = $informasi->tampil();
                  $i = 0;  
                  foreach($data['data'] as $row){
                  ?>
                <div class="col-lg-10 positioning center" style="font-family: Crimson Pro; color: #d9d9d9; font-size:12px;">
                  <?php echo $data['data'][$i]->biografi;?>
                  </div></p>
              </div>
            </div>
                 <div class="col-lg-5 justify-content-end style">
              <div class="row ">
                <div class="col">
                <img src="<?php echo BASEURL;?>/img/informasi/<?php echo $data['data'][$i]->gambarMuseum; ?>"width="670px" height="350px">
               </div>
            </div>
            <?php
                $i++;
                }?>
          </div>
        </section>


            <!-- JavaScript -->
    <script src="<?php echo BASEURL;?>/js/jquery-1.10.2.js"></script>
    <script src="<?php echo BASEURL;?>/js/bootstrap.js"></script>
    
    </body>
</html>