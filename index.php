<?php include 'header.php'; ?>

<div class="pnl">
  <div class="container">
    <div class="col-sm-2 col-md-2 col-lg-2"><img class="pull-left" style="width: 150px" src="gambar/frontend/bidikmisi.png"></div>
    <div class="col-sm-8 col-md-8 col-lg-8">
      <center>
        <h2>Sistem Informasi Manajemen Beasiswa Bidik Misi</h2>
      </center>
    </div>
    <div class="col-sm-2 col-md-2 col-lg-2"><img class="pull-right" style="width: 65px" src="gambar/frontend/ristekdikti.png"></div>
  </div>
</div>

<br/>
<br/>

<div class="row">
  <div class="container">
    <div class="page-header">
      <h3>Informasi <small>Informasi seputar manajemen beasiswa bidik misi</small></h3>
    </div>

    <div class="row">
      <?php 
      $kategori = mysqli_query($koneksi,"SELECT * FROM kategori");
      while($k = mysqli_fetch_array($kategori)){
        ?>
        <div class="col-md-3">
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

<br/>
<br/>
<br/>


<center>
  <a target="_blank" href="https://bidikmisi.belmawa.ristekdikti.go.id/" class="btn btn-danger">MENDAFTAR BIDIKMISI DI RISTEK DIKTI</a>
  <a href="daftar.php" class="btn btn-primary">MENDAFTAR DI SIMABID</a>
</center>

<br/>
<br/>

<div class="row">
  <div class="container">
    <div class="page-header">
      <h3>Q & A <small>Tanya jawab seputar Bidik Misi</small></h3>
    </div>

    <?php 
    $qa = mysqli_query($koneksi,"SELECT * FROM qa WHERE qa_status='publish'");
    while($q = mysqli_fetch_array($qa)){
      ?>
      <div class="panel panel-success">
        <div class="panel-heading text-bold">
          <?php echo $q['qa_pertanyaan']; ?>
        </div>
        <div class="panel-body">
          <?php echo $q['qa_jawaban']; ?>
        </div>
      </div>
      <?php 
    }
    ?>

    <br/>
    <br/>

    <div class="page-header" id="pertanyaan">
      <h4>Bertanya <small>Bertanya seputer Bidik Misi</small></h4>
    </div>
    
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2">

        <?php 
        if(isset($_GET['alert'])){
          if($_GET['alert'] == "pertanyaan"){
            echo "<div class='alert alert-success text-center'>Pertanyaan anda telah tersimpan, silahkan menunggu jawaban dari admin dalam fitur Q & A ini.</div>";
          }
        }
        ?>

        <form action="pertanyaan_act.php" method="POST">
          <div class="form-group">
            <label>Pertanyaan</label>
            <textarea class="form-control" name="pertanyaan" required="required"></textarea>
          </div>
          <input type="submit" class="btn btn-block btn-warning" value="Kirim Pertanyaan">
        </form>
      </div>
    </div>


  </div>
</div>


<br/>
<br/>
<br/>
<br/>
<br/>



<?php include 'footer.php'; ?>
