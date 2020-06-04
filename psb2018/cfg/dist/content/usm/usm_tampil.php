            <?php
              include "../../conf/koneksi.php";
              include "../../lib/inc.session.php";
            ?>

            <br>
            <form action="../dist/content/usm/actionexport.php" method="post" name="postform">
              <div class="col-xs-3">
                <input type="submit" class="btn btn-block btn-primary" name="getXls" value="Export to CSV">
              </div>
            </form>

            <br><br>

            <!--Begin Datatables-->
            <div class="row">
              <div class="col-lg-12">
                <div class="box">
                  <header>
                    <div class="icons">
                      <i class="fa fa-table"></i>
                    </div>
                    <h5>Data Ujian Saringan Masuk Siswa Baru</h5>
                  </header>
                  <div id="collapse4" class="body">
                    <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>No. Ujian</th>
                          <th>Nama Siswa</th>
                          <th>Tgl Ujian</th>
                          <th>Waktu</th>
                          <th>Ruang</th>
                          <th>Ket.</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                          /* versi PDO */
                          $sql = $conn->prepare("SELECT * FROM psb, ujian_masuk
                                              WHERE psb.no_reg = ujian_masuk.no_reg
                                              ORDER BY ujian_masuk.no_ujian DESC");
                          $sql->execute();
                          $no = 1;
                          while ($r = $sql->fetch()){
                        ?>
                        
                            <tr>
                              <td><?php echo $no; ?></td>
                              <td><?php echo $r['no_ujian']; ?></td>
                              <td><?php echo $r['nm_siswa']; ?></td>
                              <td><?php echo tgl_indo($r['tgl_ujian']); ?></td>
                              <td><?php echo $r['jam_ujian']; ?></td>
                              <td><?php echo $r['ruang_ujian']; ?></td>
                              <td><?php echo $r['ket_ujian']; ?></td>
                              <td align="center">
                                <div class="btn-group">
                                  <input type="button" class="btn btn-success" name="submit" value="Detail" onclick="window.location='?page=dtusm&tid=<?php echo $r['no_ujian']; ?>' ">
                                  <input type="button" class="btn btn-default" name="reset" value="Hapus" onclick="window.location='?page=dlusm&tid=<?php echo $r['no_ujian']; ?>' ">
                                </div>
                              </td>
                            </tr>

                        <?php $no++; } ?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div><!-- /.row -->

           