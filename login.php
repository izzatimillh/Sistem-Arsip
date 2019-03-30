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
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="index.php"><b>Bidikmisi</b>APP</a>
    </div>
    <center>
      <h3>Sistem Informasi Manajemen Beasiswa Bidikmisi</h3>
    </center>

    <?php 
    if(isset($_GET['alert'])){
      if($_GET['alert'] == "gagal"){
        echo "<div class='alert alert-danger'>Login gagal! username dan password salah!</div>";
      }else if($_GET['alert'] == "logout"){
        echo "<div class='alert alert-success'>Anda telah berhasil logout</div>";
      }else if($_GET['alert'] == "belum_login"){
        echo "<div class='alert alert-warning'>Anda harus login untuk mengakses halaman admin</div>";
      }
    }
    ?>

    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">LOGIN PENGURUS / PEMBINA</p>

      <form action="cek_login.php" method="POST">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Username" name="username" required="required" autocomplete="off">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="password" required="required" autocomplete="off">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <select name="sebagai" required="required" class="form-control">
            <option value="">Login Sebagai ?</option>
            <option value="pengurus">Pengurus (admin)</option>
            <option value="pembina">Pembina</option>
          </select>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <a href="index.php">Kembali</a>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <?php 

       ?>

    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery 3 -->
  <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="assets/plugins/iCheck/icheck.min.js"></script>
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
      });
    });
  </script>
</body>
</html>
