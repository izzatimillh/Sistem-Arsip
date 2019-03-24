<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Kegiatan
      <small>Data Kegiatan</small>
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
            <h3 class="box-title">Kegiatan</h3>
            <a href="kegiatan.php" class="btn btn-info btn-sm pull-right"> Kembali</a>
          </div>
          <div class="box-body">
            <form class="form-horizontal">
              <?php 
              $id = $_GET['id'];
              $data = mysqli_query($koneksi,"SELECT * FROM kegiatan WHERE kegiatan_id='$id'");
              while ($d = mysqli_fetch_array($data)) {
                ?>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Judul</label>
                  <div class="col-sm-10">
                    <input type="text" disabled class="form-control" value="<?php echo $d['kegiatan_judul'] ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Tanggal</label>
                  <div class="col-sm-10">
                    <input type="text" disabled class="form-control" value="<?php echo $d['kegiatan_tanggal'] ?>">
                  </div>
                </div>  
                <div class="form-group">
                  <label class="col-sm-2 control-label">Keterangan</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" disabled  id="editor1"> <?php echo $d['kegiatan_keterangan']; ?></textarea>
                  </div>
                </div>                
                <?php
              }
              ?>              
            </form>           
          </div>

        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>