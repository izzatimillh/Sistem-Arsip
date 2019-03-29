<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Laporan Absen
      <small>Absen Kegiatan</small>
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
            <h3 class="box-title">Laporan Absensi Kegiatan</h3>                    
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">No</th>                    
                    <th>Mahasiswa</th>                    
                    <th>Hadir</th>                    
                    <th>Alpa</th>                                        
                    <th>Opsi</th>                                        
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $mahasiswa = mysqli_query($koneksi,"SELECT * FROM mahasiswa");
                  while($a = mysqli_fetch_array($mahasiswa)){
                    $id = $a['mahasiswa_id'];
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $a['mahasiswa_nama']; ?></td>

                      <td>
                        <?php 
                        $absen = mysqli_query($koneksi, "select * from absen_kegiatan where absen_mahasiswa='$id' and absen_keterangan='hadir'");
                        echo mysqli_num_rows($absen);
                        ?>
                      </td>
                      <td>
                        <?php 
                        $absen = mysqli_query($koneksi, "select * from absen_kegiatan where absen_mahasiswa='$id' and absen_keterangan='alpa'");
                        if(mysqli_num_rows($absen)>2){                          
                          echo "<p style='color:red;'>".mysqli_num_rows($absen)."</p>";
                        }else{
                          echo mysqli_num_rows($absen);             
                        }
                        ?>
                      </td>
                      <td>                                       
                        <a class="btn btn-primary btn-sm" href="absensi_detil.php?id=<?php echo $id ?>"><i class="fa fa-search"> Detail</i></a>
                      </td>

                    </tr>
                    <?php 
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>