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
    <title>Museum Click | Collection</title>
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
<body Style="
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

<style>
                body{
                    background-color: black;
                }
                .multi-bg{
                    width: 300px;
                    height: 300px;
                    display: block;
                    /* background-color: #808; */
                    background-image:url('assets/img/logo.svg');
                    background-repeat: no-repeat;
                    background-size: cover;
                    margin-top: 5px;
                    margin-bottom: 40px;
                    border-radius: 20px;
                }
                .positioning{
                    list-style: none;
                    display: inline-block;
                    width: 33%;
                    padding: 0;
                    /* box-shadow: 10px 10px 5px grey; */
                }
                .col{
                    background-color:pink;
                    margin-bottom: 16px;
                    padding: 1px;
                }
                .listcard{
                    list-style-type: none;
                    margin-left: 45px;
                    margin-top: 20px;
                    margin-bottom: 45px;
                    margin-right: 20px;
                    width: 380px;
                    height: 560px;
                    border-radius: 20px;
                    padding: 40px;
                    padding-right: 10px;
                    box-sizing: border-box;
                    background: #FFFFFF;
                    box-shadow: 7px 7px 10px #F27F0C;
                }
                li{
                    color: black;
                }
                a{
                    color: #F27F0C;
                }
                .title{
                    font-family:'Times New Roman', Times, serif;
                    font-weight: bold;
                }
                .contentcard{
                    margin-top: 10px;
                    margin-bottom: 10px;
                }
                button {
                    float: left;
                }
                .listjudul{
                    font-family: Crimson Pro; 
                    font-size: 15px;
                    color:#ff8000;
                  }
                  .listcontent{
                    font-family: Crimson Pro; 
                    font-size: 15px;
                    color:black;
                    padding: 0;
                  }
                  .modal-tittle{
                    padding-right: 150px;
                  }

            </style>

<div class=container>
                 <div class=rowning>
            <?php
            // $tampil = $koleksi->tampil();
            $i = 0;
            foreach($data['data'] as $row){
            ?>
                <div class="positioning">
                <ul class="listcard">
                    <li><img class="multi-bg" src="<?php echo BASEURL;?>/img/koleksi/<?php echo $data['data'][$i]->gambar; ?>" ></li>
                    <li><h1 class="title"><?php echo $data['data'][$i]->nama_koleksi; ?></h1></li>
                    <li class="contentcard"><div class="listjudul"><?php echo "Kategori: ", $data['data'][$i]->kategori; ?></div></li>
                    <li class="contentcard"><div class="listjudul"><?php echo "Tahun: ", $data['data'][$i]->tahun; ?></div></li>
                    <!-- <li class="contentcard"><a href="#">Baca Selengkapnya ></a></li> -->
                    <br><a id="lihat_koleksi" data-toggle="modal" data-target="#view" 
                            data-id="<?php echo $data['data'][$i]->id_koleksi; ?>" 
                            data-nama="<?php echo $data['data'][$i]->nama_koleksi; ?>" 
                            data-gambar="<?php echo $data['data'][$i]->gambar; ?>" 
                            data-kategori="<?php echo $data['data'][$i]->kategori; ?>" 
                            data-tahun="<?php echo $data['data'][$i]->tahun; ?>" 
                            data-detail="<?php echo $data['data'][$i]->detail_koleksi; ?>">
                            <button class="btn btn-warning btn-xs center-block"><i class="fas fa-eye"></i>Lihat Selengkapnya ></button>
                        </a>
                    </br>
                </ul>
                </div>
                <div id="view" class="modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-tittle">Detail Koleksi</h4>
                            </div>
                            <div class="modal-body table-responsive">
                                <table style="background-color: white;" class="table table-bordered no-margin">
                                        <tr>
                                            <th class="listjudul">Nama Koleksi</th>
                                            <td><span class="listcontent" id="nama_koleksi"></span></td>
                                        </tr>
                                        <tr>
                                            <th class="listjudul">Kategori</th>
                                            <td><span class="listcontent" id="kategori"></span></td>
                                        </tr>
                                        <tr>
                                            <th class="listjudul">Tahun</th>
                                            <td><span class="listcontent" id="tahun"></span></td>
                                        </tr>
                                        <tr>
                                            <th class="listjudul">Detail</th>
                                            <td><span class="listcontent" id="detail_koleksi"></span></td>
                                        </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="<?php echo BASEURL;?>/js/jquery-1.10.2.js"></script>
                <script type="text/javascript">
                    $(document).on("click", "#lihat_koleksi", function() {
                        var id_kol = $(this).data('id');
                        var nama_kol = $(this).data('nama');
                        var gambar_kol = $(this).data('gambar');
                        var kategori_kol = $(this).data('kategori');
                        var tahun_kol = $(this).data('tahun');
                        var detail_kol = $(this).data('detail');
                        $("#id_koleksi").text(id_kol);
                        $("#nama_koleksi").text(nama_kol);
                        $("#pic").attr("src", "<?php echo BASEURL;?>/img/koleksi/"+gambar_kol);
                        $("#kategori").text(kategori_kol);
                        $("#tahun").text(tahun_kol);
                        $("#detail_koleksi").text(detail_kol);
                        

                    })
                </script>
                    <?php
                    $i++;
                    }
                    ?>
                </div>
                </div>
    
    <!-- JavaScript -->
    <script src="<?php echo BASEURL;?>/js/jquery-1.10.2.js"></script>
    <script src="<?php echo BASEURL;?>/js/bootstrap.js"></script>

</body>
</html>