<?php include 'header.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-lg-9">

       <?php 
       if(isset($_GET['alert'])){
        if($_GET['alert'] == "foto"){
          echo "<div class='alert alert-danger text-center'>Maaf! hanya file gambar yang boleh diupload pada form foto.</div>";
        }
      }
      ?>

      <?php 
      $id = $_SESSION['id'];
      $profil = mysqli_query($koneksi,"SELECT * FROM mahasiswa WHERE mahasiswa_id='$id'");
      $profil = mysqli_fetch_assoc($profil);
      ?>
      <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">Data Mahasiswa, Selamat Datang!</h3>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-lg-3">

              <?php if($aa['mahasiswa_foto']!="" && file_exists("../gambar/mahasiswa/".$aa['mahasiswa_foto'])){ ?>
                <img style="width: 100%;height: auto;" src="../gambar/mahasiswa/<?php echo $aa['mahasiswa_foto']; ?>" class="thumbnail">
              <?php }else{ ?>
                <img style="width: 100%;height: auto;" src="../assets/dist/img/avatar5.png" class="thumbnail">
              <?php } ?>

            </div>
            <div class="col-lg-9">
              <form action="profil_update.php" method="POST" enctype="multipart/form-data">
                <table class="table table-bordered">
                  <tr>
                    <th width="25%">NIM</th>
                    <td><input type="number" name="mahasiswa_nim" class="form-control" required="required" value="<?php echo $aa['mahasiswa_nim']; ?>"></td>
                  </tr>
                  <tr>
                    <th>Nama Lengkap</th>
                    <td><input type="text" name="mahasiswa_nama" class="form-control" required="required" value="<?php echo $aa['mahasiswa_nama']; ?>"></td>
                  </tr>
                  <tr>
                    <th>Fakultas</th>
                    <td><input type="text" name="mahasiswa_fakultas" class="form-control" required="required" value="<?php echo $aa['mahasiswa_fakultas']; ?>"></td>
                  </tr>
                  <tr>
                    <th>Jurusan</th>
                    <td><input type="text" name="mahasiswa_jurusan" class="form-control" required="required" value="<?php echo $aa['mahasiswa_jurusan']; ?>"></td>
                  </tr>
                  <tr>
                    <th>Alamat</th>
                    <td><input type="text" name="mahasiswa_alamat" class="form-control" required="required" value="<?php echo $aa['mahasiswa_alamat']; ?>"></td>
                  </tr>
                  <tr>
                    <th>Alamat Sekarang</th>
                    <td><input type="text" name="mahasiswa_alamat_sekarang" class="form-control" required="required" value="<?php echo $aa['mahasiswa_alamat_sekarang']; ?>"></td>
                  </tr>
                  <tr>
                    <th>No. Telepon</th>
                    <td><input type="number" name="mahasiswa_no_telpon" class="form-control" required="required" value="<?php echo $aa['mahasiswa_no_telpon']; ?>"></td>
                  </tr>
                  <tr>
                    <th>No. WhatsApp</th>
                    <td><input type="number" name="mahasiswa_no_wa" class="form-control" required="required" value="<?php echo $aa['mahasiswa_no_wa']; ?>"></td>
                  </tr>
                  <tr>
                    <th>No. Ortu</th>
                    <td><input type="number" name="mahasiswa_no_ortu" class="form-control" required="required" value="<?php echo $aa['mahasiswa_no_ortu']; ?>"></td>
                  </tr>
                  <tr>
                    <th>Agama</th>
                    <td>
                     <select name="mahasiswa_agama" class="form-control" required="required">
                      <option <?php if($aa['mahasiswa_agama'] == "Islam"){echo "selected='selected'";} ?> value="Islam">Islam</option>
                      <option <?php if($aa['mahasiswa_agama'] == "Kristen"){echo "selected='selected'";} ?> value="Kristen">Kristen</option>
                      <option <?php if($aa['mahasiswa_agama'] == "Hindu"){echo "selected='selected'";} ?> value="Hindu">Hindu</option>
                      <option <?php if($aa['mahasiswa_agama'] == "Budha"){echo "selected='selected'";} ?> value="Budha">Budha</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <th>Foto</th>
                  <td>
                    <input type="file" name="mahasiswa_foto" accept="image/*">
                    <small>Kosongkan jika tidak ingin mengubah foto.</small>
                  </td>
                </tr>
                <tr>
                  <th>Username</th>
                  <td><input type="text" name="mahasiswa_username" class="form-control" required="required" value="<?php echo $aa['mahasiswa_username']; ?>"></td>
                </tr>
                <tr>
                  <th>Password</th>
                  <td>
                    <input type="password" name="mahasiswa_password" class="form-control" placeholder="Password ..">
                    <small>Kosongkan jika tidak ingin mengubah password.</small>
                  </td>
                </tr>
              </table>

              <input type="submit" class="btn btn-primary pull-right" value="Simpan Perubahan">

            </form>
          </div>
        </div>
      </div>
      <br/>
    </div>


  </section>
  <!-- /.Left col -->
</div>
<!-- /.row (main row) -->
</section>
<!-- /.content -->
</div>
<?php include 'footer.php'; ?>