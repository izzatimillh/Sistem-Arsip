<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>      
      <small>Tambah Data Keuangan</small>
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
            <h3 class="box-title">Tambah Keuangan</h3>
            <a href="keuangan.php" class="btn btn-info btn-sm pull-right">Kembali</a> 
          </div>
          <div class="box-body">
            <form action="keuangan_act.php" method="post">
              <div class="form-group">
                <label>Tanggal</label>
                <input type="date" class="form-control" name="tanggal" required="required">
              </div> 
              <div class="form-group">
                <label>Keterangan</label>
                <input type="text" class="form-control" name="keterangan" required="required">
              </div>
              <div class="form-group">
                <label>Jenis Transaksi</label>
                <select class="form-control" name="jenis">
                 <option value="">Pilih</option>
                 <option value="Pemasukan">Pemasukan</option>
                 <option value="Pengeluaran">Pengeluaran</option>
               </select>
              </div>
              <div class="form-group">
                <label>Jumlah</label>
                <input type="number" class="form-control" name="jumlah" required="required">
              </div>  

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