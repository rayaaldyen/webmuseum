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
            <h1>Daftar Koleksi <small>Admin</small></h1>
            <ol class="breadcrumb">
              <li><a href="<?php echo BASEURL;?>/admin/index"><i class="icon-dashboard"></i> Koleksi</a></li>
              
            </ol>
          </div>
        
        <div id="page-wrapper">
    
        <div class="row">
            <div class="col-lg-12">
            <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <tr>
                            <th>No</th>
                            <th>Nama Koleksi</th>
                            <th>Kategori</th>
                            <th>Tahun</th>
                            <th width="300px">Detail Koleksi</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        $i = 0;  
                        foreach($data['data'] as $row){
                        ?>
                        <?php $detail_koleksi = "aku sudah makan bro"; ?>
                        <tr>
                        <td><?php echo $i+1; ?></td>
                        <td><?php echo $data['data'][$i]->nama_koleksi; ?></td>
                        <td><?php echo $data['data'][$i]->kategori; ?></td>
                        <td><?php echo $data['data'][$i]->tahun; ?></td>
                        <td><?php $cetak = substr($data['data'][$i]->detail_koleksi,0,40); 
                        if(strlen($data['data'][$i]->detail_koleksi)>40){
                        echo $cetak,"...";
                        } else{
                            echo $cetak;
                        }
                        ?></td>
                        <td align="center">
                            <img src="<?php echo BASEURL;?>/img/koleksi/<?php echo $data['data'][$i]->gambar; ?>" width="70px"></td>
                        <td align="center">
                        <a id="lihat_koleksi" data-toggle="modal" data-target="#lihat" data-id="<?php echo $data['data'][$i]->id_koleksi; ?>" data-nama="<?php echo $data['data'][$i]->nama_koleksi; ?>" data-gambar="<?php echo $data['data'][$i]->gambar; ?>" data-kategori="<?php echo $data['data'][$i]->kategori; ?>" data-tahun="<?php echo $data['data'][$i]->tahun; ?>" data-detail="<?php echo $data['data'][$i]->detail_koleksi; ?>">
                            <button class="btn btn-info btn-xs"><i class="fas fa-eye"></i>Lihat</button></a>

                            <a id="edit_koleksi" data-toggle="modal" data-target="#edit" data-id="<?php echo $data['data'][$i]->id_koleksi; ?>" data-nama="<?php echo $data['data'][$i]->nama_koleksi; ?>" data-gambar="<?php echo $data['data'][$i]->gambar; ?>" data-kategori="<?php echo $data['data'][$i]->kategori; ?>" data-tahun="<?php echo $data['data'][$i]->tahun; ?>" data-detail="<?php echo $data['data'][$i]->detail_koleksi; ?>">
                                <button class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</button></a>
                            <a href="<?php echo BASEURL;?>/koleksi/hapus/<?php echo $data['data'][$i]->id_koleksi; ?>" onclick="return confirm('Are you sure you want to delete this item?')">
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
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah">Tambah Koleksi</button>
                <div id="tambah" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-tittle">Tambah Data Koleksi</h4>
                            </div>
                            <form action="<?php echo BASEURL;?>/koleksi/tambah" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="control-label" for="nama_koleksi">Nama Koleksi</label>
                                        <input type="text" name="nama_koleksi" class="form-control" id="nama_koleksi" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="kategori">Kategori</label>
                                        <select name="kategori" id="kategori" width ="70px">
                                        <option value='Senjata'>Senjata</option>
                                        <option value='Patung'>Patung</option>
                                        <option value='Pakaian'>Pakaian</option>
                                        <option value='Foto'>Foto</option>
                                        <option value='Lukisan'>Lukisan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="tahun">Tahun</label>
                                        <input type="text" name="tahun" class="form-control" id="tahun" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="detail_koleksi">Detail Koleksi</label>
                                        <input type="text" name="detail_koleksi" class="form-control" id="detail_koleksi" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="gambar">Gambar</label>
                                        <input type="file" name="gambar" class="form-control" id="gambar" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
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

                <div id="edit" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-tittle">Edit Data Koleksi</h4>
                            </div>
                            <form id="form" action="<?php echo BASEURL;?>/koleksi/edit" method="POST" enctype="multipart/form-data">
                                <div class="modal-body" id="modal-edit">
                                    <div class="form-group">
                                        <label class="control-label" for="nama_koleksi">Nama Koleksi</label>
                                        <input type="hidden" name="id_koleksi" id="id_koleksi">
                                        <input type="text" name="nama_koleksi" class="form-control" id="nama_koleksi" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="kategori">Kategori</label>
                                        <select name="kategori" id="kategori" width ="70px">
                                        <option value='Senjata'>Senjata</option>
                                        <option value='Patung'>Patung</option>
                                        <option value='Pakaian'>Pakaian</option>
                                        <option value='Foto'>Foto</option>
                                        <option value='Lukisan'>Lukisan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="tahun">Tahun</label>
                                        <input type="text" name="tahun" class="form-control" id="tahun" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="detail_koleksi">Detail Koleksi</label>
                                        <input type="text" name="detail_koleksi" class="form-control" id="detail_koleksi" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="gambar">Gambar</label>
                                        <div style="padding-bottom: 10px">
                                            <img src="" width="80px" id="pic">
                                        </div>
                                        <input type="file" name="gambar" class="form-control" id="gambar" accept="image/x-png,image/gif,image/jpeg,image/jpg">
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
                    $(document).on("click", "#edit_koleksi", function() {
                        var id_kol = $(this).data('id');
                        var nama_kol = $(this).data('nama');
                        var gambar_kol = $(this).data('gambar');
                        var kategori_kol = $(this).data('kategori');
                        var tahun_kol = $(this).data('tahun');
                        var detail_kol = $(this).data('detail');
                        $("#modal-edit #id_koleksi").val(id_kol);
                        $("#modal-edit #nama_koleksi").val(nama_kol);
                        $("#modal-edit #pic").attr("src", "<?php echo BASEURL;?>/img/koleksi/"+gambar_kol);
                        $("#modal-edit #kategori").val(kategori_kol);
                        $("#modal-edit #tahun").val(tahun_kol);
                        $("#modal-edit #detail_koleksi").val(detail_kol);
                        

                    })
                </script>

                <div id="lihat" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-tittle">Lihat Data Koleksi</h4>
                            </div>
                            <form id="form" enctype="multipart/form-data">
                                <div class="modal-body" id="modal-edit">
                                    <div class="form-group">
                                        <label class="control-label" for="nama_koleksi">Nama Koleksi</label>
                                        <input type="hidden" name="id_koleksi" id="id_koleksi">
                                        <input type="text" name="nama_koleksi" class="form-control" id="nama_koleksi" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="kategori">Kategori</label>
                                        <input type="text" name="kategori" class="form-control" id="kategori" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="tahun">Tahun</label>
                                        <input type="text" name="tahun" class="form-control" id="tahun" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="detail_koleksi">Detail Koleksi</label>
                                        <input type="text" name="detail_koleksi" class="form-control" id="detail_koleksi" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="gambar">Gambar</label>
                                        <div style="padding-bottom: 10px">
                                            <img src="" width="240px" id="pic">
                                        </div>
                                    </div>
                                </div>
                            </form>
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
                        $("#modal-edit #id_koleksi").val(id_kol);
                        $("#modal-edit #nama_koleksi").val(nama_kol);
                        $("#modal-edit #pic").attr("src", "<?php echo BASEURL;?>/img/informasi/"+gambar_kol);
                        $("#modal-edit #kategori").val(kategori_kol);
                        $("#modal-edit #tahun").val(tahun_kol);
                        $("#modal-edit #detail_koleksi").val(detail_kol);
                    })
                </script>
            </div>
        </div>
        
      </div>
        

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="<?php echo BASEURL;?>/js/jquery-1.10.2.js"></script>
    <script src="<?php echo BASEURL;?>/js/bootstrap.js"></script>

  </body>
</html>