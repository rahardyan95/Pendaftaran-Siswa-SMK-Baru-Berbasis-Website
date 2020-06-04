            <?php
              include "../../conf/koneksi.php";
              include "../../lib/inc.session.php";
            ?>

            <!--Begin Datatables-->
            <div class="row">

              <br>

              <div class="col-xs-4">
                <input type="button" class="btn btn-block btn-primary" name="addBtnMapel" value="Tambah Mata Pelajaran" onclick="window.location='?page=admapel'">
              </div>

              <br><br>

              <div class="col-lg-12">
                <div class="box">
                  <header>
                    <div class="icons">
                      <i class="fa fa-table"></i>
                    </div>
                    <h5>Data Mata Pelajaran</h5>
                  </header>
                  <div id="collapse4" class="body">
                    <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Mata Pelajaran</th>
                          <th>Aktif</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                          /* versi PDO */
                          $sql = $conn->prepare("SELECT * FROM mapel ORDER BY id_mapel DESC");
                          $sql->execute();
                          $no = 1;
                          while ($r = $sql->fetch()){
                        ?>
                        
                            <tr>
                              <td><?php echo $no; ?></td>
                              <td><?php echo $r['mapel']; ?></td>
                              <td><?php echo $r['aktif_mapel']; ?></td>
                              <td align="center">
                                <div class="btn-group">
                                  <input type="button" class="btn btn-success" name="submit" value="Edit" onclick="window.location='?page=edmapel&tid=<?php echo $r['id_mapel']; ?>' ">
                                  <input type="button" class="btn btn-default" name="reset" value="Hapus" onclick="window.location='?page=dlmapel&tid=<?php echo $r['id_mapel']; ?>' ">
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

           