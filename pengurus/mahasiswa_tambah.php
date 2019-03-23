<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Tambah Mahasiswa
      <small>Data Mahasiswa</small>
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
            <h3 class="box-title">Tambah Mahasiswa</h3>
            <a href="mahasiswa.php" class="btn btn-info btn-sm pull-right">Kembali</a> 
          </div>
          <div class="box-body">
            <form action="mahasiswa_act.php" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>NIM</label>
                <input type="number" class="form-control" name="nim" required="required">
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