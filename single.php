<?php include 'header.php'; ?>

<div class="row">
  <div class="container">
    <div class="page-header">
      <h3>Informasi <small>Detail Informasi</small></h3>
    </div>

    <div class="col-lg-9">
      <div class="row">
        <?php 
        $id = $_GET['id'];
        if($id==""){
          header("location:index.php");
        }

        $artikel = mysqli_query($koneksi,"SELECT * FROM artikel,kategori WHERE artikel_kategori=kategori_id AND artikel_id='$id'");
        while($a = mysqli_fetch_array($artikel)){
          ?>
          <div class="col-md-12">
            <div class="panel">
              <div class="panel-body">
                <div class="thumbnail">
                  <img src="gambar/artikel/<?php echo $a['artikel_sampul']; ?>">
                </div>
                <h3><?php echo $a['artikel_judul']; ?></h3>

                <h5><b>Tanggal : <?php echo date('d-m-Y', strtotime($a['artikel_tanggal'])); ?></b></h5>

                <h5 class="label label-danger"><?php echo $a['kategori_nama']; ?></h5>

                <hr>

                <?php echo $a['artikel_konten']; ?>
                
                <br/>
                <br/>
              </div>
            </div>
          </div>

          <div class="col-lg-12">
            <h3>KOMENTAR</h3>

            <div class="panel">
              <div class="panel-body">
                <?php 
                $id_artikel = $a['artikel_id'];
                $komentar = mysqli_query($koneksi,"SELECT * FROM komentar WHERE komentar_artikel='$id_artikel' ORDER BY komentar_id ASC");
                while($k = mysqli_fetch_array($komentar)){
                  ?>
                  <div class="media">
                    <?php 
                    $jenis = $k['komentar_jenis_pengguna'];
                    $id = $k['komentar_id_pengguna'];
                    if($jenis == "mahasiswa"){
                      $user = mysqli_query($koneksi,"SELECT * FROM mahasiswa WHERE mahasiswa_id='$id'");
                      $u = mysqli_fetch_assoc($user);
                      ?>
                      <?php 
                      if($u['mahasiswa_foto']!="" && file_exists("gambar/mahasiswa/".$u['mahasiswa_foto'])){ 
                        ?>
                        <img style="width: 45px" src="gambar/mahasiswa/<?php echo $u['mahasiswa_foto']; ?>" class="mr-3">
                      <?php }else{ ?>
                        <img style="width: 45px" src="assets/dist/img/avatar5.png" class="mr-3">
                      <?php } 
                      ?>
                      <div class="media-body">
                        <h5 class="mt-0 text-bold"><?php echo $u['mahasiswa_nama'] ?> - <span class="label label-warning"><?php echo $jenis; ?></span></h5>
                        <?php echo $k['komentar_isi']; ?>
                      </div>
                      <?php
                    }elseif($jenis == "pengurus"){
                      $user = mysqli_query($koneksi,"SELECT * FROM pengurus WHERE pengurus_id='$id'");
                      $u = mysqli_fetch_assoc($user);
                      ?>
                      <?php 
                      if($u['pengurus_foto']!="" && file_exists("gambar/pengurus/".$u['pengurus_foto'])){ 
                        ?>
                        <img style="width: 45px" src="gambar/pengurus/<?php echo $u['pengurus_foto']; ?>" class="mr-3">
                      <?php }else{ ?>
                        <img style="width: 45px" src="assets/dist/img/avatar5.png" class="mr-3">
                      <?php } 
                      ?>
                      <div class="media-body">
                        <h5 class="mt-0 text-bold"><?php echo $u['pengurus_nama'] ?> - <span class="label label-danger"><?php echo $jenis; ?></span></h5>
                        <?php echo $k['komentar_isi']; ?>
                      </div>
                      <?php
                    }
                    ?>
                    
                  </div>
                  <hr>
                  <?php 
                }
                ?>
              </div>
            </div>

            <?php 
            if(isset($_SESSION['login'])){
              ?>
              <div class="panel" id="komentar">
                <div class="panel-body">
                  <form action="komentar.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $a['artikel_id']; ?>">
                    <div class="form-group">
                      <label>Komentar</label>
                      <textarea name="komentar" class="form-control" style="resize: none;height: 150px" required="required"></textarea>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Komentar">
                  </form>
                </div>
              </div>
              <?php
            }else{
              ?>
              <center><h3>SILAHKAN LOGIN TERLEBIH DULU UNTUK KOMENTAR</h3></center>
              <a href="login_mahasiswa.php" class="btn btn-primary btn-block">LOGIN MAHASISWA</a>
              <a href="login.php" class="btn btn-danger btn-block">LOGIN PENGURUS</a>
              <?php
            }
            ?>
          </div>
          <?php 
        }
        ?>
      </div>

    </div>
    <div class="col-lg-3">
      <div class="row">
        <?php 
        $kategori = mysqli_query($koneksi,"SELECT * FROM kategori");
        while($k = mysqli_fetch_array($kategori)){
          ?>
          <div class="col-md-12">
            <ul class="list-group">
              <li class="list-group-item"><b><?php echo $k['kategori_nama']; ?></b></li>
              <?php 
              $id_k = $k['kategori_id'];
              $artikel = mysqli_query($koneksi,"SELECT * FROM artikel WHERE artikel_kategori='$id_k' ORDER BY artikel_id DESC LIMIT 5");
              while($a=mysqli_fetch_array($artikel)){
                ?>
                <li class="list-group-item"><a class="text-black" href="single.php?id=<?php echo $a['artikel_id']; ?>"><?php echo $a['artikel_judul']; ?></a></li>
                <?php 
              }
              ?>
            </ul>
          </div>
          <?php 
        }
        ?>

      </div>
    </div>
  </div>
</div>


<?php include 'footer.php'; ?>
