<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      <small>Data Kegiatan</small>
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
            <h3 class="box-title">Kegiatan</h3>
            <a href="kegiatan_tambah.php" class="btn btn-info btn-sm pull-right"> <i class="fa fa-plus">Tambah</i></a>              
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">No</th>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Laporan Kehadiran</th>                                        
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $kegiatan = mysqli_query($koneksi,"SELECT * FROM kegiatan");
                  while($k = mysqli_fetch_array($kegiatan)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $k['kegiatan_judul']; ?></td>  
                      <td>
                        <?php 
                        $tgl_kegiatan = date('d F Y',strtotime($k['kegiatan_tanggal']));
                        echo $tgl_kegiatan;
                        ?>
                      </td>   
                      <td>
                       <a class="btn btn-primary btn-sm" href="kegiatan_absen.php?id=<?php echo $k['kegiatan_id'] ?>">Laporan </a>
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