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
  <!-- ./col -->
</div>
<!-- /.row -->
<!-- Main row -->
<div class="row">
  <!-- Left col -->
  <section class="col-lg-7 connectedSortable">

   <div class="box box-info">
    <div class="box-header">

      <h3 class="box-title">Detail Loged In</h3>

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
         <td><span class="label label-danger">Superadmin / Administrator</span></td>
       </tr>
     </table>
   </div>

 </section>
 <!-- /.Left col -->

</div>
<!-- /.row (main row) -->

</section>
<!-- /.content -->
</div>
<?php include 'footer.php'; ?>