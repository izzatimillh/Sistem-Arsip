<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Absensi
      <small>Data Absensi Mahasiswa</small>
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
            <h3 class="box-title">Absensi</h3>
            <a href="setting_absen.php" class="btn btn-info btn-sm pull-right"> Kembali</a>
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <form action="setting_absen_update.php" method="POST">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Nama</th>
                      <th>Keterangan</th>                    
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    include '../koneksi.php';
                    $id = $_GET['id'];
                    $absen = mysqli_query($koneksi,"SELECT * FROM absen_kegiatan,mahasiswa where absen_kegiatan='$id' and absen_mahasiswa=mahasiswa_id");
                    while($k = mysqli_fetch_array($absen)){
                      ?>
                      <tr>                        
                        <td>
                          <input type="text" name="id" value="<?php echo $id; ?>">
                          <input type="text" name="mahasiswa[]" value="<?php echo $k['mahasiswa_id']; ?>">
                          <?php echo "( ".$k['mahasiswa_nim']." ) ". $k['mahasiswa_nama']; ?>
                        </td> 
                        <td>
                          <select class="form-control" name="keterangan[]">
                            <option <?php if($k['absen_keterangan']=="alpa"){echo"selected='selected'" ;} ?> value="alpa">Apla</option>
                            <option <?php if($k['absen_keterangan']=="hadir"){echo"selected='selected'" ;} ?> value="hadir">Hadir</option>
                          </select>
                        </td>   
                        <td>

                        </td>                                           
                      </tr>
                      <?php 
                    }
                    ?>

                  </tbody>
                </table>
                <input type="submit" value="Absen" class="btn btn-primary">
              </form>
            </div>
          </div>

        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>