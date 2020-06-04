            <?php
              include "../../conf/koneksi.php";
              include "../../lib/inc.session.php";
            ?>

            <!--Begin Datatables-->
            <div class="row">
              <div class="col-lg-12">
                <div class="box">
                  <header>
                    <div class="icons">
                      <i class="fa fa-table"></i>
                    </div>
                    <h5>Data Pengguna Sistem</h5>
                  </header>
                  <div id="collapse4" class="body">
                    <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Username</th>
                          <th>Nama Lengkap</th>
                          <th>Email</th>
                          <th>Aktif</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                          $ses = isset($_SESSION['stat_admin']) ? $_SESSION['stat_admin'] : '';

                          if($ses == 'Admin'){
                            /* versi PDO */
                            $sql = $conn->prepare("SELECT * FROM admin ORDER BY username DESC");
                            $sql->execute();
                          } else {
                            /* versi PDO */
                            $sql = $conn->prepare("SELECT * FROM admin 
                                                  WHERE username = :username ");
                            $sql->bindParam(":username", $_SESSION['usernm']);
                            $sql->execute();
                          }

                          $no = 1;
                          /* versi PDO */
                          while ($r = $sql->fetch()){
                            if($ses == 'Admin'){
                        ?>
                        
                              <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $r['username']; ?></td>
                                <td><?php echo $r['nm_lengkap']; ?></td>
                                <td><?php echo $r['email_admin']; ?></td>
                                <td><?php echo $r['aktif_admin']; ?></td>
                                <td align="center">
                                  <div class="btn-group">
                                    <input type="button" class="btn btn-success" name="submit" value="Edit" onclick="window.location='?page=eduser&tid=<?php echo $r['username']; ?>' ">
                                  </div>
                                </td>
                              </tr>

                            <?php } else { ?>

                              <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $r['username']; ?></td>
                                <td><?php echo $r['nm_lengkap']; ?></td>
                                <td><?php echo $r['email_admin']; ?></td>
                                <td><?php echo $r['aktif_admin']; ?></td>
                                <td align="center">
                                  <div class="btn-group">
                                    <input type="button" class="btn btn-success" name="submit" value="Edit" onclick="window.location='?page=eduser&tid=<?php echo $r['username']; ?>' ">
                                  </div>
                                </td>
                              </tr>

                            <?php } ?>

                        <?php $no++; } ?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div><!-- /.row -->