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
