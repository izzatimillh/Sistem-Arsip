<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Data Kategori
      <small>Data Kategori Artikel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-8">

        <div class="box box-info">
          <div class="box-header">
           <h3 class="box-title">Kategori Artikel</h3>

           <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#kat_baru"><i class="fa fa-plus"></i> Kategori Baru</button>

           <div id="kat_baru" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Kategori Baru</h4>
                </div>
                <div class="modal-body">


                  <form action="kategori_act.php" method="post">                  
                    <div class="form-group">
                      <label>Nama Kategori</label>
                      <input type="text" name="kategori" required="required" class="form-control">
                    </div>
                    <br/>
                    <input type="submit" value="Simpan" class="btn btn-primary">
                  </form>


                </div>
              </div>

            </div>
          </div>

        </div>

        <div class="box-body">

          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="table-datatable">
              <thead>
                <tr>
                  <th width="1%">No</th>
                  <th>Nama Kategori</th>
                  <th width="11%">OPSI</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no=1;
                $kategori = mysqli_query($koneksi,"SELECT * FROM kategori");
                while($k = mysqli_fetch_array($kategori)){
                  ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $k['kategori_nama']; ?></td>
                    <td>
                      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#kategori_edit_<?php echo $k['kategori_id']; ?>"><i class="fa fa-wrench"></i></button>
                      <!-- <a class="btn btn-sm btn-danger" href="kategori_hapus.php?id=<?php echo $k['kategori_id']; ?>"><i class="fa fa-trash"></i></a> -->
                      
                      <!-- Modal -->
                      <div id="kategori_edit_<?php echo $k['kategori_id']; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Edit Kategori</h4>
                            </div>
                            <div class="modal-body">

                             <form action="kategori_update.php" method="post">                  
                              <input type="hidden" name="id" value="<?php echo $k['kategori_id']; ?>" class="form-control">
                              <div class="form-group ">
                                <label>Nama Kategori</label>
                                <input type="text" name="kategori" value="<?php echo $k['kategori_nama']; ?>" class="form-control">
                              </div>
                              <br/>
                              <br/>
                              <input type="submit" value="Simpan" class="btn btn-primary">
                            </form>

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
      </div>

    </div>
  </section>
</div>
</section>
</div>
<?php include 'footer.php'; ?>