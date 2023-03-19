<!--##########################################################################################################################-->
        <!-- TABEL MENAMPILKAN DATA DATA-->
<!--##########################################################################################################################-->

        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i> Sewa</h4>
              <h5><button data-toggle="modal" data-target="#myModal" class="btn btn-info"><i class="fa fa-plus"></i> Sewa</button></h5>
              <section id="no-more-tables">
                <table class="table table-bordered table-striped table-condensed cf">
                  <thead class="cf">
                    <tr>
                        <th class="numeric text-center">nama</th>
                        <th class="numeric text-center">nomer kamar</th>
                        <th class="numeric text-center">lama kos</th>
                        <th class="numeric text-center">total</th>
                        <th class="numeric text-center">tanggal masuk</th>
                        <th class="numeric text-center">tanggal bayar</th>
                        <th class="numeric text-center">nominal kurang</th>
                        <th class="numeric text-center">status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php              
                  session_start();
                  include "../config.php";
                  $qq = $_SESSION['idu'];
                  $qry=mysql_query("select sewa.id_sewa,tagihan.id_tagihan,user.nama,kamar.nomer_kamar,sewa.lama_kos,sewa.tgl_masuk,sewa.total,
                  tagihan.tgl_pembayaran,tagihan.nominal as selesai,(select 'selesai' from tagihan where sewa.id_sewa=tagihan.id_sewa AND sewa.total=tagihan.nominal) as proses from sewa 
                  inner join user on sewa.id_user=user.id_user inner join kamar on sewa.id_kamar=kamar.id_kamar 
                  left join tagihan on sewa.id_sewa=tagihan.id_sewa where sewa.id_user='$qq'");
                  while($data=mysql_fetch_array($qry)){
                  ?>
                    <tr>
                      <td class="numeric text-center" data-title="Nama"><?php echo $data['nama'];?></td>
                      <td class="numeric text-center" data-title="Nama"><?php echo $data['nomer_kamar'];?></td>
                      <td class="numeric text-center" data-title="Nama"><?php echo $data['lama_kos'];?> bulan</td>
                      <td class="numeric text-center" data-title="Nama">Rp.<?php echo $data['total'];?></td>
                      <td class="numeric text-center" data-title="Nama"><?php echo $data['tgl_masuk'];?></td>
                      <td class="numeric text-center" data-title="Nama"><?php echo $data['tgl_pembayaran'];?></td>
                      <td class="numeric text-center" data-title="Nama">Rp.<?php echo $data['total']-$data['selesai'];?></td>
                      <td class="numeric text-center" data-title="Nama"><?php echo $data['proses'];?></td>
                      <td class="numeric text-center" data-title="Aksi">
                      <div class="btn-group">
                      <button data-toggle="modal" data-target="#deletemodal<?php echo $data['id_sewa']; ?>" class="btn btn-success"> Selesai</button>
                      <button data-toggle="modal" data-target="#barumodal<?php echo $data['id_sewa']; ?>" class="btn btn-info"> Perbarui</button>
                      <button data-toggle="modal" data-target="#editmodal<?php echo $data['id_sewa']; ?>" class="btn btn-warning"> Bayar</button>
                      <button data-toggle="modal" data-target="#delete1modal<?php echo $data['id_sewa']; ?>" class="btn btn-danger"> Hapus</button>
                      </div></td>

                      <!--##########################################################################################################################-->
                            <!-- MODAL PERBARUI DATA-->
                    <!--##########################################################################################################################-->

                    <div id="barumodal<?php echo $data['id_sewa']; ?>" role="dialog" class="modal fade">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Bayar</h4>
                            </div>
                            <div class="modal-body">
                              <form role="form" action="prosesSewa.php" method="get">
                                    <?php
                                    $id = $data['id_sewa']; 
                                    $query_edit = mysql_query("SELECT * FROM sewa WHERE  id_sewa='$id'");
                                    while ($row = mysql_fetch_array($query_edit)) {  
                                    ?>
                              <input type="hidden" name="id_baru" value="<?php echo $row['id_sewa']; ?>">	
                              <div class="form-group">
                                  <label>Kurang</label>
                                  <?php
                                  $aa = $row['id_sewa'];
                                  $q = mysql_query("SELECT sewa.total,tagihan.nominal FROM sewa,tagihan WHERE sewa.id_sewa=tagihan.id_sewa AND sewa.id_sewa='$id'");
                                  while ($row = mysql_fetch_array($q)) {  
                                  ?>
                                  <input type="text" name="awal" class="form-control" value="Rp.<?php echo $row['total']-$row['nominal']; ?>" disabled>
                                  <?php }?>
                              </div>	
                              <div class="form-group">
                                  <label>Nominal Bayar</label>
                                  <input type="text" class="form-control" name="bayarr" required="required">
                              </div>
                              <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" value="Bayar">
                              </div>
                                    <?php }?>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--##########################################################################################################################-->
                            <!-- MODAL DELETE DATA-->
                    <!--##########################################################################################################################-->

                    <div id="delete1modal<?php echo $data['id_sewa']; ?>" role="dialog" class="modal fade">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Hapus</h4>
                            </div>
                            <div class="modal-body">
                            <div class="alert alert-danger"><strong>Peringatan!</strong> menghapus data yang di pilih.</div>
                              <form role="form" action="prosesSewa.php" method="get">
                                    <?php
                                    $id = $data['id_sewa']; 
                                    $query_edit = mysql_query("SELECT * FROM sewa WHERE id_sewa='$id'");
                                    while ($row = mysql_fetch_array($query_edit)) {  
                                    ?>
                              <input type="hidden" name="id_apuss" value="<?php echo $row['id_sewa']; ?>">		
                              <input type="hidden" name="id_apusu" value="<?php echo $row['id_user']; ?>">		
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <input type="submit" class="btn btn-primary" value="Hapus">
                              </div>
                                    <?php }?>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                      <!--##########################################################################################################################-->
                            <!-- MODAL DELETE DATA-->
                    <!--##########################################################################################################################-->

                    <div id="deletemodal<?php echo $data['id_sewa']; ?>" role="dialog" class="modal fade">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Hapus</h4>
                            </div>
                            <div class="modal-body">
                            <div class="alert alert-success"><strong>Info!</strong> menyelesaikan data yang di pilih.</div>
                              <form role="form" action="prosesSewa.php" method="get">
                                    <?php
                                    $id = $data['id_sewa']; 
                                    $query_edit = mysql_query("SELECT * FROM sewa WHERE id_sewa='$id'");
                                    while ($row = mysql_fetch_array($query_edit)) {  
                                    ?>
                              <input type="hidden" name="id_apus" value="<?php echo $row['id_sewa']; ?>">		
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
                            <!-- MODAL BAYAR DATA-->
                    <!--##########################################################################################################################-->

                    <div id="editmodal<?php echo $data['id_sewa']; ?>" role="dialog" class="modal fade">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Bayar</h4>
                            </div>
                            <div class="modal-body">
                              <form role="form" action="prosesSewa.php" method="get">
                              <div class="form-group">
                                  <label>Nominal Bayar</label>
                                  <input type="text" class="form-control" name="bayar" required="required">
                              </div>
                                    <?php
                                    $id = $data['id_sewa']; 
                                    $query_edit = mysql_query("SELECT * FROM sewa WHERE id_sewa='$id'");
                                    while ($row = mysql_fetch_array($query_edit)) {  
                                    ?>
                              <input type="hidden" name="id" value="<?php echo $row['id_sewa']; ?>">		
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <input type="submit" class="btn btn-primary" value="Bayar">
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
                                <label>Kamar</label>
                                <select class="form-control" name="kamar">
                                <option>nomer kamar : harga - lantai - kamar mandi</option>
                                <?php 
                                    $t_kelas1=(mysql_query("SELECT * FROM kamar"));
                                    while ($t_kel1=mysql_fetch_array($t_kelas1)){
                                      $t_id1=$t_kel1['id_kamar'];  
                                    ?>
                                    <option value="<?= $t_kel1['id_kamar']; ?>"><?= $t_kel1['nomer_kamar']; ?> : Rp.<?= $t_kel1['harga']; ?> - Lt.<?= $t_kel1['lantai']; ?> - kamar mandi <?= $t_kel1['kmr_mndi']; ?></option>
                                <?php }?>
                                </select>
                                </div>
                                <div class="form-group">
                                  <label>Lama Kos</label>
                                  <input type="text" class="form-control" placeholder="berapa bulan" name="lama" required="required">
                                </div>
                              <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" name="tambah" value="Add">
                              </div>
                            </form>
                            <?php
                            if(isset($_POST['tambah'])){
                            $kamar=$_POST['kamar'];
                            $lm=$_POST['lama'];
                            $kk = $_SESSION['idu'];
                            $dd = date("Y-m-d");
                            $dt=mysql_query("select * from kamar where id_kamar='$kamar'");
                            $data=mysql_fetch_array($dt);
                            $jml=$data['harga']*$lm;
                            //id_user,id_kamar,lamakos,tglmasuk,total
                            $tambah=mysql_query("INSERT INTO sewa values('','$kk','$kamar','$lm','$dd','$jml')") ;
                              if($tambah){
                                echo"<script>alert ('Berhasil') </script>";
                                echo"<meta http-equiv='refresh' content='0 url=header.php?page=sewa'>"; 
                              }else{
                                echo"<script>alert ('Gagal') </script>";
                                echo"<meta http-equiv='refresh' content='0 url=header.php?page=sewa'>"; 
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