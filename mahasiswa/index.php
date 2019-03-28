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
        if($_GET['alert'] == "update"){
          echo "<div class='alert alert-success text-center'>Profil telah diupdate.</div>";
        }
      }
      ?>

      <!-- quick email widget -->
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
           <table class="table table-bordered">
             <tr>
               <th width="25%">NIM</th>
               <td><?php echo $aa['mahasiswa_nim']; ?></td>
             </tr>
             <tr>
               <th>Nama Lengkap</th>
               <td><?php echo $aa['mahasiswa_nama']; ?></td>
             </tr>
             <tr>
               <th>Fakultas</th>
               <td><?php echo $aa['mahasiswa_fakultas']; ?></td>
             </tr>
             <tr>
               <th>Jurusan</th>
               <td><?php echo $aa['mahasiswa_jurusan']; ?></td>
             </tr>
             <tr>
               <th>Alamat</th>
               <td><?php echo $aa['mahasiswa_alamat']; ?></td>
             </tr>
             <tr>
               <th>Alamat Sekarang</th>
               <td><?php echo $aa['mahasiswa_alamat_sekarang']; ?></td>
             </tr>
             <tr>
               <th>No. Telepon</th>
               <td><?php echo $aa['mahasiswa_no_telpon']; ?></td>
             </tr>
             <tr>
              <th>No. WhatsApp</th>
              <td><?php echo $aa['mahasiswa_no_wa']; ?></td>
            </tr>
            <tr>
             <th>No. Ortu</th>
             <td><?php echo $aa['mahasiswa_no_ortu']; ?></td>
           </tr>
           <tr>
             <th>Agama</th>
             <td><?php echo $aa['mahasiswa_agama']; ?></td>
           </tr>
           <tr>
             <th>Username</th>
             <td><?php echo $aa['mahasiswa_username']; ?></td>
           </tr>
         </table>

         <a href="profil_edit.php" class="btn btn-primary pull-right">Edit Profil</a>
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