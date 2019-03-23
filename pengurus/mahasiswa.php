<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Mahasiswa
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
            <h3 class="box-title">Mahasiswa</h3>
            <a href="mahasiswa_tambah.php" class="btn btn-info btn-sm pull-right"> <i class="fa fa-plus">Tambah</i></a>              
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">No</th>
                    <th>NIM</th>
                    <th>Nama</th>                    
                    <th width="15%">Option</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $admin = mysqli_query($koneksi,"SELECT * FROM mahasiswa");
                  while($a = mysqli_fetch_array($admin)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $a['mahasiswa_nim']; ?></td>  
                      <td><?php echo $a['mahasiswa_nama']; ?></td> 
                     
                      <td>
                      <a class="btn btn-primary btn-sm" href="mahasiswa_detil.php?id=<?php echo $a['mahasiswa_id'] ?>"><i class="fa fa-search"></i> </a>                    
                       <a class="btn btn-warning btn-sm" href="mahasiswa_edit.php?id=<?php echo $a['mahasiswa_id'] ?>"><i class="fa fa-cog"></i> </a>
                       <a class="btn btn-danger btn-sm" href="mahasiswa_hapus.php?id=<?php echo $a['mahasiswa_id'] ?>"><i class="fa fa-trash"></i></a>
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