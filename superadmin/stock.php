<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Laporan Stock
      <small>Laporan Stock</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12 connectedSortable">

        <?php 
        if(isset($_GET['alert'])){
          if($_GET['alert'] == "import"){
            echo "<div class='alert alert-success'><b>".$_GET['berhasil']."</b> data berhasil diimport.</div>";
          }else  if($_GET['alert'] == "gagal"){
            echo "<div class='alert alert-danger'>Data gagal diimport. file yang diizinkan adalah .xls/.xlsx/.csv</div>";
          }else  if($_GET['alert'] == "sudahimport"){
            echo "<div class='alert alert-danger'>Data gagal diimport. Karena anda sudah melakukan import data hari ini.</div>";
          }else  if($_GET['alert'] == "salahformat"){
            echo "<div class='alert alert-danger'>Data gagal diimport. Karena format excel tidak sesuai.</div>";
          }
        }
        ?>

        <div class="box box-info">
          <div class="box-header">

           <h3 class="box-title">Laporan Stock (<b>Semua Section</b>)</h3>

           <!-- <a class="btn btn-sm btn-primary pull-right" href="stock_tambah.php"><i class="fa fa-plus"></i> Tambah Admin</a> -->

           <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#lap_stock"><i class="fa fa-plus"></i> Import Excel</button>

           <!-- Modal -->
           <div id="lap_stock" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Import Excel</h4>
                </div>
                <div class="modal-body">

                  <br/>
                  <br/>
                  <p>Silahkan upload file laporan stock excel.</p>
                  <p class="text-danger">File yang diizinkan hanya file excel (.xls, .xlsx, .csv)</p>
                  <br/>

                  <form action="stock_import.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Tanggal</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="tanggal" autocomplete="off" class="form-control pull-right" id="datepicker" required="required">
                      </div>
                    </div>
                    <br/>
                    <div class="form-group">
                      <label>File Excel</label>
                      <input type="file" name="filestock" required="required">
                    </div>
                    <br/>
                    <div class="form-group">

                      <label>Section</label>
                      <select class="form-control" name="section" required="required">
                        <option value="">Pilih Section</option>
                        <?php 
                        $section = mysqli_query($koneksi,"SELECT * FROM section");
                        while($s = mysqli_fetch_array($section)){
                          ?>
                          <option value="<?php echo $s['section_id'] ?>"><?php echo $s['section_desc'] ?></option>
                          <?php 
                        }
                        ?>
                      </select>
                    </div>
                    <br/>
                    <input type="submit" value="Import" class="btn btn-primary">
                  </form>


                  <br/>
                  <br/>
                  <br/>


                </div>
                <div class="modal-footer">
                  <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button> -->
                </div>
              </div>

            </div>
          </div>

        </div>

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
      <table class="table table-bordered table-striped" id="table-datatable">
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
            <th width="11%">OPSI</th>
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
                echo "<b class='text-danger'>".$s['stock_qty_variant']."</b>";

                    // $variant = $s['stock_qty_actual'] - $s['stock_qty_theory'];
                    // if($variant != 0){
                    //   echo "<b class='text-danger'>".$variant."</b>";
                    // }else{
                    //   echo $variant;
                    // }
                          // echo $s['stock_qty_variant']; 
              }
              ?>
              <?php 
                // if($s['stock_qty_actual'] == 0){
                //   echo "-";
                // }else{
                //   $variant = $s['stock_qty_actual'] - $s['stock_qty_theory'];
                //   if($variant != 0){
                //     echo "<b class='text-danger'>".$variant."</b>";
                //   }else{
                //     echo $variant;
                //   }
                //           // echo $s['stock_qty_variant']; 
                // }
              ?>
            </td>
            <td><?php echo date('d-m-Y',strtotime($s['stock_date'])); ?></td>
            <td><?php echo $s['stock_idouhyo_no']; ?></td>
            <td>
              <a class="btn btn-sm btn-warning" href="stock_edit.php?id=<?php echo $s['stock_id']; ?>"><i class="fa fa-wrench"></i> EDIT</a>
              <a class="btn btn-sm btn-danger" href="stock_hapus.php?id=<?php echo $s['stock_id']; ?>"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
          <?php 
        }
        ?>
      </tbody>
    </table>
  </div>
</div>

</div>
</section>
</div>
</section>

</div>
<?php include 'footer.php'; ?>