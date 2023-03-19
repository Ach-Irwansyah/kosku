<!--##########################################################################################################################-->
        <!-- TABEL MENAMPILKAN DATA DATA-->
<!--##########################################################################################################################-->

        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i> Kamar</h4>
              <h5><button data-toggle="modal" data-target="#myModal" class="btn btn-info"><i class="fa fa-plus"></i> Tambah</button></h5>
              <section id="no-more-tables">
                <table class="table table-bordered table-striped table-condensed cf">
                  <thead class="cf">
                    <tr>
                        <th class="numeric text-center">nomer kamar</th>
                        <th class="numeric text-center">kamar mandi</th>
                        <th class="numeric text-center">lantai</th>
                        <th class="numeric text-center">harga</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php              
                  include "../config.php";
                  $qry=mysql_query("select * from kamar");
                  while($data=mysql_fetch_array($qry)){
                  ?>
                    <tr>
                      <td class="numeric text-center" data-title="Nama"><?php echo $data['nomer_kamar'];?></td>
                      <td class="numeric text-center" data-title="Nama"><?php echo $data['kmr_mndi'];?></td>
                      <td class="numeric text-center" data-title="Nama"><?php echo $data['lantai'];?></td>
                      <td class="numeric text-center" data-title="Nama">Rp. <?php echo $data['harga'];?></td>
                      <td class="numeric text-center" data-title="Aksi">
                      <div class="btn-group">
                      <button data-toggle="modal" data-target="#deletemodal<?php echo $data['id_kamar']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                      <button data-toggle="modal" data-target="#editmodal<?php echo $data['id_kamar']; ?>" class="btn btn-warning"><i class="fa fa-pencil-alt"></i> ubah</button>
                      </div></td>

                      <!--##########################################################################################################################-->
                            <!-- MODAL DELETE DATA-->
                    <!--##########################################################################################################################-->

                    <div id="deletemodal<?php echo $data['id_kamar']; ?>" role="dialog" class="modal fade">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Hapus</h4>
                            </div>
                            <div class="modal-body">
                            <div class="alert alert-danger"><strong>Peringatan!</strong> menghapus data yang di pilih.</div>
                              <form role="form" action="prosesKamar.php" method="get">
                                    <?php
                                    $id = $data['id_kamar']; 
                                    $query_edit = mysql_query("SELECT * FROM kamar WHERE id_kamar='$id'");
                                    while ($row = mysql_fetch_array($query_edit)) {  
                                    ?>
                              <input type="hidden" name="id_apus" value="<?php echo $row['id_kamar']; ?>">		
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <input type="submit" class="btn btn-primary" value="Hapus">
                              </div>
                                    <?php }?>
                            </form>
                          </div>
                        </div>
                      </div>
                    </tr>
 
                    <!--##########################################################################################################################-->
                            <!-- MODAL EDIT DATA-->
                    <!--##########################################################################################################################-->

                    <div id="editmodal<?php echo $data['id_kamar']; ?>" role="dialog" class="modal fade">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Ubah</h4>
                            </div>
                            <div class="modal-body">
                              <form role="form" action="prosesKamar.php" method="get">
                              <?php
                                            $id = $data['id_kamar']; 
                                            $query_edit = mysql_query("select * FROM kamar where id_kamar='$id'");
                                            while ($row = mysql_fetch_array($query_edit)) {  
                                            ?>
                              <input type="hidden" name="id" value="<?php echo $row['id_kamar']; ?>">
                                <div class="form-group">
                                  <label>Nomer Kamar</label>
                                  <input name="nomer" type="text" class="form-control" value="<?php echo $row['nomer_kamar']; ?>">
                                </div>
                                <div class="form-group">
                                  <label>Kamar Mandi</label>
                                  <input name="kamar" type="text" class="form-control" value="<?php echo $row['kmr_mndi']; ?>">
                                </div>
                                <div class="form-group">
                                  <label>lantai</label>
                                  <input name="lantai" type="text" class="form-control" value="<?php echo $row['lantai']; ?>">
                                </div>
                                <div class="form-group">
                                  <label>Harga</label>
                                  <input name="harga" type="text" class="form-control" value="<?php echo $row['harga']; ?>">
                                </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <input type="submit" class="btn btn-primary" value="Ubah">
                              </div>
                                            <?php }?>
                            </form>
                          </div>
                        </div>
                      </div>
                     
                      <?php } ?>
                  </tbody>
                  <!--##########################################################################################################################-->
                            <!-- MODAL TAMBAH DATA-->
                    <!--##########################################################################################################################-->

                    <div id="myModal" role="dialog" class="modal fade">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Tambah</h4>
                            </div>
                            <div class="modal-body">
                              <form role="form" method="POST">
                                <div class="form-group">
                                  <label>Nomer Kamar</label>
                                  <input type="text" name="nomer" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label>Kamar Mandi</label>
                                  <input name="kamar" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label>lantai</label>
                                  <input name="lantai" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label>Harga</label>
                                  <input name="harga" type="text" class="form-control">
                                </div>
                              <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" name="tambah" value="Add">
                              </div>
                            </form>
                            <?php
                            if(isset($_POST['tambah'])){
                            $nama=$_POST['nomer'];
                            $almt=$_POST['kamar'];
                            $email=$_POST['lantai'];
                            $tlp=$_POST['harga'];
                            $tambah=mysql_query("INSERT INTO kamar values('','$nama','$almt','$email','$tlp')") ;
                              if($tambah){
                                echo"<script>alert ('Berhasil') </script>";
                                echo"<meta http-equiv='refresh' content='0 url=header.php?page=kamar'>"; 
                              }else{
                                echo"<script>alert ('Gagal') </script>";
                                echo"<meta http-equiv='refresh' content='0 url=header.php?page=kamar'>"; 
                              }
                            }
                            ?>
                          </div>
                        </div>
                      </div>
                </table>
              </section>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>
        <!-- /row -->