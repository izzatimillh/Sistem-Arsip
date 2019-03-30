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
            <a href="kegiatan.php" class="btn btn-info btn-sm pull-right">Kembali</a>    
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">No</th>                    
                    <th>Mahasiswa</th>                    
                    <th>Keterangan</th>                   
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $id_kegiatan = $_GET['id'];
                  $data = mysqli_query($koneksi, "select * from absen_kegiatan,mahasiswa where absen_kegiatan='$id_kegiatan' and absen_mahasiswa=mahasiswa_id");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $d['mahasiswa_nama']; ?></td>
                      <td><?php echo $d['absen_keterangan']; ?></td>
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