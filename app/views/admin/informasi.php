<?php 
  if(!isset($_SESSION['email'])){
    header("location: ../public/admin/login");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>Museum Click</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo BASEURL;?>/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="<?php echo BASEURL;?>/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="">Museum Click</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li><a href="<?php echo BASEURL;?>/admin/index"><i class="fa fa-bar-chart-o"></i> Daftar Koleksi</a></li>
            <li><a href="<?php echo BASEURL;?>/admin/informasi"><i class="fa fa-table"></i> Informasi Museum</a></li>
            
            
      
            <li class="dropdown">
              <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Dropdown <b class="caret"></b></a> -->
              <!-- <ul class="dropdown-menu">
                <li><a href="#">Dropdown Item</a></li>
                <li><a href="#">Another Item</a></li>
                <li><a href="#">Third Item</a></li>
                <li><a href="#">Last Item</a></li>
              </ul> -->
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
            
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Museum Click <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo BASEURL;?>/admin/profil"><i class="fa fa-user"></i> Profil</a></li>
                <li class="divider"></li>
                <li>
                  <a href="<?php echo BASEURL;?>/logout/index"><i class="fa fa-power-off"></i>Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">
      
        
      <div class="row">
      <div class="col-lg-12">
            <h1>Informasi Museum <small>Admin</small></h1>
            <ol class="breadcrumb">
              <li><a href="?page=informasi"><i class="icon-dashboard"></i> InformasiMuseum</a></li>
              
            </ol>
        </div>
          
    
    <div class="row">
        <div class="col-lg-12">
        <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <tr>
                        
                        <th>Alamat</th>
                        <th>Gambar</th>
                        <th>Tahun</th>
                        <th width="300px">Biografi</th>
                        <th>Email</th>
                        <th>No. HP</th>
                        <th>Jam Senin</th>
                        <th>Jam Selasa</th>
                        <th>Jam Rabu</th>
                        <th>Jam Kamis</th>
                        <th>Jam Jumat</th>
                        <th>Jam Sabtu</th>
                        <th>Jam Minggu</th>
                        <th>HTM</th>
                        <th>Action</th>
                        
                    </tr>
                    <?php
                    
                    // $tampil = $informasi->tampil();
                    $i = 0;
                    foreach($data['data'] as $row){
                    ?>
                    <tr>
                    <td><?php echo $data['data'][$i]->alamat; ?></td>
                    <td align="center">
                        <img src="<?php echo BASEURL;?>/img/informasi/<?php echo $data['data'][$i]->gambarMuseum; ?>" width="70px"></td>
                    <td><?php echo $data['data'][$i]->tahun; ?></td>
                    <td><?php $cetak = substr($data['data'][$i]->biografi,0,40); 
                    if(strlen($data['data'][$i]->biografi)>40){
                    echo $cetak,"...";
                    } else{
                        echo $cetak;
                    }
                    ?></td>
                   <td><?php echo $data['data'][$i]->email; ?></td>
                   <td><?php echo $data['data'][$i]->nomorHp; ?></td>
                   <td><?php echo $data['data'][$i]->jamSenin; ?></td>
                   <td><?php echo $data['data'][$i]->jamSelasa; ?></td>
                   <td><?php echo $data['data'][$i]->jamRabu; ?></td>
                   <td><?php echo $data['data'][$i]->jamKamis; ?></td>
                   <td><?php echo $data['data'][$i]->jamJumat; ?></td>
                   <td><?php echo $data['data'][$i]->jamSabtu; ?></td>
                   <td><?php echo $data['data'][$i]->jamMinggu; ?></td>
                   <td><?php echo $data['data'][$i]->htm; ?></td>
                    <td align="center">
                        <!-- <button class="btn btn-info btn-xs"><i class="fas fa-eye"></i>Lihat</button> -->

                        <a id="edit_informasi" data-toggle="modal" data-target="#edit" data-id="<?php echo $data['data'][$i]->id_museum; ?>" data-alamat="<?php echo $data['data'][$i]->alamat; ?>" data-biografi="<?php echo $data['data'][$i]->biografi; ?>" data-email="<?php echo $data['data'][$i]->email; ?>" 
                        data-gambar="<?php echo $data['data'][$i]->gambarMuseum; ?>" data-nomor="<?php echo $data['data'][$i]->nomorHp; ?>" data-tahun="<?php echo $data['data'][$i]->tahun; ?>"  data-senin="<?php echo $data['data'][$i]->jamSenin; ?>" data-selasa="<?php echo $data['data'][$i]->jamSelasa; ?>" 
                        data-rabu="<?php echo $data['data'][$i]->jamRabu; ?>" data-kamis="<?php echo $data['data'][$i]->jamKamis; ?>" data-jumat="<?php echo $data['data'][$i]->jamJumat; ?>" data-sabtu="<?php echo $data['data'][$i]->jamSabtu; ?>" data-minggu="<?php echo $data['data'][$i]->jamMinggu; ?>" data-tiket="<?php echo $data['data'][$i]->htm; ?>">
                            <button class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</button></a>
                        <a href="<?php echo BASEURL;?>/informasi/hapus/<?php echo $data['data'][$i]->id_museum; ?>" onclick="return confirm('Are you sure you want to delete this item?')">
                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>Hapus</button>
                        </a>
                    </td>
                    </tr>
                    <?php
                    $i++;
                    }
                    ?>
                    
                </table>

            </div>
            <?php
            // $tampil2 = $informasi->tampil();
            // $data2 = $tampil2->fetch_object();
             if($data['data'] == null){

            ?>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah">Tambah informasi</button>
                <div id="tambah" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-tittle">Tambah Informasi Museum</h4>
                            </div>
                            <form action="<?php echo BASEURL;?>/informasi/tambah" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="control-label" for="alamat">Alamat</label>
                                        <input type="text" name="alamat" class="form-control" id="alamat" required>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label class="control-label" for="gambarMuseum">Gambar</label>
                                        <input type="file" name="gambarMuseum" class="form-control" id="gambarMuseum" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="tahun">Tahun</label>
                                        <input type="text" name="tahun" class="form-control" id="tahun" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="biografi">Biografi</label>
                                        <input type="text" name="biografi" class="form-control" id="biografi" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="gambar">Email</label>
                                        <input type="text" name="email" class="form-control" id="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="nomorHp">No. Telp</label>
                                        <input type="text" name="nomorHp" class="form-control" id="nomorHp" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="jamSenin">Jam Senin (contoh : 07.00-16.00, isi dengan - jika tidak ada jam buka)</label>
                                        <input type="text" name="jamSenin" class="form-control" id="jamSenin" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="jamSelasa">Jam Selasa (contoh : 07.00-16.00, isi dengan - jika tidak ada jam buka)</label>
                                        <input type="text" name="jamSelasa" class="form-control" id="jamSelasa" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="jamRabu">Jam Rabu (contoh : 07.00-16.00, isi dengan - jika tidak ada jam buka)</label>
                                        <input type="text" name="jamRabu" class="form-control" id="jamRabu" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="jamKamis">Jam Kamis (contoh : 07.00-16.00, isi dengan - jika tidak ada jam buka)</label>
                                        <input type="text" name="jamKamis" class="form-control" id="jamKamis" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="jamJumat">Jam Jumat (contoh : 07.00-16.00, isi dengan - jika tidak ada jam buka)</label>
                                        <input type="text" name="jamJumat" class="form-control" id="jamJumat" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="jamSabtu">Jam Sabtu (contoh : 07.00-16.00, isi dengan - jika tidak ada jam buka)</label>
                                        <input type="text" name="jamSabtu" class="form-control" id="jamSabtu" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="jamMinggu">Jam Minggu (contoh : 07.00-16.00, isi dengan - jika tidak ada jam buka)</label>
                                        <input type="text" name="jamMinggu" class="form-control" id="jamMinggu" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="htm">HTM (Harga Tiket Masuk)</label>
                                        <input type="text" name="htm" class="form-control" id="htm" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                    <input type="submit" class="btn btn-success" name="tambah" value="Simpan">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                        
                    </div>
                
            </div>
            <?php 
}else{
    
    ?>
    <button type="button" class="btn btn-success" data-toggle="modal" onClick="alert('Anda hanya dapat menambahkan satu informasi museum, apabila ingin mengubahnya klik tombol edit')">Tambah informasi</button>
    <?php 
    
    }
    ?>
        
        <div id="edit" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-tittle">Edit Informasi Museum</h4>
                            </div>
                            <form action="<?php echo BASEURL;?>/informasi/edit" method="post" id="form" enctype="multipart/form-data">
                                <div class="modal-body" id="modal-edit">
                                    <div class="form-group">
                                        <label class="control-label" for="alamat">Alamat</label>
                                        <input type="hidden" name="id_museum" id="id_museum">
                                        <input type="text" name="alamat" class="form-control" id="alamat" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label" for="gambarMuseum">Gambar</label>
                                        <div style="padding-bottom: 10px">
                                            <img src="" width="80px" id="pic">
                                        </div>
                                        <input type="file" name="gambarMuseum" class="form-control" id="gambarMuseum">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label" for="tahun">Tahun</label>
                                        <input type="text" name="tahun" class="form-control" id="tahun" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="biografi">Biografi</label>
                                        <input type="text" name="biografi" class="form-control" id="biografi" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="email">Email</label>
                                        <input type="text" name="email" class="form-control" id="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="nomorHp">No. Telp</label>
                                        <input type="text" name="nomorHp" class="form-control" id="nomorHp" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="jamSenin">Jam Senin (contoh : 07.00-16.00, isi dengan - jika tidak ada jam buka)</label>
                                        <input type="text" name="jamSenin" class="form-control" id="jamSenin" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="jamSelasa">Jam Selasa (contoh : 07.00-16.00, isi dengan - jika tidak ada jam buka)</label>
                                        <input type="text" name="jamSelasa" class="form-control" id="jamSelasa" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="jamRabu">Jam Rabu (contoh : 07.00-16.00, isi dengan - jika tidak ada jam buka)</label>
                                        <input type="text" name="jamRabu" class="form-control" id="jamRabu" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="jamKamis">Jam Kamis (contoh : 07.00-16.00, isi dengan - jika tidak ada jam buka)</label>
                                        <input type="text" name="jamKamis" class="form-control" id="jamKamis" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="jamJumat">Jam Jumat (contoh : 07.00-16.00, isi dengan - jika tidak ada jam buka)</label>
                                        <input type="text" name="jamJumat" class="form-control" id="jamJumat" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="jamSabtu">Jam Sabtu (contoh : 07.00-16.00, isi dengan - jika tidak ada jam buka)</label>
                                        <input type="text" name="jamSabtu" class="form-control" id="jamSabtu" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="jamMinggu">Jam Minggu (contoh : 07.00-16.00, isi dengan - jika tidak ada jam buka)</label>
                                        <input type="text" name="jamMinggu" class="form-control" id="jamMinggu" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="htm">HTM (Harga Tiket Masuk)</label>
                                        <input type="text" name="htm" class="form-control" id="htm" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-success" name="edit" value="Simpan">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <script src="<?php echo BASEURL;?>/js/jquery-1.10.2.js"></script>
                <script type="text/javascript">
                    $(document).on("click", "#edit_informasi", function() {
                        var id_kol = $(this).data('id');
                        var alamat_kol = $(this).data('alamat');
                        var gambar_kol = $(this).data('gambar');
                        var tahun_kol = $(this).data('tahun');
                        var biografi_kol = $(this).data('biografi');
                        var email_kol = $(this).data('email');
                        var nomor_kol = $(this).data('nomor');
                        var jamSenin_kol = $(this).data('senin');
                        var jamSelasa_kol = $(this).data('selasa');
                        var jamRabu_kol = $(this).data('rabu');
                        var jamKamis_kol = $(this).data('kamis');
                        var jamJumat_kol = $(this).data('jumat');
                        var jamSabtu_kol = $(this).data('sabtu');
                        var jamMinggu_kol = $(this).data('minggu');
                        var tiket_kol = $(this).data('tiket');
                        $("#modal-edit #id_museum").val(id_kol);
                        $("#modal-edit #alamat").val(alamat_kol);
                        $("#modal-edit #pic").attr("src", "<?php echo BASEURL;?>/img/informasi/"+gambar_kol);
                        $("#modal-edit #tahun").val(tahun_kol);
                        $("#modal-edit #biografi").val(biografi_kol);
                        $("#modal-edit #email").val(email_kol);
                        $("#modal-edit #nomorHp").val(nomor_kol);
                        $("#modal-edit #jamSenin").val(jamSenin_kol);
                        $("#modal-edit #jamSelasa").val(jamSelasa_kol);
                        $("#modal-edit #jamRabu").val(jamRabu_kol);
                        $("#modal-edit #jamKamis").val(jamKamis_kol);
                        $("#modal-edit #jamJumat").val(jamJumat_kol);
                        $("#modal-edit #jamSabtu").val(jamSabtu_kol);
                        $("#modal-edit #jamMinggu").val(jamMinggu_kol);
                        $("#modal-edit #htm").val(tiket_kol);
                        
                    })

                    </script>

        
        </div>
    </div>
</div>

      </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    
    <script src="<?php echo BASEURL;?>/js/bootstrap.js"></script>

  </body>
</html>