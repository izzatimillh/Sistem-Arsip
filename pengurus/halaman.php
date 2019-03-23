<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Data halaman
      <small>Data halaman</small>
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
           <h3 class="box-title">halaman</h3>

           <a href="halaman_tambah.php" class="btn btn-info btn-sm pull-right">Buat halaman Baru</a>

         </div>

         <div class="box-body">

          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="table-datatable">
              <thead>
                <tr>
                  <th width="1%">No</th>
                  <th width="20%">Sampul</th>
                  <th>Judul halaman</th>
                  <th width="11%">OPSI</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no=1;
                $halaman = mysqli_query($koneksi,"SELECT * FROM halaman ORDER BY halaman_id DESC");
                while($k = mysqli_fetch_array($halaman)){
                  ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><img src="../gambar/halaman/<?php echo $k['halaman_sampul']; ?>" width="100px"></td>
                    <td><?php echo $k['halaman_judul']; ?></td>
                    <td>
                      <a class="btn btn-sm btn-warning" href="halaman_edit.php?id=<?php echo $k['halaman_id']; ?>"><i class="fa fa-wrench"></i></a>
                      <a class="btn btn-sm btn-danger" href="halaman_hapus.php?id=<?php echo $k['halaman_id']; ?>"><i class="fa fa-trash"></i></a>
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