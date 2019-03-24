<?php 
include 'header.php';
include '../koneksi.php';
?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Edit Kegiatan
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
            <h3 class="box-title">Edit Data Kegiatan</h3>
            <a href="kegiatan.php" class="btn btn-info btn-sm pull-right"> <i class="fa fa-reply">Kembali</i></a>              
          </div>
          <div class="box-body">
            <form action="kegiatan_update.php" method="post">
              <?php 
              $id = $_GET['id'];              
              $data = mysqli_query($koneksi, "select * from kegiatan where kegiatan_id='$id'");
              while($d = mysqli_fetch_array($data)){
                ?>
                <div class="form-group">
                  <label>Judul</label>
                  <input type="text" class="form-control" name="judul" value="<?php echo $d['kegiatan_judul'] ?>" required="required">
                  <input type="hidden" class="form-control" name="id" value="<?php echo $d['kegiatan_id'] ?>" required="required">
                </div>
                <div class="form-group">
                  <label>Tanggal</label>
                  <input type="date" class="form-control" name="tanggal" value="<?php echo $d['kegiatan_tanggal'] ?>">
                </div>  
                <div class="form-group">
                  <label>Keterangan</label>
                  <textarea name="keterangan" class="form-control" id="editor1"><?php echo $d['kegiatan_keterangan']; ?></textarea>
                </div>                
                <div class="form-group">
                  <input type="submit" class="btn btn-sm btn-primary" value="Simpan">
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