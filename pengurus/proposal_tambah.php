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

          <?php 
          if(isset($_GET['alert'])){
            if($_GET['alert'] == "gagal"){
              echo "<div class='alert alert-danger'>Posting gagal! gambar yang diizinkan hanya .png atau .jpg</div>";
            }
          }
          ?>
          <form action="proposal_act.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label>Judul Proposal</label>
              <input class="form-control" name="judul" required="required" autocomplete="autocomplete">
            </div>           
            <div class="form-group">
              <label>File Proposal</label>
              <input name="proposal" required="required" type="file">
            </div>
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