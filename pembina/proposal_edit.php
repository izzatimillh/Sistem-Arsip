<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Data Proposal
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
           <h3 class="box-title">proposal</h3>
           <a href="proposal.php" class="btn btn-info btn-sm pull-right">Kembali</a>
         </div>
         <div class="box-body">

          <form action="proposal_update.php" method="post" enctype="multipart/form-data">
            <?php 
            $id = $_GET['id'];
            $data = mysqli_query($koneksi, "select * from proposal where proposal_id='$id'");
            while($d = mysqli_fetch_array($data)){
              ?>

              <div class="form-group">
                <label>Judul Proposal</label>
                <input type="hidden" name="id" value="<?php echo $d['proposal_id'] ?>">
                <input type="text" disabled class="form-control" name="judul" value="<?php echo $d['proposal_judul']; ?>" required="required" autocomplete="autocomplete">
              </div> 
              <div class="form-group">
                <label>Keterangan</label>                
                <input type="text" class="form-control" name="keterangan" value="<?php echo $d['proposal_keterangan']; ?>" required="required" autocomplete="autocomplete">
              </div> 
              <div class="form-group">
                <label>Jadwal Tanda Tangan</label>                
                <input type="date" class="form-control" name="ttd" value="<?php echo $d['proposal_tgl_ttd']; ?>" required="required" autocomplete="autocomplete">
              </div>           
              
              <?php
            }

            ?>
            
            <br/>
            <div class="form-group">
              <input type="submit" value="Posting" class="btn btn-primary">
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
</section>
</div>
<?php include 'footer.php'; ?>