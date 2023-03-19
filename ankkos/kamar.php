<!--##########################################################################################################################-->
        <!-- TABEL MENAMPILKAN DATA DATA-->
<!--##########################################################################################################################-->

        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i> Kamar</h4>
              <section id="no-more-tables">
                <table class="table table-bordered table-striped table-condensed cf">
                  <thead class="cf">
                    <tr>
                        <th class="numeric text-center">nomer kamar</th>
                        <th class="numeric text-center">kamar mandi</th>
                        <th class="numeric text-center">lantai</th>
                        <th class="numeric text-center">harga</th>
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