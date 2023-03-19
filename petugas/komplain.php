<!--##########################################################################################################################-->
        <!-- TABEL MENAMPILKAN DATA DATA-->
<!--##########################################################################################################################-->

        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i> Komplain</h4>
              <section id="no-more-tables">
                <table class="table table-bordered table-striped table-condensed cf">
                  <thead class="cf">
                    <tr>
                        <th class="numeric text-center">nama</th>
                        <th class="numeric text-center">isi</th>
                        <th class="numeric text-center">tanggal komplain</th>
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