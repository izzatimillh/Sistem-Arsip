<?php 
include 'header.php';
include '../koneksi.php';
?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Edit Data Mahasiswa
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
            <h3 class="box-title">Edit Data Mahasiswa</h3>
            <a href="mahasiswa.php" class="btn btn-info btn-sm pull-right"> Kembali</a>
          </div>
          <div class="box-body">
            <form action="mahasiswa_update.php" method="post" enctype="multipart/form-data">
              <?php 
              $id = $_GET['id'];              
              $data = mysqli_query($koneksi, "select * from mahasiswa where mahasiswa_id='$id'");
              while($d = mysqli_fetch_array($data)){
                ?>
                <div class="form-group">
                  <label>NIM</label>
                  <input type="number" disabled class="form-control" value="<?php echo $d['mahasiswa_nim'] ?>" required="required">
                  <input type="hidden" class="form-control" name="id" value="<?php echo $d['mahasiswa_id'] ?>" required="required">
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" name="nama" value="<?php echo $d['mahasiswa_nama'] ?>" required="required">                
                </div>
                <div class="form-group">
                  <label>Fakultas</label>
                  <input type="text" class="form-control" name="fakultas" value="<?php echo $d['mahasiswa_fakultas'] ?>">                
                </div>
                <div class="form-group">
                  <label>Jurusan</label>
                  <input type="text" class="form-control" name="jurusan" value="<?php echo $d['mahasiswa_jurusan'] ?>">                
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" name="alamat"><?php echo $d['mahasiswa_alamat']; ?></textarea>                                
                </div>
                <div class="form-group">
                  <label>Alamat Sekarang</label>
                  <textarea class="form-control" name="alamat_sekarang"><?php echo $d['mahasiswa_alamat_sekarang']; ?></textarea>                                
                </div>
                <div class="form-group">
                  <label>Nomor Telpon</label>
                  <input type="text" class="form-control" name="no_telpon" value="<?php echo $d['mahasiswa_no_telpon'] ?>">                
                </div>
                <div class="form-group">
                  <label>Nomor Whatsapp</label>
                  <input type="text" class="form-control" name="no_wa" value="<?php echo $d['mahasiswa_no_wa'] ?>">                
                </div>
                <div class="form-group">
                  <label>Nomor Orang Tua</label>
                  <input type="text" class="form-control" name="no_ortu" value="<?php echo $d['mahasiswa_no_ortu'] ?>" required="required">                
                </div>
                <div class="form-group">
                  <label>Agama</label>
                  <select class="form-control" name="agama">
                    <option value="">Pilih</option>
                    <option <?php if($d['mahasiswa_agama']=="Islam"){echo "selected='selected'";} ?> value="Islam">Islam</option>
                    <option <?php if($d['mahasiswa_agama']=="Hindu"){echo "selected='selected'";} ?> value="Hindu">Hindu</option>
                    <option <?php if($d['mahasiswa_agama']=="Budha"){echo "selected='selected'";} ?> value="Budha">Budha</option>
                    <option <?php if($d['mahasiswa_agama']=="Katolik"){echo "selected='selected'";} ?> value="Katolik">Katolik</option>
                    <option <?php if($d['mahasiswa_agama']=="Kristen"){echo "selected='selected'";} ?> value="Kristen">Kristen</option>
                    <option <?php if($d['mahasiswa_agama']=="Kong Hu Chu"){echo "selected='selected'";} ?> value="Kong Hu Chu">Kong Hu Chu</option>
                  </select>
                </div>               
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" min="5" placeholder="Kosong Jika tidak ingin di ganti">                  
                </div>
                <div class="form-group">
                  <label>Foto</label>
                  <input type="file" name="foto">
                  <p>Kosong Jika tidak ingin di ganti</p>
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