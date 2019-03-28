<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      <small>Data Keuangan Kegiatan</small>
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
            <h3 class="box-title">Keuangan</h3>
            <a href="keuangan_tambah.php" class="btn btn-info btn-sm pull-right"> <i class="fa fa-plus">Tambah</i></a>              
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="1%">No</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>                    
                    <th>Jenis</th>                    
                    <th>Pemasukan</th>                    
                    <th>Pengeluaran</th>                    
                    <th>Saldo</th>                    
                    <th width="15%">Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $awal = 0;
                  $deb = 0;
                  $kre = 0;
                  $keuangan = mysqli_query($koneksi,"SELECT * FROM keuangan");
                  while($k = mysqli_fetch_array($keuangan)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td>
                       <?php 
                       $tgl_kegiatan = date('d F Y',strtotime($k['keuangan_tanggal']));
                       echo $tgl_kegiatan;
                       ?>                          
                     </td>  
                     <td><?php echo $k['keuangan_keterangan']; ?></td>  
                     <td><?php echo $k['keuangan_jenis']; ?></td>  
                     <td><?php echo "Rp. ".number_format($k['keuangan_debit']).",-"; ?></td>
                     <td><?php echo "Rp. ".number_format($k['keuangan_kredit']).",-"; ?></td>
                     <td style="font-weight: bold;">
                      <?php 
                        // SALDO                      
                      if($k['keuangan_jenis']=="Pengeluaran"){
                        $awal = $awal - $k['keuangan_kredit'];
                      }elseif($k['keuangan_jenis']=="Pemasukan"){
                        $awal = $awal + $k['keuangan_debit'];
                      } 
                      echo "Rp. ".number_format($awal).",-";
                      ?>

                      <?php 
                        // DEBIT                      
                      if($k['keuangan_jenis']=="Pemasukan"){
                        $deb = $deb + $k['keuangan_debit'];
                      } 

                      ?>

                      <?php 
                        // KREDIT                     
                      if($k['keuangan_jenis']=="Pengeluaran"){
                        $kre = $kre + $k['keuangan_kredit'];
                      }                         
                      ?>

                    </td>                                       
                    <td>                  
                      <a class="btn btn-warning btn-sm" href="keuangan_edit.php?id=<?php echo $k['keuangan_id'] ?>"><i class="fa fa-cog"></i> </a>
                      <a class="btn btn-danger btn-sm" href="keuangan_hapus.php?id=<?php echo $k['keuangan_id'] ?>"><i class="fa fa-trash"></i></a>
                    </td>

                  </tr>
                  <?php 
                }
                ?>
                <tr>

                  <td colspan="4" style="font-weight: bold;text-align: center;">TOTAL</td>                                                                                  
                  <td style="font-weight: bold;">
                    <?php                         
                    echo "Rp. ".number_format($deb).",-";
                    ?>
                  </td> 
                  <td style="font-weight: bold;">
                    <?php                         
                    echo "Rp. ".number_format($kre).",-";
                    ?>
                  </td> 
                  <td style="font-weight: bold;color: blue">
                    <?php                         
                    echo "Rp. ".number_format($awal).",-";
                    ?>
                  </td>                         
                  <td>

                  </td>     
                </tr>
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