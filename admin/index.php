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
            $section = mysqli_query($koneksi,"SELECT * FROM section");
            ?>
            <h3><?php echo mysqli_num_rows($section); ?></h3>

            <p>Section</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
           <?php 
           $admin = mysqli_query($koneksi,"SELECT * FROM admin");
           ?>
           <h3><?php echo mysqli_num_rows($admin); ?></h3>

           <p>Admin Section</p>
         </div>
         <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="admin.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
         <?php 
         $stock = mysqli_query($koneksi,"SELECT * FROM stock");
         ?>
         <h3><?php echo mysqli_num_rows($stock); ?></h3>

         <p>Stock Record</p>
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
         $is = $_SESSION['section'];
         $sec = mysqli_query($koneksi,"SELECT * FROM section WHERE section_id='$is'");
         $ss = mysqli_fetch_assoc($sec);
         $stock = mysqli_query($koneksi,"SELECT * FROM stock WHERE stock_section='$is'");
         ?>
        <h3><?php echo mysqli_num_rows($stock); ?></h3>

        <p>Stock <b><?php echo $ss['section_desc']; ?></b></p>
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
  <section class="col-lg-7">


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
           <th>Hak Akses Level</th>
           <td>
             <?php 
             $x = $_SESSION['id'];
             $ad = mysqli_query($koneksi,"SELECT * FROM admin,section WHERE id='$x' and section=section_id");
             $aa = mysqli_fetch_assoc($ad);
             ?>
             <span class="label label-success">Admin Section</span> <span class="label label-warning"><?php echo $aa['section_sect_id']; ?> - <?php echo $aa['section_desc']; ?></span></td>
           </tr>
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