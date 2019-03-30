<?php include 'header.php'; ?>

<div class="content-wrapper">
  
  <section class="content-header">
    <h1>
      Dashboard
      <small>Fitur komunikasi</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Mailbox</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-3">
        <a href="pesan_add.php" class="btn btn-primary btn-block margin-bottom">Tulis Pesan Baru</a>

        <div class="box box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">Kategori</h3>

            <div class="box-tools">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked">
              <li><a href="pesan.php"><i class="fa fa-inbox"></i>Pesan Masuk</a></li>
              <li class="active"><a href="pesan_terkirim.php"><i class="fa fa-envelope-o"></i> Pesan Keluar</a></li>
            </ul>
          </div>
          <!-- /.box-body -->
        </div>
      </div>
      <!-- /.col -->
      <div class="col-md-9">

        <?php 
        if(isset($_GET['alert'])){
          if($_GET['alert'] == "terkirim"){
            echo "<div class='alert alert-success'>Pesan berhasil dikirim</div>";
          }
        }
        ?>

        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Pesan Keluar</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">

            <div class="table-responsive mailbox-messages">
              <table class="table table-hover table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="14%">Waktu</th>
                    <th width="15%">Pengirim</th>
                    <th>Isi Pesan</th>
                    <th width="1%">Dokumen</th>
                    <th width="15%">Tujuan</th>
                    <th width="11%">Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $id = $_SESSION['id'];
                  $jenis = $_SESSION['login'];
                  $terkirim = mysqli_query($koneksi,"SELECT * FROM pesan WHERE pesan_jenis_pengirim='$jenis' AND pesan_id_pengirim='$id' ORDER BY pesan_id DESC");
                  while($t = mysqli_fetch_array($terkirim)){
                    ?>
                    <tr>
                      <td><?php echo date('H:i:s d-m-Y',strtotime($t['pesan_waktu'])); ?></td>
                      <td>
                        <?php 
                        $pengirim = $t['pesan_id_pengirim'];
                        $jenis_pengirim = $t['pesan_jenis_pengirim'];
                        if($jenis_pengirim == "mahasiswa"){
                          $a = mysqli_query($koneksi,"SELECT * FROM mahasiswa WHERE mahasiswa_id='$pengirim'");
                          $aa = mysqli_fetch_assoc($a);
                          echo $aa['mahasiswa_nama'] . " <br/><span class='label label-danger'>Mahasiswa</span>";
                        }elseif($jenis_pengirim=="pengurus"){
                          $a = mysqli_query($koneksi,"SELECT * FROM pengurus WHERE pengurus_id='$pengirim'");
                          $aa = mysqli_fetch_assoc($a);
                          echo $aa['pengurus_nama'] . " <br/><span class='label label-primary'>Pengurus</span>";
                        }elseif($jenis_pengirim=="pembina"){
                          $a = mysqli_query($koneksi,"SELECT * FROM pembina WHERE pembina_id='$pengirim'");
                          $aa = mysqli_fetch_assoc($a);
                          echo $aa['pembina_nama'] . " <br/><span class='label label-warning'>Pembina</span>";
                        }
                        ?>
                      </td>
                      <td><?php echo substr($t['pesan_isi'], 0,80); ?> ..</td>
                      <td>
                        <?php 
                        if($t['pesan_file'] != "" && file_exists('../dokumen_pesan/'.$t['pesan_file'])){
                          echo "<b><a target='_blank' href='../dokumen_pesan/".$t['pesan_file']."'><i class='fa fa-paperclip'></i></a></b>";
                        }else{
                          echo "-";
                        }
                        ?>
                      </td>
                      <td>
                        <?php 
                        $penerima = $t['pesan_id_penerima'];
                        $jenis_penerima = $t['pesan_jenis_penerima'];
                        if($jenis_penerima == "mahasiswa"){
                          $a = mysqli_query($koneksi,"SELECT * FROM mahasiswa WHERE mahasiswa_id='$penerima'");
                          $aa = mysqli_fetch_assoc($a);
                          echo $aa['mahasiswa_nama'] . " <br/><span class='label label-danger'>Mahasiswa</span>";
                        }elseif($jenis_penerima=="pengurus"){
                          $a = mysqli_query($koneksi,"SELECT * FROM pengurus WHERE pengurus_id='$penerima'");
                          $aa = mysqli_fetch_assoc($a);
                          echo $aa['pengurus_nama'] . " <br/><span class='label label-primary'>Pengurus</span>";
                        }elseif($jenis_penerima=="pembina"){
                          $a = mysqli_query($koneksi,"SELECT * FROM pembina WHERE pembina_id='$penerima'");
                          $aa = mysqli_fetch_assoc($a);
                          echo $aa['pembina_nama'] . " <br/><span class='label label-warning'>Pembina</span>";
                        }
                        ?>
                      </td>
                      <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_pesan<?php echo $t['pesan_id']; ?>">
                          <i class="fa fa-search"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="modal_pesan<?php echo $t['pesan_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Detail Pesan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">

                                <table class="table">
                                  <tr>
                                    <th width="35%">Waktu</th>
                                    <td><?php echo date('H:i:s d-m-Y',strtotime($t['pesan_waktu'])); ?></td>
                                  </tr>
                                  <tr>
                                    <th>Pengirim</th>
                                    <td>
                                      <?php 
                                      $pengirim = $t['pesan_id_pengirim'];
                                      $jenis_pengirim = $t['pesan_jenis_pengirim'];
                                      if($jenis_pengirim == "mahasiswa"){
                                        $a = mysqli_query($koneksi,"SELECT * FROM mahasiswa WHERE mahasiswa_id='$pengirim'");
                                        $aa = mysqli_fetch_assoc($a);
                                        echo $aa['mahasiswa_nama'] . " <span class='label label-danger'>Mahasiswa</span>";
                                      }elseif($jenis_pengirim=="pengurus"){
                                        $a = mysqli_query($koneksi,"SELECT * FROM pengurus WHERE pengurus_id='$pengirim'");
                                        $aa = mysqli_fetch_assoc($a);
                                        echo $aa['pengurus_nama'] . " <span class='label label-primary'>Pengurus</span>";
                                      }elseif($jenis_pengirim=="pembina"){
                                        $a = mysqli_query($koneksi,"SELECT * FROM pembina WHERE pembina_id='$pengirim'");
                                        $aa = mysqli_fetch_assoc($a);
                                        echo $aa['pembina_nama'] . " <span class='label label-warning'>Pembina</span>";
                                      }
                                      ?>
                                    </td>
                                  </tr>
                                  <tr>
                                    <th>Tujuan</th>
                                    <td>
                                      <?php 
                                      $penerima = $t['pesan_id_penerima'];
                                      $jenis_penerima = $t['pesan_jenis_penerima'];
                                      if($jenis_penerima == "mahasiswa"){
                                        $a = mysqli_query($koneksi,"SELECT * FROM mahasiswa WHERE mahasiswa_id='$penerima'");
                                        $aa = mysqli_fetch_assoc($a);
                                        echo $aa['mahasiswa_nama'] . " <span class='label label-danger'>Mahasiswa</span>";
                                      }elseif($jenis_penerima=="pengurus"){
                                        $a = mysqli_query($koneksi,"SELECT * FROM pengurus WHERE pengurus_id='$penerima'");
                                        $aa = mysqli_fetch_assoc($a);
                                        echo $aa['pengurus_nama'] . " <span class='label label-primary'>Pengurus</span>";
                                      }elseif($jenis_penerima=="pembina"){
                                        $a = mysqli_query($koneksi,"SELECT * FROM pembina WHERE pembina_id='$penerima'");
                                        $aa = mysqli_fetch_assoc($a);
                                        echo $aa['pembina_nama'] . " <span class='label label-warning'>Pembina</span>";
                                      }
                                      ?>
                                    </td>
                                  </tr>
                                  <tr>
                                    <th>Isi Pesan</th>
                                    <td><?php echo $t['pesan_isi']; ?></td>
                                  </tr>
                                  <tr>
                                    <th>File Attachment</th>
                                    <td>
                                      <?php 
                                      if($t['pesan_file'] != "" && file_exists('../dokumen_pesan/'.$t['pesan_file'])){
                                        echo "<a target='_blank' href='../dokumen_pesan/".$t['pesan_file']."'><i class='fa fa-paperclip'></i> ".$t['pesan_file']."</a>";
                                      }else{
                                        echo "-";
                                      }
                                      ?>
                                    </td>
                                  </tr>
                                </table>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <?php 

                  }
                  ?>
                </tbody>
              </table>

            </div>
            <!-- /.mail-box-messages -->
          </div>

        </div>
        <!-- /. box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>


<?php include 'footer.php'; ?>