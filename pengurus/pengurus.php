<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Pengurus
      <small>Data Pengurus</small>
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
            <h3 class="box-title">Pengurus</h3>
            <a href="pengurus_tambah.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-plus">Tambah</i></a>              
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th width="15%">Foto</th>
                    <th width="15%">Option</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM pengurus");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['pengurus_nama']; ?></td>
                      <td><?php echo $d['pengurus_username']; ?></td>
                      <td>
                        <img src="../gambar/pengurus/<?php echo $d['pengurus_foto'] ?>" width="50" height="60">
                        </td>
                      <td>                        
                        <a class="btn btn-warning btn-sm" href="pengurus_edit.php?id=<?php echo $d['pengurus_id'] ?>"><i class="fa fa-cog"></i> </a>
                       <a class="btn btn-danger btn-sm" href="pengurus_hapus.php?id=<?php echo $d['pengurus_id'] ?>"><i class="fa fa-trash"></i></a>
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