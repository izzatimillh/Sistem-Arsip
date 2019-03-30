<?php include 'header.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Fitur komunikasi</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Mailbox</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-3">
        <a href="pesan_add.php" class="btn btn-primary btn-block margin-bottom">Tulis Pesan Baru</a>

        <div class="box box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">Kategori</h3>

            <div class="box-tools">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked">
              <li><a href="pesan.php"><i class="fa fa-inbox"></i>Pesan Masuk</a></li>
              <li><a href="pesan_terkirim.php"><i class="fa fa-envelope-o"></i> Pesan Keluar</a></li>
            </ul>
          </div>
          <!-- /.box-body -->
        </div>
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Tulis Pesan Baru</h3>
          </div>
          <div class="box-body">
            
            <form action="pesan_act.php" method="POST" enctype="multipart/form-data">
               <div class="form-group">
                <label>Tujuan</label>
                <select name="jenis_tujuan" class="form-control" id="pesan_pilih_tujuan" required="required">
                  <option value=""> - Pilih Tujuan - </option>
                  <option value="pembina">Pembina</option>
                  <option value="pengurus">Pengurus</option>
                  <option value="mahasiswa">Mahasiswa</option>
                </select>
              </div>

              <div class="tampil_tujuan"></div>

              <div class="form-group">
                <label>Pesan</label>
                <textarea class="form-control" style="resize: none;height: 150px" name="pesan" required="required"></textarea>
              </div>
              <div class="form-group">
                <label>Upload File (Opsional)</label>
                <input type="file" name="file">
              </div>
              <input type="submit" value="Kirim Pesan" class="btn btn-primary pull-right">
            </form>

          </div>
        </div>
        <!-- /. box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>


<?php include 'footer.php'; ?>