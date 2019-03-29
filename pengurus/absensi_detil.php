<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Absensi Mahasiswa
      <small>Detil Absensi Mahasiswa</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">


      <div class="box-header">
        <h3 class="box-title">Detil Absensi Mahasiswa</h3>
        <a href="absensi.php" class="btn btn-info btn-sm pull-right"> Kembali</a>
      </div>




      <section class="col-lg-12">
        <div class="box box-info">
         <div class="row docs-premium-template">
          <div class="col-sm-12 col-md-12">
            <div class="box box-solid">
              <div class="box-body">

                <?php 
                $id = $_GET['id'];
                $data = mysqli_query($koneksi, "select * from mahasiswa,absen_kegiatan,kegiatan where absen_mahasiswa='$id' and absen_mahasiswa=mahasiswa_id and absen_kegiatan=kegiatan_id");
                while($d=mysqli_fetch_array($data)){

                  if($d['absen_keterangan']=="hadir"){
                    ?>
                    <div class="alert alert-success alert-dismissible">

                      <h4> <?php echo $d['mahasiswa_nama']; ?></h4>
                      <?php echo "Judul Kegiatan : ". $d['kegiatan_judul']."<br/>" ;?>
                      <?php echo "Keterangan : ". $d['absen_keterangan']; ?>
                    </div>
                    <?php
                  }elseif($d['absen_keterangan']=="alpa"){
                    ?>
                    <div class="alert alert-danger alert-dismissible">
                      <h4> <?php echo $d['mahasiswa_nama']; ?></h4>
                      <?php echo "Judul Kegiatan : ". $d['kegiatan_judul']."<br/>" ;?>
                      <?php echo "Keterangan : ". $d['absen_keterangan']; ?>
                    </div>
                    <?php
                  }
                  
                }


                ?>

              </div>

            </div>
          </div>       
        </div>

      </div>
    </section>
  </div>
</section>

</div>
<?php include 'footer.php'; ?>