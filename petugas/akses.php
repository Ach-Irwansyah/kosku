<!--##########################################################################################################################-->
        <!-- TABEL MENAMPILKAN DATA DATA-->
<!--##########################################################################################################################-->

        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i> User <i class="fa fa-angle-right"></i> Hak Akses</h4>
              <section id="no-more-tables">
                <table class="table table-bordered table-striped table-condensed cf">
                  <thead class="cf">
                    <tr>
                        <th class="numeric text-center">Id</th>
                        <th class="numeric text-center">Nama</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php              
                  include "../config.php";
                  $qry=mysql_query("select * from hak_akses");
                  while($data=mysql_fetch_array($qry)){
                  ?>
                    <tr>
                    <td class="numeric text-center" data-title="Nama"><?php echo $data['id_akses'];?></td>
                      <td class="numeric text-center" data-title="Nama"><?php echo $data['nama_akses'];?></td>
                      <td class="numeric text-center" data-title="Aksi">
                      <div class="btn-group">
                          <button data-toggle="modal" data-target="#editmodal<?php echo $data['id_akses']; ?>" class="btn btn-warning"><i class="fa fa-pencil-alt"></i> ubah</button>
                      </div></td>
                    </tr>
 
                    <!--##########################################################################################################################-->
                            <!-- MODAL EDIT DATA-->
                    <!--##########################################################################################################################-->

                    <div id="editmodal<?php echo $data['id_akses']; ?>" role="dialog" class="modal fade">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Ubah</h4>
                            </div>
                            <div class="modal-body">
                              <form role="form" action="prosesAkses.php" method="get">
                              <?php
                                            $id = $data['id_akses']; 
                                            $query_edit = mysql_query("select * FROM hak_akses where id_akses='$id'");
                                            while ($row = mysql_fetch_array($query_edit)) {  
                                            ?>
                              <input type="hidden" name="id" value="<?php echo $row['id_akses']; ?>">
                                <div class="form-group">
                                  <label>Id</label>
                                  <input type="text" class="form-control" value="<?php echo $row['id_akses']; ?>" disabled>
                                </div>
                                <div class="form-group">
                                  <label>Nama</label>
                                  <input name="nama" type="text" class="form-control" value="<?php echo $row['nama_akses']; ?>">
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