<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Data artikel
      <small>Data artikel Artikel</small>
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
           <h3 class="box-title">Artikel</h3>

           <a href="artikel_tambah.php" class="btn btn-info btn-sm pull-right">Tulis Artikel Baru</a>


         </div>

         <div class="box-body">

          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="table-datatable">
              <thead>
                <tr>
                  <th width="1%">No</th>
                  <th width="20%">Sampul</th>
                  <th>Judul Artikel</th>
                  <th>Kategori</th>
                  <th width="11%">OPSI</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no=1;
                $artikel = mysqli_query($koneksi,"SELECT * FROM artikel,kategori where kategori_id=artikel_kategori ORDER BY artikel_id DESC");
                while($k = mysqli_fetch_array($artikel)){
                  ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><img src="../gambar/artikel/<?php echo $k['artikel_sampul']; ?>" width="100px"></td>
                    <td><?php echo $k['artikel_judul']; ?></td>
                    <td><?php echo $k['kategori_nama']; ?></td>
                    <td>
                      <a class="btn btn-sm btn-warning" href="artikel_edit.php?id=<?php echo $k['artikel_id']; ?>"><i class="fa fa-wrench"></i></a>
                      <a class="btn btn-sm btn-danger" href="artikel_hapus.php?id=<?php echo $k['artikel_id']; ?>"><i class="fa fa-trash"></i></a>
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