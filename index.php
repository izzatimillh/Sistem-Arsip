<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Stock Monitoring</title>
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

  <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-red sidebar-mini">

  <?php 
  session_start();
  include 'koneksi.php';
  ?>

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <!-- <span class="logo-mini"><b>A</b>LT</span> -->
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Stock</b>APP</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar">

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li>
            <a href="login.php"><i class="fa fa-lock"></i> &nbsp; ADMIN</a>
          </li>
          <li>
            <a href="superadmin.php"><i class="fa fa-lock"></i> &nbsp; SUPERADMIN</a>
          </li>
        </ul>
      </div>

    </nav>
  </header>

  <div class="row">
    <div class="container-fluid">

      <section class="content-header text-center">
        <h1 class="text-bold">Laporan Stock</h1>
        <h4>Qty Actual VS Qty Theory</h4>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <!-- /.box -->
            <div class="box">

              <!-- /.box-header -->
              <div class="box-body">

                <div class="row">
                  <div class="col-lg-3">
                   <form method="get" action="">
                    <label>Tanggal</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <?php 
                      if(isset($_GET['tanggal'])){
                        $tgl = $_GET['tanggal'];
                      }else{
                        $tgl = date('d/m/Y');
                      }
                      ?>
                      <input type="text" value="<?php echo $tgl; ?>" name="tanggal" autocomplete="off" class="form-control pull-right" id="datepicker2" required="required">
                    </div>
                    <label>Section</label>
                    <div class="form-group">
                      <select class="form-control" name="section">
                        <option value="">Semua Section</option>
                        <?php 
                        $section = mysqli_query($koneksi,"SELECT * FROM section");
                        while($s = mysqli_fetch_array($section)){
                          ?>
                          <option <?php if(isset($_GET['section'])){ if($_GET['section'] == $s['section_id']){echo "selected='selected'";} } ?> value="<?php echo $s['section_id'] ?>"><?php echo $s['section_desc'] ?></option>
                          <?php 
                        }
                        ?>
                      </select>
                    </div>  
                    <div class="form-group">
                     <input class="btn btn-primary" type="submit" value="Filter">
                   </div>
                 </form>
               </div>

               <div class="col-lg-4 col-lg-offset-2">
                <?php 
                if(isset($_GET['tanggal'])){
                  $tanggal = $_GET['tanggal'];
                  $t = explode("/", $tanggal);
                  $tanggal = $t[2].'-'.$t[1].'-'.$t[0];
                  $tanggal = date('Y-m-d',strtotime($tanggal));
                }else{
                  $tanggal = date('Y-m-d');
                }

                if(isset($_GET['section'])){
                  if($_GET['section'] != ""){
                    $section = $_GET['section'];
                    $stock = mysqli_query($koneksi,"SELECT SUM(stock_qty_theory) as total_theory, SUM(stock_qty_actual) as total_actual, SUM(stock_qty_variant) as total_variant FROM stock,section WHERE stock_section=section_id AND stock_section='$section' AND DATE(stock_date)='$tanggal' ORDER BY stock_id DESC");
                  }else{
                    $stock = mysqli_query($koneksi,"SELECT SUM(stock_qty_theory) as total_theory, SUM(stock_qty_actual) as total_actual, SUM(stock_qty_variant) as total_variant FROM stock,section WHERE stock_section=section_id AND DATE(stock_date)='$tanggal' ORDER BY stock_id DESC");
                  }
                }else{
                  $stock = mysqli_query($koneksi,"SELECT SUM(stock_qty_theory) as total_theory, SUM(stock_qty_actual) as total_actual, SUM(stock_qty_variant) as total_variant FROM stock,section WHERE stock_section=section_id AND DATE(stock_date)='$tanggal' ORDER BY stock_id DESC");
                }
                $total = mysqli_fetch_assoc($stock);
                ?>
                <table class="table table-bordered">
                  <tr>
                    <th width="50%">QTY Theory</th>
                    <td>
                      <?php 
                      if($total['total_theory'] != ""){
                        echo number_format($total['total_theory']);
                      }else{
                        echo "0";
                      }
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <th>QTY Actual</th>
                    <td>
                      <?php 
                      if($total['total_actual'] != ""){
                        echo number_format($total['total_actual']);
                      }else{
                        echo "0";
                      }
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <th>QTY Variant</th>
                    <td>
                      <?php 
                      if($total['total_variant'] != ""){
                        echo number_format($total['total_theory'] - $total['total_actual']);
                      }else{
                        echo "0";
                      }
                      ?>
                    </td>
                  </tr>
                </table>
              </div>
            </div>

            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="exampl">
                <thead>
                  <tr>
                    <th width="1%">No</th>
                    <th>Item Code</th>
                    <th>Section</th>
                    <th>Loc Code</th>
                    <th>Process Code</th>
                    <th>Qty Theory</th>
                    <th>Qty Actual</th>
                    <th>Qty Variant</th>
                    <th>Date</th>
                    <th>Idouhyo No</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;

                  if(isset($_GET['tanggal'])){
                    $tanggal = $_GET['tanggal'];
                    $t = explode("/", $tanggal);
                    $tanggal = $t[2].'-'.$t[1].'-'.$t[0];
                    $tanggal = date('Y-m-d',strtotime($tanggal));
                  }else{
                    $tanggal = date('Y-m-d');
                  }

                  if(isset($_GET['section'])){
                    if($_GET['section'] != ""){
                      $section = $_GET['section'];
                      $stock = mysqli_query($koneksi,"SELECT * FROM stock,section WHERE stock_section=section_id AND stock_section='$section' AND DATE(stock_date)='$tanggal' ORDER BY stock_id DESC");
                    }else{
                      $stock = mysqli_query($koneksi,"SELECT * FROM stock,section WHERE stock_section=section_id AND DATE(stock_date)='$tanggal' ORDER BY stock_id DESC");
                    }
                  }else{
                    $stock = mysqli_query($koneksi,"SELECT * FROM stock,section WHERE stock_section=section_id AND DATE(stock_date)='$tanggal' ORDER BY stock_id DESC");
                  }
                  while($s = mysqli_fetch_array($stock)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $s['stock_item_code']; ?></td>
                      <td><?php echo $s['section_desc']; ?></td>
                      <td><?php echo $s['stock_loc_code']; ?></td>
                      <td><?php echo $s['stock_process_code']; ?></td>
                      <td><?php echo $s['stock_qty_theory']; ?></td>
                      <td><?php echo $s['stock_qty_actual']; ?></td>
                      <td>
                        <?php 
                        if($s['stock_qty_actual'] == 0){
                          echo "-";
                        }else{
                         $variant = $s['stock_qty_actual'] - $s['stock_qty_theory'];
                         if($variant != 0){
                          echo "<b class='text-danger'>".$variant."</b>";
                        }else{
                          echo $variant;
                        }
                          // echo $s['stock_qty_variant']; 
                      }
                      ?>
                    </td>
                    <td><?php echo date('d-m-Y',strtotime($s['stock_date'])); ?></td>
                    <td><?php echo $s['stock_idouhyo_no']; ?></td>
                  </tr>
                  <?php 
                }
                ?>
              </tbody>
            </table>
          </div>

        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>

<footer class="text-center">
  <strong>Copyright &copy; 2019.</strong> All rights reserved.
</footer>

</div>
</div>


<!-- jQuery 3 -->
<script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->

<!-- daterangepicker -->
<script src="assets/bower_components/moment/min/moment.min.js"></script>
<script src="assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script src="assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })

  $('#datepicker2').datepicker({
    autoclose: true,
    format: 'dd/mm/yyyy',
  });
</script>
</body>
</html>
