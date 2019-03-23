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
      <section class="col-lg-5 connectedSortable">
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Admin</h3>
            <a class="btn btn-sm btn-primary pull-right" href="admin.php"><i class="fa fa-arrow-left"></i> Kembali</a>
          </div>
          <div class="box-body">

            <?php 
            include '../koneksi.php';
            $id = $_GET['id'];
            $admin = mysqli_query($koneksi,"SELECT * FROM admin WHERE id='$id'");
            while($a = mysqli_fetch_array($admin)){
              ?>
              <form action="admin_update.php" method="post">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="hidden" name="id" value="<?php echo $a['id'] ?>">
                  <input type="text" class="form-control" name="nama" required="required" value="<?php echo $a['nama'] ?>">
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" name="username" required="required" value="<?php echo $a['username'] ?>">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password">
                  <small>Kosongkan jika tidak ingin mengubah password</small>
                </div>
                <div class="form-group">
                  <label>Section</label>
                  <select class="form-control" name="section" required="required">
                    <option value="">Pilih Section</option>
                    <?php 
                    $section = mysqli_query($koneksi,"SELECT * FROM section");
                    while($s = mysqli_fetch_array($section)){
                      ?>
                      <option <?php if($s['section_id']==$a['section']){echo "selected='selected'";} ?> value="<?php echo $s['section_id'] ?>"><?php echo $s['section_desc'] ?></option>
                      <?php 
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-sm btn-primary" value="Simpan">
                </div>
              </form>
              <?php 
            }
            ?>

          </div>

        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>