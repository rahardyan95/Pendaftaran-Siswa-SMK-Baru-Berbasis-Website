            <?php
              include "../../conf/koneksi.php";
              include "../../lib/inc.session.php";
            ?>

            <!--Begin Datatables-->
            <div class="row">

              <br>

              <div class="col-xs-4">
                <input type="button" class="btn btn-block btn-primary" name="addBtnKpmt" value="Tambah Kompetensi" onclick="window.location='?page=adkmpt'">
              </div>

              <br><br>

              <div class="col-lg-12">
                <div class="box">
                  <header>
                    <div class="icons">
                      <i class="fa fa-table"></i>
                    </div>
                    <h5>Data Kompetensi</h5>
                  </header>
                  <div id="collapse4" class="body">
                    <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Kode</th>
                          <th>Kompetensi</th>
                          <th>Kuota</th>
                          <th>Aktif</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                          /* versi PDO */
                          $sql = $conn->prepare("SELECT * FROM kompetensi ORDER BY id_kompetensi DESC");
                          $sql->execute();
                          $no = 1;
                          while ($r = $sql->fetch()){
                        ?>
                        
                            <tr>
                              <td><?php echo $no; ?></td>
                              <td><?php echo $r['id_kompetensi']; ?></td>
                              <td><?php echo $r['bid_kompetensi']; ?></td>
                               <td><?php echo $r['kuota']; ?></td>
                              <td><?php echo $r['aktif_kompetensi']; ?></td>
                              <td align="center">
                                <div class="btn-group">
                                  <input type="button" class="btn btn-success" name="submit" value="Edit" onclick="window.location='?page=edkmpt&tid=<?php echo $r['id_kompetensi']; ?>' ">
                                  <input type="button" class="btn btn-default" name="reset" value="Hapus" onclick="window.location='?page=dlkmpt&tid=<?php echo $r['id_kompetensi']; ?>' ">
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

           