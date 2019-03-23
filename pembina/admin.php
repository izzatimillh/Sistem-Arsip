<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Admin
      <small>Data Admin</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-10 connectedSortable">
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Admin</h3>
           
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="1%">No</th>
                    <th width="25%">Section</th>
                    <th>Nama</th>
                    <th width="15%">Username</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $admin = mysqli_query($koneksi,"SELECT * FROM admin,section WHERE section=section_id");
                  while($a = mysqli_fetch_array($admin)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $a['section_sect_id']; ?> - <?php echo $a['section_desc']; ?></td>
                      <td><?php echo $a['nama']; ?></td>
                      <td><?php echo $a['username']; ?></td>
                     
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