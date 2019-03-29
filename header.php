<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Informasi Manajemen Beasiswa Bidikmisi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <!-- Date Picker -->
  <link rel="stylesheet" href="assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  
  <link rel="stylesheet" href="assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="assets/dist/css/style.css">

  <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-red sidebar-mini">

  <?php 
  session_start();
  include 'koneksi.php';
  ?>


  <nav class="navbar navbar-default2 navbar-inverse" style="margin: 0">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">SIMABID</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
          <li><a href="#">Link</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Separated link</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">One more separated link</a></li>
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <?php 
          if(isset($_SESSION['login'])){
            if($_SESSION['login'] == "mahasiswa"){
              ?>
              <li class="user user-menu">
                <a href="mahasiswa/index.php">
                 <?php 
                 $id_mhs = $_SESSION['id'];
                 $a=mysqli_query($koneksi,"SELECT * FROM mahasiswa WHERE mahasiswa_id='$id_mhs'");
                 $aa = mysqli_fetch_assoc($a);
                 if($aa['mahasiswa_foto']!="" && file_exists("gambar/mahasiswa/".$aa['mahasiswa_foto'])){ 
                  ?>
                  <img src="gambar/mahasiswa/<?php echo $aa['mahasiswa_foto']; ?>" class="user-image">
                <?php }else{ ?>
                  <img src="assets/dist/img/avatar5.png" class="user-image">
                <?php } ?>
                <?php 
                $x = $_SESSION['id'];
                $ad = mysqli_query($koneksi,"SELECT * FROM mahasiswa WHERE mahasiswa_id='$x'");
                $aa = mysqli_fetch_assoc($ad);
                ?>
                <span class="hidden-xs">NAMA : <?php echo $aa['mahasiswa_nama']; ?> | NIM : <?php echo $aa['mahasiswa_nim']; ?></span>
              </a>
            </li>
            <?php
          }elseif($_SESSION['login'] == "pembina"){
            ?>
            <li class="user user-menu">
              <a href="pembina/index.php">
               <?php 
               $id_mhs = $_SESSION['id'];
               $a=mysqli_query($koneksi,"SELECT * FROM pembina WHERE pembina_id='$id_mhs'");
               $aa = mysqli_fetch_assoc($a);
               if($aa['pembina_foto']!="" && file_exists("gambar/pembina/".$aa['pembina_foto'])){ 
                ?>
                <img src="gambar/pembina/<?php echo $aa['pembina_foto']; ?>" class="user-image">
              <?php }else{ ?>
                <img src="assets/dist/img/avatar5.png" class="user-image">
              <?php } ?>
              <?php 
              $x = $_SESSION['id'];
              $ad = mysqli_query($koneksi,"SELECT * FROM pembina WHERE pembina_id='$x'");
              $aa = mysqli_fetch_assoc($ad);
              ?>
              <span class="hidden-xs">NAMA : <?php echo $aa['pengurus_nama']; ?> | PEMBINA</span>
            </a>
          </li>
            <?php
          }elseif($_SESSION['login'] == "pengurus"){
            ?>
            <li class="user user-menu">
              <a href="pengurus/index.php">
               <?php 
               $id_mhs = $_SESSION['id'];
               $a=mysqli_query($koneksi,"SELECT * FROM pengurus WHERE pengurus_id='$id_mhs'");
               $aa = mysqli_fetch_assoc($a);
               if($aa['pengurus_foto']!="" && file_exists("gambar/pengurus/".$aa['pengurus_foto'])){ 
                ?>
                <img src="gambar/pengurus/<?php echo $aa['pengurus_foto']; ?>" class="user-image">
              <?php }else{ ?>
                <img src="assets/dist/img/avatar5.png" class="user-image">
              <?php } ?>
              <?php 
              $x = $_SESSION['id'];
              $ad = mysqli_query($koneksi,"SELECT * FROM pengurus WHERE pengurus_id='$x'");
              $aa = mysqli_fetch_assoc($ad);
              ?>
              <span class="hidden-xs">NAMA : <?php echo $aa['pengurus_nama']; ?> | PENGURUS</span>
            </a>
          </li>
          <?php
        }
      }else{
        ?>
        <li> <a href="daftar.php"><i class="fa fa-lock"></i> &nbsp; DAFTAR</a></li>
        <li> <a href="login_mahasiswa.php"><i class="fa fa-lock"></i> &nbsp; LOGIN MAHASISWA</a></li>
        <li> <a href="login.php"><i class="fa fa-lock"></i> &nbsp; LOGIN</a></li>
        <?php
      }
      ?>
    </ul>
      <!-- <form class="navbar-form navbar-right">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form> -->
    </div>
  </div>
</div>
</nav>