<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>      
      <small>Edit Data Keuangan</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">       
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Edit Keuangan</h3>
            <a href="keuangan.php" class="btn btn-info btn-sm pull-right">Kembali</a> 
          </div>
          <div class="box-body">
            <form action="keuangan_update.php" method="post">
              <?php 
              include '../koneksi.php';
              $id = $_GET['id'];
              $data = mysqli_query($koneksi, "select * from keuangan where keuangan_id='$id'");
              while($d = mysqli_fetch_array($data)){
                ?>

                <div class="form-group">
                  <label>Tanggal</label>
                  <input type="hidden" class="form-control" name="id" value="<?php echo $d['keuangan_id'] ?>">
                  <input type="date" class="form-control" name="tanggal" value="<?php echo $d['keuangan_tanggal'] ?>" required="required">
                </div> 
                <div class="form-group">
                  <label>Keterangan</label>
                  <input type="text" class="form-control" name="keterangan" value="<?php echo $d['keuangan_keterangan'] ?>" required="required">
                </div>
                <div class="form-group">
                  <label>Jenis Transaksi</label>
                  <select class="form-control" name="jenis">
                   <option value="">Pilih</option>
                   <option <?php if($d['keuangan_jenis']=="Pemasukan"){echo "selected='selected'";} ?> value="Pemasukan">Pemasukan</option>
                   <option <?php if($d['keuangan_jenis']=="Pengeluaran"){echo "selected='selected'";} ?> value="Pengeluaran">Pengeluaran</option>
                 </select>
               </div>
               <div class="form-group">
                <label>Jumlah</label>
                <input type="number" class="form-control" name="jumlah" value="<?php if($d['keuangan_jenis']=="Pemasukan"){echo $d['keuangan_debit'];}else if($d['keuangan_jenis']=="Pengeluaran"){echo $d['keuangan_kredit'];} ?>" required="required">
              </div>
              <?php
            }

            ?>



            <div class="form-group">
              <input type="submit" class="btn btn-sm btn-primary" value="Simpan">
            </div>
          </form>
        </div>

      </div>
    </section>
  </div>
</section>

</div>
<?php include 'footer.php'; ?>