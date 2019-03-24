<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Tambah Absen Kegiatan
      <small>Data Absen Kegiatan</small>
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
            <h3 class="box-title">Tambah Absen Kegiatan</h3>
            <a href="setting_absen.php" class="btn btn-info btn-sm pull-right"> Kembali</a> 
          </div>
          <div class="box-body">
            <form action="setting_absen_act.php" method="post">              
              <div class="form-group">
                <label>Jenis Kegiatan</label>
                <select class="form-control" name="kegiatan">                  
                  <?php 
                  $id = $_GET['id'];
                  $kegiatan = mysqli_query($koneksi, "select * from kegiatan where kegiatan_id='$id'");
                  while($k = mysqli_fetch_array($kegiatan)){
                    ?>
                    <option value="<?php echo $k['kegiatan_id'] ?>"><?php echo $k['kegiatan_judul']; ?></option>
                    <?php
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label>Pilih Mahasiswa</label>
                <div class="form-control">
                  <?php 
                  $mhs = mysqli_query($koneksi, "select * from mahasiswa");
                  while($m = mysqli_fetch_array($mhs)){
                    if($m['mahasiswa_nama']!=null){
                      ?>
                      <?php echo "( ".$m['mahasiswa_nim']." )". $m['mahasiswa_nama']; ?>
                      <input type="checkbox" name="mahasiswa[]" value="<?php echo $m['mahasiswa_id'] ?>">
                      <?php
                    }                  
                  }
                  ?>    
                </div>      
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