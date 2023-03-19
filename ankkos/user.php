<!--##########################################################################################################################-->
        <!-- TABEL MENAMPILKAN DATA DATA-->
<!--##########################################################################################################################-->

        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i> User <i class="fa fa-angle-right"></i> User</h4>
              <section id="no-more-tables">
                <table class="table table-bordered table-striped table-condensed cf">
                  <thead class="cf">
                    <tr>
                        <th class="numeric text-center">Nama</th>
                        <th class="numeric text-center">Alamat</th>
                        <th class="numeric text-center">Telpon</th>
                        <th class="numeric text-center">Email</th>
                        <th class="numeric text-center">Username</th>
                        <th class="numeric text-center">Password</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php              
                  session_start();
                  include "../config.php";
                  $qq = $_SESSION['idu'];
                  $qry=mysql_query("select * from user,hak_akses where user.id_akses=hak_akses.id_akses AND user.id_user='$qq'");
                  while($data=mysql_fetch_array($qry)){
                  ?>
                    <tr>
                    <td class="numeric text-center" data-title="Nama"><?php echo $data['nama'];?></td>
                      <td class="numeric text-center" data-title="Nama"><?php echo $data['alamat'];?></td>
                      <td class="numeric text-center" data-title="Nama"><?php echo $data['telp'];?></td>
                      <td class="numeric text-center" data-title="Nama"><?php echo $data['email'];?></td>
                      <td class="numeric text-center" data-title="NIP"><?php echo $data['username'];?></td>
                      <td class="numeric text-center" data-title="Password"><?php echo $data['password'];?></td>
                      <td class="numeric text-center" data-title="Aksi">
                      <div class="btn-group">
                      <button data-toggle="modal" data-target="#editmodal<?php echo $data['id_user']; ?>" class="btn btn-warning"><i class="fa fa-pencil-alt"></i> ubah</button>
                      </div></td>
                    </tr>
 
                    <!--##########################################################################################################################-->
                            <!-- MODAL EDIT DATA-->
                    <!--##########################################################################################################################-->

                    <div id="editmodal<?php echo $data['id_user']; ?>" role="dialog" class="modal fade">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Ubah</h4>
                            </div>
                            <div class="modal-body">
                              <form role="form" action="prosesUser.php" method="get">
                              <?php
                                            $id = $data['id_user']; 
                                            $query_edit = mysql_query("select user.*,hak_akses.nama_akses from user,hak_akses where user.id_akses=hak_akses.id_akses and user.id_user='$id'");
                                            while ($row = mysql_fetch_array($query_edit)) {  
                                            ?>
                              <input type="hidden" name="id" value="<?php echo $row['id_user']; ?>">
                                <div class="form-group">
                                  <label>Nama</label>
                                  <input name="nama" type="text" class="form-control" value="<?php echo $row['nama']; ?>">
                                </div>
                                <div class="form-group">
                                  <label>Alamat</label>
                                  <input name="alamat" type="text" class="form-control" value="<?php echo $row['alamat']; ?>">
                                </div>
                                <div class="form-group">
                                  <label>Email</label>
                                  <input name="email" type="text" class="form-control" value="<?php echo $row['email']; ?>">
                                </div>		
                                <div class="form-group">
                                  <label>Telpon</label>
                                  <input name="telp" type="text" class="form-control" value="<?php echo $row['telp']; ?>">
                                </div>
                                <div class="form-group">
                                  <label>Username</label>
                                  <input name="user" type="text" class="form-control" value="<?php echo $row['username']; ?>">
                                </div>
                                <div class="form-group">
                                  <label>Password</label>
                                  <input name="pass" type="text" class="form-control" value="<?php echo $row['password']; ?>">
                                </div>
                                <p id="demo"></p>
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
                </table>
              </section>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>
        <!-- /row -->