<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Setting Absen
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
            <h3 class="box-title">Setting Absensi Kegiatan</h3>                    
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">No</th>                    
                    <th>Kegiatan</th>                    
                    <th>Tanggal</th>                    
                    <th>Jumlah Mahasiswa</th>                    
                    <th width="15%">Option</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $kegiatan = mysqli_query($koneksi,"SELECT * FROM kegiatan");
                  while($a = mysqli_fetch_array($kegiatan)){
                    $id = $a['kegiatan_id'];
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $a['kegiatan_judul']; ?></td>
                      <td>
                        <?php 
                        $absen = mysqli_query($koneksi, "select * from absen_kegiatan where absen_kegiatan='$id'");
                        $ab = mysqli_fetch_assoc($absen);
                        echo $ab['absen_tanggal'];
                        ?>
                      </td>
                      <td>
                        <?php 
                        $jumlah = mysqli_query($koneksi,"select * from absen_kegiatan where absen_kegiatan='$id'");
                        echo mysqli_num_rows($jumlah);
                        ?>
                      </td>
                      <td>                 
                       <a class="btn btn-warning btn-sm" href="setting_absen_tambah.php?id=<?php echo $id ?>"><i class="fa fa-plus"></i> </a>
                       <a class="btn btn-danger btn-sm" href="setting_absen_hapus.php?id=<?php echo $id ?>"><i class="fa fa-trash"></i></a>
                        <a class="btn btn-primary btn-sm" href="setting_absen_detil.php?id=<?php echo $id ?>"><i class="fa fa-search"> Absen</i></a>
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