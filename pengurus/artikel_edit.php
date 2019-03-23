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
           <a href="artikel.php" class="btn btn-info btn-sm pull-right">Kembali</a>
         </div>
         <div class="box-body">

          <?php 
          if(isset($_GET['alert'])){
            if($_GET['alert'] == "gagal"){
              echo "<div class='alert alert-danger'>Posting gagal! gambar yang diizinkan hanya .png atau .jpg</div>";
            }
          }
          ?>
          <?php 
          $id = $_GET['id'];
          $artikel = mysqli_query($koneksi,"SELECT * FROM artikel WHERE artikel_id='$id'");
          while($a = mysqli_fetch_array($artikel)){
            ?>
            <form action="artikel_update.php" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Judul Artikel</label>
                <input name="id" type="hidden" required="required" value="<?php echo $a['artikel_id']; ?>">
                <input class="form-control" type="text" name="judul" required="required" autocomplete="autocomplete" value="<?php echo $a['artikel_judul']; ?>">
              </div>
              <div class="form-group">
                <label>Kategori Artikel</label>
                <select class="form-control" name="kategori" required="required">
                  <option value="">Pilih Kategori</option>
                  <?php 
                  $no=1;
                  $kategori = mysqli_query($koneksi,"SELECT * FROM kategori");
                  while($k = mysqli_fetch_array($kategori)){
                    ?>
                    <option <?php if($a['artikel_kategori'] == $k['kategori_id']){echo "selected='selected'";} ?> value="<?php echo $k['kategori_id'] ?>"><?php echo $k['kategori_nama']; ?></option>
                    <?php 
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label>Isi Konten</label>
                <textarea name="konten" required="required" class="form-control" id="editor1"><?php echo $a['artikel_konten']; ?></textarea>
              </div>
              <div class="form-group">
                <label>Gambar Sampul</label>
                <input name="sampul" type="file">
                <small class="text-danger">Kosongkan jika tidak ingin mengubah gambar</small>
              </div>
              <br/>
              <div class="form-group">
                <input type="submit" value="Posting" class="btn btn-primary">
              </div>
            </form>
            <?php 
          }
          ?>
        </div>
      </div>
    </section>
  </div>
</section>
</div>
<?php include 'footer.php'; ?>