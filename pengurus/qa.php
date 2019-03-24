<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Data Q & A
      <small>Data Q & A Artikel</small>
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
           <h3 class="box-title">Q & A Artikel</h3>

           <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#kat_baru"><i class="fa fa-plus"></i> Q & A Baru</button>

           <div id="kat_baru" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Q & A Baru</h4>
                </div>
                <div class="modal-body">


                  <form action="qa_act.php" method="post">                  
                    <div class="form-group">
                      <label>Pertanyaan</label>
                      <input type="text" name="pertanyaan" required="required" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Jawaban</label>
                      <input type="text" name="jawaban" required="required" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Status</label>
                      <select name="status" class="form-control">
                        <option value="publish">Publish</option>
                        <option value="pending">Pending</option>
                      </select>
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
                  <th>Pertanyaan</th>
                  <th>Jawaban</th>
                  <th>Status</th>
                  <th width="11%">OPSI</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no=1;
                $qa = mysqli_query($koneksi,"SELECT * FROM qa");
                while($k = mysqli_fetch_array($qa)){
                  ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $k['qa_pertanyaan']; ?></td>
                    <td><?php echo $k['qa_jawaban']; ?></td>
                    <td><?php echo $k['qa_status']; ?></td>
                    <td>
                      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#qa_edit_<?php echo $k['qa_id']; ?>"><i class="fa fa-wrench"></i></button>
                      <a class="btn btn-sm btn-danger" href="qa_hapus.php?id=<?php echo $k['qa_id']; ?>"><i class="fa fa-trash"></i></a>
                      
                      <!-- Modal -->
                      <div id="qa_edit_<?php echo $k['qa_id']; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Edit Q & A</h4>
                            </div>
                            <div class="modal-body">

                             <form action="qa_update.php" method="post">                  
                              <input type="hidden" name="id" value="<?php echo $k['qa_id']; ?>" class="form-control">
                              <p>Pertanyaan</p>
                              <input style="width:100%" type="text" name="pertanyaan" required="required" class="form-control" value="<?php echo $k['qa_pertanyaan']; ?>" >

                              <p>Jawaban</p>
                              <input style="width:100%" type="text" name="jawaban" required="required" class="form-control" value="<?php echo $k['qa_jawaban']; ?>" >

                              <p>Status</p>
                              <select style="width:100%"  name="status" class="form-control">
                                <option <?php if($k['qa_status'] == "publish"){ echo "selected='selected'"; } ?> value="publish">Publish</option>
                                <option <?php if($k['qa_status'] == "pending"){ echo "selected='selected'"; } ?> value="pending">Pending</option>
                              </select>
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