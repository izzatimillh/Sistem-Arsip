<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      <small>Data Peringatan</small>
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
            <h3 class="box-title">Peringatan</h3>                      
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">No</th>
                    <th>NIM</th>
                    <th>Nama Mahasisaw</th>                    
                    <th>Jumlah Tidak Hadir</th>                                        
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $peringatan = mysqli_query($koneksi,"SELECT * FROM peringatan,mahasiswa where peringatan_mahasiswa=mahasiswa_id");
                  while($p = mysqli_fetch_array($peringatan)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $p['mahasiswa_nim']; ?></td>  
                      <td><?php echo $p['mahasiswa_nama']; ?></td>                       
                      <td>
                        <?php 
                        $id_mhs = $p['mahasiswa_id'];
                          $cek_absen = mysqli_query($koneksi,"select * from absen_kegiatan where absen_mahasiswa='$id_mhs'");
                          echo mysqli_num_rows($cek_absen);
                         ?>
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