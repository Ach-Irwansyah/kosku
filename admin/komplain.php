<!--##########################################################################################################################-->
        <!-- TABEL MENAMPILKAN DATA DATA-->
<!--##########################################################################################################################-->

        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i> Komplain</h4>
              <h5><button data-toggle="modal" data-target="#myModal" class="btn btn-info"><i class="fa fa-plus"></i> Komplain</button></h5>
              <section id="no-more-tables">
                <table class="table table-bordered table-striped table-condensed cf">
                  <thead class="cf">
                    <tr>
                        <th class="numeric text-center">nama</th>
                        <th class="numeric text-center">isi</th>
                        <th class="numeric text-center">tanggal komplain</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php              
                  include "../config.php";
                  $qry=mysql_query("select komplain.id_komplain,komplain.tgl_komplain,komplain.isi,user.nama from komplain,user where komplain.id_user=user.id_user order by komplain.tgl_komplain desc");
                  while($data=mysql_fetch_array($qry)){
                  ?>
                    <tr>
                      <td class="numeric text-center" data-title="Nama"><?php echo $data['nama'];?></td>
                      <td class="numeric text-center" data-title="Nama"><?php echo $data['isi'];?></td>
                      <td class="numeric text-center" data-title="Nama"><?php echo $data['tgl_komplain'];?></td>
                      <td class="numeric text-center" data-title="Aksi">
                      <div class="btn-group">
                      <button data-toggle="modal" data-target="#deletemodal<?php echo $data['id_komplain']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                      <button data-toggle="modal" data-target="#editmodal<?php echo $data['id_komplain']; ?>" class="btn btn-warning"><i class="fa fa-pencil-alt"></i> ubah</button>
                      </div></td>

                      <!--##########################################################################################################################-->
                            <!-- MODAL DELETE DATA-->
                    <!--##########################################################################################################################-->

                    <div id="deletemodal<?php echo $data['id_komplain']; ?>" role="dialog" class="modal fade">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Hapus</h4>
                            </div>
                            <div class="modal-body">
                            <div class="alert alert-danger"><strong>Peringatan!</strong> menghapus data yang di pilih.</div>
                              <form role="form" action="prosesKomplain.php" method="get">
                                    <?php
                                    $id = $data['id_komplain']; 
                                    $query_edit = mysql_query("SELECT * FROM komplain WHERE id_komplain='$id'");
                                    while ($row = mysql_fetch_array($query_edit)) {  
                                    ?>
                              <input type="hidden" name="id_apus" value="<?php echo $row['id_komplain']; ?>">		
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

                    <div id="editmodal<?php echo $data['id_komplain']; ?>" role="dialog" class="modal fade">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Ubah</h4>
                            </div>
                            <div class="modal-body">
                              <form role="form" action="prosesKomplain.php" method="get">
                              <?php
                                            $id = $data['id_komplain']; 
                                            $query_edit = mysql_query("select * FROM komplain where id_komplain='$id'");
                                            while ($row = mysql_fetch_array($query_edit)) {  
                                            ?>
                              <input type="hidden" name="id" value="<?php echo $row['id_komplain']; ?>">
                              <div class="form-group">
                                <label>Komplain</label>
                                <textarea class="form-control" name="isi" id="contact-message" placeholder="Your Message" rows="5" data-rule="required" data-msg="Masukkan Komplain Anda"><?php echo $row['isi']; ?></textarea>
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
                              <h4 class="modal-title">Komplain</h4>
                            </div>
                            <div class="modal-body">
                              <form role="form" method="POST">
                                <div class="form-group">
                                  <label>Komplain</label>
                                  <textarea class="form-control" name="isi" id="contact-message" placeholder="Your Message" rows="5" data-rule="required" data-msg="Masukkan Komplain Anda"></textarea>
                                </div>
                              <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" name="tambah" value="Add">
                              </div>
                            </form>
                            <?php
                            if(isset($_POST['tambah'])){
                            $nama=$_POST['isi'];
                            $kk = $_SESSION['idu'];
                            $dd = date("Y-m-d");
                            $tambah=mysql_query("INSERT INTO komplain values('','$kk','$dd','$nama')") ;
                              if($tambah){
                                echo"<script>alert ('Berhasil') </script>";
                                echo"<meta http-equiv='refresh' content='0 url=header.php?page=komplain'>"; 
                              }else{
                                echo"<script>alert ('Gagal') </script>";
                                echo"<meta http-equiv='refresh' content='0 url=header.php?page=komplain'>"; 
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