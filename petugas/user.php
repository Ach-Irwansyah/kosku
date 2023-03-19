<!--##########################################################################################################################-->
        <!-- TABEL MENAMPILKAN DATA DATA-->
<!--##########################################################################################################################-->

        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i> User <i class="fa fa-angle-right"></i> User</h4>
              <h5><button data-toggle="modal" data-target="#myModal" class="btn btn-info"><i class="fa fa-plus"></i> Tambah</button></h5>
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
                        <th class="numeric text-center">Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php              
                  include "../config.php";
                  $qry=mysql_query("select * from user,hak_akses where user.id_akses=hak_akses.id_akses AND NOT user.id_akses='1' ORDER BY hak_akses.nama_akses DESC");
                  while($data=mysql_fetch_array($qry)){
                  ?>
                    <tr>
                    <td class="numeric text-center" data-title="Nama"><?php echo $data['nama'];?></td>
                      <td class="numeric text-center" data-title="Nama"><?php echo $data['alamat'];?></td>
                      <td class="numeric text-center" data-title="Nama"><?php echo $data['telp'];?></td>
                      <td class="numeric text-center" data-title="Nama"><?php echo $data['email'];?></td>
                      <td class="numeric text-center" data-title="NIP"><?php echo $data['username'];?></td>
                      <td class="numeric text-center" data-title="Password"><?php echo $data['password'];?></td>
                      <td class="numeric text-center" data-title="Nama"><?php echo $data['nama_akses'];?></td>
                      <td class="numeric text-center" data-title="Aksi">
                      <div class="btn-group">
                      <button type="button" data-toggle="modal" data-target="#deletemodal<?php echo $data['id_user']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                      <button data-toggle="modal" data-target="#editmodal<?php echo $data['id_user']; ?>" class="btn btn-warning"><i class="fa fa-pencil-alt"></i> ubah</button>
                      </div></td>
                      
                    <!--##########################################################################################################################-->
                            <!-- MODAL DELETE DATA-->
                    <!--##########################################################################################################################-->

                    <div id="deletemodal<?php echo $data['id_user']; ?>" role="dialog" class="modal fade">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Hapus</h4>
                            </div>
                            <div class="modal-body">
                            <div class="alert alert-danger"><strong>Peringatan!</strong> menghapus data yang di pilih.</div>
                              <form role="form" action="prosesUser.php" method="get">
                                    <?php
                                    $id = $data['id_user']; 
                                    $query_edit = mysql_query("SELECT * FROM user WHERE id_user='$id'");
                                    while ($row = mysql_fetch_array($query_edit)) {  
                                    ?>
                              <input type="hidden" name="id_apus" value="<?php echo $row['id_user']; ?>">		
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
                                <div class="form-group">
                                <label>Hak Akses</label>
                                <select class="form-control" name="level">
                                <option value="<?php echo $row['id_akses']; ?>">--<?php echo $row['nama_akses']; ?>--</option>
                                <?php 
                                $t_kelas1=(mysql_query("SELECT * FROM hak_akses WHERE NOT id_akses='1'"));
                                while ($t_kel1=mysql_fetch_array($t_kelas1)){
                                  $t_id1=$t_kel1['id_akses'];  
                                ?>
                                <option value="<?= $t_kel1['id_akses']; ?>"><?= $t_kel1['nama_akses']; ?></option>
                                <?php }?>
                          </select>
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
                </table>
              </section>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>
        <!-- /row -->

        <!--##########################################################################################################################-->
        <!-- MODAL TAMBAH DATA-->
        <!--##########################################################################################################################-->
<div id="myModal" class="modal fade">
  <div class="modal-dialog">
      <div class="modal-content">
        <form method="post">
          <div class="modal-header">				
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Add</h4>
          </div>
          <div class="modal-body">				
            <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control" name="nama" required="required">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" class="form-control" name="alamat" required="required">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" name="email" required="required">
            </div>
            <div class="form-group">
              <label>Telpon</label>
              <input type="text" class="form-control" name="telp" required="required">
            </div>
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" name="user" required="required">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" name="pass" required="required">
            </div>
            <div class="form-group">
              <label>Hak Akses</label>
              <select class="form-control" name="level">
              <option>pilih akses</option>
        <?php 
            $t_kelas1=(mysql_query("SELECT * FROM hak_akses WHERE NOT id_akses='1'"));
            while ($t_kel1=mysql_fetch_array($t_kelas1)){
              $t_id1=$t_kel1['id_akses'];  
            ?>
            <option value="<?= $t_kel1['id_akses']; ?>"><?= $t_kel1['nama_akses']; ?></option>
        <?php }?>
        </select>
            </div>
          </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-primary pull-right" name="daftar" value="Add">
          </div>
        </form>
        <?php
        if(isset($_POST['daftar'])){
        $nama=$_POST['nama'];
        $almt=$_POST['alamat'];
        $email=$_POST['email'];
        $tlp=$_POST['telp'];
        $usr=$_POST['user'];
        $pss=$_POST['pass'];
        $lv=$_POST['level'];
        $tambah=mysql_query("INSERT INTO user values('','$nama','$almt','$email','$tlp','$usr','$pss','$lv')") ;
          if($tambah){
            echo"<script>alert ('Berhasil') </script>";
            echo"<meta http-equiv='refresh' content='0 url=header.php?page=pengguna'>"; 
          }else{
            echo"<script>alert ('Gagal') </script>";
            echo"<meta http-equiv='refresh' content='0 url=header.php?page=pengguna'>"; 
          }
        }
        ?>
      </div>
    </div>