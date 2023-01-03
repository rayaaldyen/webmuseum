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
    <title>Museum Click | About</title>
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
  <body
    style="
      background: url(http://localhost/webmuseum/public/img/bgok.png) no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size:125%;
    "
  >
  <?php
    include_once 'nav.php';
    ?>
    <section class="py-5 positioning" id="About">
        <div class="container my-5">
          <div class="row justify-content-left">
            <div class="col-lg-6 justify-content-left style" style="height: 288px;">
              <div style="padding:18px;">
                 <!-- <h2 style="font-family: Crimson Pro;color:#d9d9d9; padding-top: 50px; ">
                  Museum Brawijaya</h2> -->
                  <?php
                        
                        // $tampil = $informasi->tampil();
                        $i = 0;
                        foreach($data['data'] as $row){
                        ?>

                        <div style="padding-left: 30px;">
                            <img src="<?php echo BASEURL;?>/img/informasi/<?php echo $data['data'][$i]->gambarMuseum; ?>" width="500px" height="250px">
                        </div>

                <!-- <p class="lead" style="font-family: Crimson Pro;color:#d9d9d9;padding-bottom: 55px;">
                  Informasi mengenai kami
                </p> -->
              </div>
            </div>
            <div class="col-lg-6 justify-content-end rectangle" style="margin-left: 660px; opacity:100%;">
              <div class="row ">
                <div class="col" style="color:white;padding-right:70px; opacity:1.0;"> 
                <p style="font-family: Crimson Pro; font-size: 25px; padding-top: 20px; color:black;">
                  Harga Tiket
                  <p style="font-family: Crimson Pro; font-size: 23px;color:#ff8000; margin-top: -20px;">
                  <?php echo "Rp.",$data['data'][$i]->htm; ?></p>
               </tr>
               <p style="font-family: Crimson Pro; font-size: 25px; margin-top: 15px; color:black;">
                Alamat
                <p style="font-family: Crimson Pro; font-size: 23px;color:#ff8000; margin-top: -20px; ">
                <?php echo $data['data'][$i]->alamat; ?></p>
               </p>
                        
                </div>

                <div class="col" >
                <style>
                  .listjam{
                    font-family: Crimson Pro; 
                    font-size: 23px;
                    color:#ff8000;
                  }
                  .listhari{
                    font-family: Crimson Pro; 
                    font-size: 25px;
                    color:black;
                    padding: 0;
                  }
                </style> 
                <div class="col"style="font-family: Crimson Pro;font-size: 10px;color:#ff8000;">
                  <div class="listhari">Senin</div> <div class="listjam"><?php echo $data['data'][$i]->jamSenin; ?></div> 
                  <div class="listhari">Rabu</div> <div class="listjam"><?php echo $data['data'][$i]->jamSelasa; ?></div>
                  <div class="listhari">Selasa</div> <div class="listjam"><?php echo $data['data'][$i]->jamRabu; ?></div> 
                  <div class="listhari">Kamis</div> <div class="listjam"><?php echo $data['data'][$i]->jamKamis; ?></div>

                </div>
               </div>
               <div class="col">
                  <div class="listhari">Jumat</div> <div class="listjam"><?php echo $data['data'][$i]->jamJumat; ?></div>
                  <div class="listhari">Sabtu</div> <div class="listjam"><?php echo $data['data'][$i]->jamSabtu; ?></div>
                  <div class="listhari">Minggu</div> <div class="listjam"><?php echo $data['data'][$i]->jamMinggu; ?></div>
               </div>
            </div>
          </div>


        </section>

    <!-- JavaScript -->
    <script src="<?php echo BASEURL;?>/js/jquery-1.10.2.js"></script>
    <script src="<?php echo BASEURL;?>/js/bootstrap.js"></script>

    <?php
    $i++;
                      }
                        ?>

  </body>
</html>