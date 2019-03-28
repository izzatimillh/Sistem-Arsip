<?php include 'header.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Q & A
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-lg-12">

      <!-- quick email widget -->
      <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">Tanya Jawab Seputar Bidik Misi</h3>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="container">
             

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

                  <form action="qa_act.php" method="POST">
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
        </div>
        <br/>
      </div>
    </section>
    <!-- /.Left col -->
  </div>
  <!-- /.row (main row) -->
</section>
<!-- /.content -->
</div>
<?php include 'footer.php'; ?>