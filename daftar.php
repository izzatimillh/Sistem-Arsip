<?php include 'header.php'; ?>

<div class="row">
  <div class="container">
    <div class="page-header">
      <h3>Daftar <small>Pendaftaran bidik misi</small></h3>
    </div>

    <div class="col-lg-6 col-lg-offset-3">



      <?php 
      if(isset($_GET['alert'])){
        if($_GET['alert'] == "tidakterdaftar"){
          echo "<div class='alert alert-danger text-center'>Maaf! anda tidak dapat mendaftar, karena NIM anda tidak terdaftar.</div>";
        }elseif($_GET['alert'] == "foto"){
          echo "<div class='alert alert-danger text-center'>Maaf! hanya file gambar yang boleh diupload pada form foto.</div>";
        }elseif($_GET['alert'] == "terdaftar"){
          echo "<div class='alert alert-success text-center'>Selamat! Anda telah berhasil terdaftar, selanjutnya silahkan <a href='login_mahasiswa.php'>login</a>.</div>";
        }
      }
      ?>


      <form method="post" action="daftar_act.php" enctype="multipart/form-data">
        <div class="form-group">
          <label>Nama</label>
          <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap anda .." required="required">
        </div>

        <div class="form-group">
          <label>NIM</label>
          <input type="number" name="nim" class="form-control" placeholder="Masukkan NIM anda .." required="required">
        </div>

        <div class="form-group">
          <label>Fakultas</label>
          <input type="text" name="fakultas" class="form-control" placeholder="Masukkan fakultas anda .." required="required">
        </div>

        <div class="form-group">
          <label>Jurusan</label>
          <input type="text" name="jurusan" class="form-control" placeholder="Masukkan jurusan anda .." required="required">
        </div>

        <div class="form-group">
          <label>Alamat (Alamat sesuai KTP)</label>
          <textarea class="form-control" name="alamat" placeholder="Masukkan alamat lengkap anda .." required="required"></textarea>
        </div>

        <div class="form-group">
          <label>Alamat Sekarang</label>
          <textarea class="form-control" name="alamat_sekarang" placeholder="Masukkan alamat lengkap anda .." required="required"></textarea>
        </div>

        <div class="form-group">
          <label>Nomor HP/telpon</label>
          <input type="number" name="no_telpon" class="form-control" placeholder="Masukkan nomor HP ortu anda .." required="required">
        </div>

        <div class="form-group">
          <label>Nomor Whatsapp</label>
          <input type="number" name="no_wa" class="form-control" placeholder="Masukkan nomor Whatsapp anda .." required="required">
        </div>

        <div class="form-group">
          <label>Nomor HP/telpon Ortu</label>
          <input type="number" name="no_ortu" class="form-control" placeholder="Masukkan nomor HP ortu anda .." required="required">
        </div>

        <div class="form-group">
          <label>Agama</label>
          <select name="agama" class="form-control" required="required">
            <option value="Islam">Islam</option>
            <option value="Kristen">Kristen</option>
            <option value="Hindu">Hindu</option>
            <option value="Budha">Budha</option>
          </select>
        </div>

        <div class="form-group">
          <label>Foto</label>
          <input type="file" name="foto" required="required">
        </div>

        <div class="form-group">
          <label>Password</label>
          <input type="text" name="password" class="form-control" placeholder="Masukkan password anda (digunakan untuk login ke sistem) .." required="required">
        </div>

        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Ajukan Pendaftaran">
        </div>

      </form>

    </div>
  </div>
</div>


<?php include 'footer.php'; ?>
