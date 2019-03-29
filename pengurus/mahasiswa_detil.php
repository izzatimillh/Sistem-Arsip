<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Mahasiswa
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
            <h3 class="box-title">Mahasiswa</h3>
            <a href="mahasiswa.php" class="btn btn-info btn-sm pull-right"> Kembali</a>
          </div>
          <div class="box-body">
            <form class="form-horizontal">
              <?php 
              $id = $_GET['id'];
              $data = mysqli_query($koneksi,"SELECT * FROM mahasiswa WHERE mahasiswa_id='$id'");
              while ($d = mysqli_fetch_array($data)) {
                ?>
                <div class="form-group">
                  <label class="col-sm-2 control-label">NIM</label>
                  <div class="col-sm-10">
                    <input type="number" disabled class="form-control" value="<?php echo $d['mahasiswa_nim'] ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" disabled class="form-control" value="<?php echo $d['mahasiswa_nama'] ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Fakultas</label>
                  <div class="col-sm-10">
                    <input type="text" disabled class="form-control" value="<?php echo $d['mahasiswa_fakultas'] ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Jurusan</label>
                  <div class="col-sm-10">
                    <input type="text" disabled class="form-control" value="<?php echo $d['mahasiswa_jurusan'] ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-10">
                    <textarea disabled class="form-control"><?php echo $d['mahasiswa_alamat']; ?></textarea>                   
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Alamat Saat Ini</label>
                  <div class="col-sm-10">
                    <textarea disabled class="form-control"><?php echo $d['mahasiswa_alamat_sekarang']; ?></textarea>                   
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nomer Telpon</label>
                  <div class="col-sm-10">
                    <input type="text" disabled class="form-control" value="<?php echo $d['mahasiswa_no_telpon'] ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nomer Whatsapp</label>
                  <div class="col-sm-10">
                    <input type="text" disabled class="form-control" value="<?php echo $d['mahasiswa_no_wa'] ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nomer Orang Tua</label>
                  <div class="col-sm-10">
                    <input type="text" disabled class="form-control" value="<?php echo $d['mahasiswa_no_ortu'] ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Agama</label>
                  <div class="col-sm-10">
                    <input type="text" disabled class="form-control" value="<?php echo $d['mahasiswa_agama'] ?>">
                  </div>
                </div>                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Foto</label>
                  <div class="col-sm-10">
                    <img src="../gambar/mahasiswa/<?php echo $a['mahasiswa_foto'] ?>" width="60" height="80">
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