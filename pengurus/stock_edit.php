<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Stock
      <small>Data Stock</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-5 connectedSortable">
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Edit Stock</h3>
            <a class="btn btn-sm btn-primary pull-right" href="stock.php"><i class="fa fa-arrow-left"></i> Kembali</a>
          </div>
          <div class="box-body">

            <?php 
            $id = $_GET['id'];
            $stock = mysqli_query($koneksi,"SELECT * FROM stock WHERE stock_id='$id'");
            while($s = mysqli_fetch_array($stock)){
              ?>
              <form action="stock_update.php" method="post">
                <div class="form-group">
                  <label>Item Code</label>
                  <input type="hidden" name="id" value="<?php echo $s['stock_id'] ?>">
                  <input type="text" class="form-control" name="item_code" required="required" value="<?php echo $s['stock_item_code'] ?>" disabled='disabled'>
                </div>
                <div class="form-group">
                  <label>Section</label>
                  <select class="form-control" name="section" required="required" disabled='disabled'>
                    <option value="">Pilih Section</option>
                    <?php 
                    $section = mysqli_query($koneksi,"SELECT * FROM section");
                    while($ss = mysqli_fetch_array($section)){
                      ?>
                      <option <?php if($ss['section_id']==$s['stock_section']){echo "selected='selected'";} ?> value="<?php echo $ss['section_id'] ?>"><?php echo $ss['section_desc'] ?></option>
                      <?php 
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Loc Code</label>
                  <input type="text" class="form-control" name="loc_code" required="required" value="<?php echo $s['stock_loc_code'] ?>" disabled='disabled'>
                </div>
                <div class="form-group">
                  <label>Process Code</label>
                  <input type="text" class="form-control" name="process_code" required="required" value="<?php echo $s['stock_process_code'] ?>" disabled='disabled'>
                </div>
                <div class="form-group">
                  <label>QTY Theory</label>
                  <input type="text" class="form-control" name="qty_theory" required="required" value="<?php echo $s['stock_qty_theory'] ?>" disabled='disabled'>
                </div>
                <div class="form-group">
                  <label>QTY Actual</label>
                  <input type="text" class="form-control" name="qty_actual" required="required" value="<?php echo $s['stock_qty_actual'] ?>">
                </div>
                <div class="form-group">
                  <label>Date</label>
                  <input type="date" class="form-control" name="date" required="required" value="<?php echo $s['stock_date'] ?>" disabled='disabled'>
                </div>
                <div class="form-group">
                  <label>Idouhyo No</label>
                  <input type="text" class="form-control" name="idouhyo_no" required="required" value="<?php echo $s['stock_idouhyo_no'] ?>" disabled='disabled'>
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-sm btn-primary" value="Simpan">
                </div>
              </form>
              <?php 
            }
            ?>

          </div>

        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>