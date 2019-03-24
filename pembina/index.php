<?php include 'header.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <?php 
            $kategori = mysqli_query($koneksi,"SELECT * FROM kategori");
            ?>
            <h3><?php echo mysqli_num_rows($kategori); ?></h3>
            <p>Kategori</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="kategori.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
           <?php 
           $artikel = mysqli_query($koneksi,"SELECT * FROM artikel");
           ?>
           <h3><?php echo mysqli_num_rows($artikel); ?></h3>
           <p>Artikel</p>
         </div>
         <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="artikel.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
         <?php 
         $pembina = mysqli_query($koneksi,"SELECT * FROM pembina");
         ?>
         <h3><?php echo mysqli_num_rows($pembina); ?></h3>
         <p>Pembina</p>
       </div>
       <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
       <?php 
       $mahasiswa = mysqli_query($koneksi,"SELECT * FROM mahasiswa");
       ?>
       <h3><?php echo mysqli_num_rows($mahasiswa); ?></h3>
       <p>Mahasiswa</p>
     </div>
     <div class="icon">
      <i class="ion ion-android-list"></i>
    </div>
    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>

</div>
<!-- /.row -->
<!-- Main row -->
<div class="row">
  <!-- Left col -->
  <section class="col-lg-12">


    <!-- quick email widget -->
    <div class="box box-info">
      <div class="box-header">

        <h3 class="box-title">Detail Login</h3>

      </div>
      <div class="box-body">
        <table class="table table-bordered">
         <tr>
           <th width="30%">Nama</th>
           <td><?php echo $_SESSION['nama']; ?></td>
         </tr>
         <tr>
           <th>Username</th>
           <td><?php echo $_SESSION['username']; ?></td>
         </tr>
         <tr>           
         </table>
       </div>

       <br/>
     </div>

   </section>
   <!-- /.Left col -->

 </div>
 <!-- /.row (main row) -->

</section>
<!-- /.content -->
</div>
<?php include 'footer.php'; ?>