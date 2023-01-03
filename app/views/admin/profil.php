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
            <li><a href="<?php echo BASEURL;?>/informasi/index"><i class="fa fa-table"></i> Informasi Museum</a></li>
            
            
      
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
                  <a href="<?php echo BASEURL;?>/admin/informasi"><i class="fa fa-power-off"></i>Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">
      <div class="row">
      <div class="col-lg-12">
            <h1>Profil <small>Admin</small></h1>
            <ol class="breadcrumb">
              <li><a href="?page=admin"><i class="icon-dashboard"></i> Edit Password</a></li>
              
            </ol>
          </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
            <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <tr>
                            
                            <th>Id Admin</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Action</th>
                            
                        </tr>
                        <?php
                        $i = 0;
                        // $tampil = $admin->tampil();
                        foreach($data['data'] as $row){
                        ?>
                        <tr>
                        <td><?php echo $data['data'][$i]->id_admin; ?></td>
                       <td><?php echo $data['data'][$i]->email; ?></td>
                       <td type="password"><?php for ($j = 0; $j < strlen($data['data'][$i]->password); $j++) {
                        echo "*";
                        } ?></td>
                        <td align="center">
                            <!-- <button class="btn btn-info btn-xs"><i class="fas fa-eye"></i>Lihat</button> -->

                            <a id="edit_password" data-toggle="modal" data-target="#edit" data-id="<?php echo $data['data'][$i]->id_admin; ?>" data-email="<?php echo $data['data'][$i]->email; ?>" data-password="<?php echo $data['data'][$i]->password; ?>">
                                <button class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>Edit Password</button></a>
                            
                        </td>
                        </tr>
                        <?php
                        $i++;
                        }
                        ?>
                        
                    </table>

                </div>
               

                

                <div id="edit" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-tittle">Edit Password Admin</h4>
                            </div>
                            <form action="<?php echo BASEURL;?>/password/edit" method="post" id="form" enctype="multipart/form-data">
                                <div class="modal-body" id="modal-edit">
                                <div class="form-group">
                                        <input type="hidden" name="id_admin" id="id_admin">
                                        
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="email" id="email">
                                        
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="password">Password</label>
                                        <input type="password" name="password" class="form-control" id="password" required>
                                        <input type="checkbox" onclick="myFunction()">Tampilkan Password
                                        <script>
                                            function myFunction() {
                                                var x = document.getElementById("password");
                                                if (x.type === "password") {
                                                    x.type = "text";
                                                } else {
                                                    x.type = "password";
                                                }
                                            }
                                    </script>
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
                    $(document).on("click", "#edit_password", function() {
                        var id_kol = $(this).data('id');
                        var email_kol = $(this).data('email');
                        var password_kol = $(this).data('password');
                        $("#modal-edit #id_admin").val(id_kol);
                        $("#modal-edit #email").val(email_kol);
                        $("#modal-edit #password").val(password_kol);
                    })
                </script>
            </div>
        </div>


        <div id="page-wrapper">
        
      </div>
        

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="<?php echo BASEURL;?>/js/jquery-1.10.2.js"></script>
    <script src="<?php echo BASEURL;?>/js/bootstrap.js"></script>

  </body>
</html>