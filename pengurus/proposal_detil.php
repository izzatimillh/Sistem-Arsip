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
            <a href="proposal.php" class="btn btn-info btn-sm pull-right"> Kembali</a>
          </div>
          <div class="box-body">
            <form class="form-horizontal">
              <?php 
              $id = $_GET['id'];
              $data = mysqli_query($koneksi,"SELECT * FROM proposal WHERE proposal_id='$id'");
              while ($d = mysqli_fetch_array($data)) {
                ?>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Judul</label>
                  <div class="col-sm-10">
                    <input type="text" disabled class="form-control" value="<?php echo $d['proposal_judul'] ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Disetujui Oleh</label>
                  <div class="col-sm-10">
                    <input type="text" disabled class="form-control" value="<?php echo $d['proposal_pembina'] ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Tanggal Di upload</label>
                  <div class="col-sm-10">
                    <input type="text" disabled class="form-control" value="<?php echo date('d F Y',strtotime($d['proposal_tgl_upload'])); ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Keterangan</label>
                  <div class="col-sm-10">
                    <input type="text" disabled class="form-control" value="<?php echo $d['proposal_keterangan'] ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Jadwal Tanda Tangan</label>
                  <div class="col-sm-10">
                    <input type="date" disabled class="form-control" value="<?php echo $d['proposal_tgl_ttd']; ?>">
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label">File</label>
                  <div class="col-sm-10">
                    <a href="../file/proposal/<?php echo $d['proposal_file'] ?>"><?php echo $d['proposal_file']; ?></a>
                  </div>
                </div>
                <?php
              }
              ?>              
            </form>           
          </div>

        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>