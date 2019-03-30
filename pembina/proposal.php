<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Proposal
      <small>Data Proposal</small>
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
            <h3 class="box-title">Proposal</h3>                      
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">No</th>
                    <th>Judul Proposal</th>
                    <th>Tanggal Upload</th>
                    <th>Keterangan</th>                    
                    <th>File</th>                    
                    <th width="15%">Option</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $pengurus = $_SESSION['id'];
                  $proposal = mysqli_query($koneksi,"SELECT * FROM proposal");
                  while($p = mysqli_fetch_array($proposal)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $p['proposal_judul']; ?></td>  
                      <td><?php echo $p['proposal_tgl_upload']; ?></td>  
                      <td><?php echo $p['proposal_keterangan']; ?></td>  
                      <td><a href="../file/proposal/<?php echo $p['proposal_file'] ?>">Download</a></td>                        

                      <td>                      
                        <a class="btn btn-primary btn-sm" href="proposal_detil.php?id=<?php echo $p['proposal_id'] ?>"><i class="fa fa-search"></i> </a>                    
                        <a class="btn btn-warning btn-sm" href="proposal_edit.php?id=<?php echo $p['proposal_id'] ?>"><i class="fa fa-cog"></i> </a>                        
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