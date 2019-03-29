<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pengurus - Sistem Informasi Manajemen Beasiswa Bidikmisi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="../assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <link rel="stylesheet" href="../assets/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../assets/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../assets/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <?php 
  include '../koneksi.php';
  session_start();
  if($_SESSION['login'] != "pengurus"){
    header("location:../login.php?alert=belum_login");
  }
  ?>


</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="index.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>Bidik Misi</b> </span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Bidikmisi</b>App</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="../assets/dist/img/avatar5.png" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php echo $_SESSION['nama']; ?> - Pengurus</span>
              </a>
            </li>
            <li class="dropdown user user-menu active">
              <a href="../index.php">HALAMAN UTAMA</a>
            </li>
            <li>
              <a href="logout.php"><i class="fa fa-sign-out"></i> LOGOUT</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="../assets/dist/img/avatar5.png" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php echo $_SESSION['nama']; ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
          <li>
            <a href="index.php">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
          </li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-bullhorn"></i>
              <span>Data Informasi</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu" style="display: none;">
              <li><a href="kategori.php"><i class="fa fa-circle-o"></i> Kategori</a></li>
              <li><a href="artikel.php"><i class="fa fa-circle-o"></i> Artikel</a></li>
              <li><a href="halaman.php"><i class="fa fa-circle-o"></i> Halaman</a></li>
              <li><a href="qa.php"><i class="fa fa-circle-o"></i> Q & A</a></li>
            </ul>
          </li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-users"></i>
              <span>Data Pengguna</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu" style="display: none;">
              <li><a href="pengurus.php"><i class="fa fa-circle-o"></i> Pengurus</a></li>
              <li><a href="pembina.php"><i class="fa fa-circle-o"></i> Pembina</a></li>
              <li><a href="mahasiswa.php"><i class="fa fa-circle-o"></i> Mahasiswa</a></li>
            </ul>
          </li>
          <li>
            <a href="kegiatan.php">
              <i class="fa fa-book"></i> <span>Kegiatan</span>
            </a>
          </li>
          <li>
           <li>
            <a href="setting_absen.php">
              <i class="fa fa-book"></i> <span>Setting Absen Kegiatan</span>
            </a>
          </li>
          <li>
            <a href="keuangan.php">
              <i class="fa fa-users"></i> <span>Keuangan</span>
            </a>
          </li>
          <li>
            <a href="gantipassword.php">
              <i class="fa fa-lock"></i> <span>Ganti Password</span>
            </a>
          </li>
          <li>
            <a href="logout.php">
              <i class="fa fa-sign-out"></i> <span>Logout</span>
            </a>
          </li>
          
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
