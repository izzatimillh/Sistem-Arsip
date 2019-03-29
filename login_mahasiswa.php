<?php include 'header.php'; ?>

<br/>

<div class="row">
  <div class="container">
    <div class="page-header">
      <h3>Login<small> Login Mahasiswa</small></h3>
    </div>


    <div class="col-lg-4 col-lg-offset-4">

     <?php 
     if(isset($_GET['alert'])){
      if($_GET['alert'] == "gagal"){
        echo "<div class='alert alert-danger'>Login gagal! nim dan password salah!</div>";
      }else if($_GET['alert'] == "logout"){
        echo "<div class='alert alert-success'>Anda telah berhasil logout</div>";
      }else if($_GET['alert'] == "belum_login"){
        echo "<div class='alert alert-warning'>Anda harus login untuk mengakses halaman admin</div>";
      }
    }
    ?>

    <div class="login-box-body">
      <p class="login-box-msg">Login Mahasiswa</p>

      <form action="login_mahasiswa_act.php" method="POST">

        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="NIM" name="nim" required="required" autocomplete="off">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="password" required="required" autocomplete="off">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>

        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>

      </form>
    </div>

  </div>
  <!-- /.login-box -->

</div>


</div>
</div>

<?php include 'footer.php'; ?>