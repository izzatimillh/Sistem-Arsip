<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>      
      <small>Tambah Kegiatan</small>
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
            <h3 class="box-title">Tambah Kegiatan</h3>
            <a href="kegiatan.php" class="btn btn-info btn-sm pull-right">Kembali</a> 
          </div>
          <div class="box-body">
            <form action="kegiatan_act.php" method="post">
              <div class="form-group">
                <label>Judul</label>
                <input type="text" class="form-control" name="judul" required="required">
              </div> 
              <div class="form-group">
                <label>Tanggal</label>
                <input type="date" class="form-control" name="tanggal" required="required">
              </div>  
              <div class="form-group">
                <label>Keterangan</label>
                <textarea name="keterangan" class="form-control" id="editor1"></textarea>
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