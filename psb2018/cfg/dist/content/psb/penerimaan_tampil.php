            <?php
              include "../../conf/koneksi.php";
              include "../../lib/inc.session.php";
            ?>

            <br>
            <form action="../dist/content/psb/actionexport.php" method="post" name="postform">
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
                    <h5>Data Penerimaan Siswa Baru</h5>
                  </header>
                  <div id="collapse4" class="body">
                    <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>No Pendaftaran</th>
                          <th>NISN</th>
                          <th>Nama Siswa</th>
                          <th>Asal Sekolah</th>
                          <th>Status Verifikasi</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                          /* versi PDO */
                          $sql = $conn->prepare("SELECT * FROM psb ORDER BY no_reg DESC");
                          $sql->execute();
                          $no = 1;
                          while($r = $sql->fetch()){
                        ?>
                        
                            <tr>
                              <td><?php echo $no; ?></td>
                              <td><?php echo $r['no_reg']; ?></td>
                              <td><?php echo $r['nisn']; ?></td>
                              <td><?php echo $r['nm_siswa']; ?></td>
                              <td><?php echo $r['asal_sekolah']; ?></td>
                              <td><?php echo $r['status_verifikasi']; ?></td>
                              <td align="center">
                                <div class="btn-group">
                                  <input type="button" class="btn btn-success" name="submit" value="Detail Siswa" onclick="window.location='?page=dtreg&tid=<?php echo $r['no_reg']; ?>' ">
                                </div>
                                <div class="btn-group">
                                  <input type="button" class="btn btn-info" name="submit" value="Nilai Raport" onclick="window.location='?page=dtnil&tid=<?php echo $r['no_reg']; ?>' ">
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