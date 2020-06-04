            <?php
              include "../conf/koneksi.php";
              include "../lib/inc.session.sis.php";
            ?>

            <!--Begin Datatables-->
            <div class="row">
              <div class="col-lg-12">
                <div class="box">
                  <header>
                    <div class="icons">
                      <i class="fa fa-table"></i>
                    </div>
                    <div class="page-header">
                      <h3>Data Calon Siswa</h3>
                    </div>
                  </header>

                  <div class="alert alert-info">
                    <b>PERHATIAN!</b>
                    <li>Lengkapi data siswa dengan meng-klik tombol berwarna hijau <b>(Lengkapi Data Siswa)</b> yang terdapat dikolom Aksi.</li>
                    <li>Apabila data siswa telah dilengkapi dan di verifikasi oleh admin, maka tombol akan berubah menjadi berwarna biru <b>(Cek Data Siswa)</b>. Calon siswa dapat merubah data siswa dengan meng-klik tombol ini.</li>
                    <li>Klik <b>Cetak</b> untuk mencetak data siswa sebagai <b>bukti pendaftaran siswa online</b> yang akan dilampirkan kepada pihak sekolah ketika melakukan proses registrasi ulang.</li> 
                  </div>

                  <div id="collapse4" class="body">
                    <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped table-responsive">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>NISN</th>
                          <th>Nama Siswa</th>
                          <th>Asal Sekolah</th>
                          <th>Status Verifikasi</th>
                          <th><center>Aksi</center></th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                          /* versi PDO */
                          $sql = $conn->prepare("SELECT * FROM psb 
                                              WHERE no_reg = :noreg
                                              ORDER BY no_reg DESC");
                          $sql->bindParam(":noreg", $_SESSION['noreg']);
                          $sql->execute();
                          $no = 1;
                          while($r = $sql->fetch()){
                        ?>
                        
                            <tr>
                              <td><?php echo $no; ?></td>
                              <td><?php echo $r['nisn']; ?></td>
                              <td><?php echo $r['nm_siswa']; ?></td>
                              <td><?php echo $r['asal_sekolah']; ?></td>
                              <td><?php echo $r['status_verifikasi']; ?></td>
                              <td align="center">
                                <?php
                                  if($r['status_verifikasi']=='Belum' OR $r['status_verifikasi']=='Batal'){
                                ?>
                                    <div class="btn-group">
                                      <input type="button" class="btn btn-success" name="submit" value="Lengkapi Data Siswa" onclick="window.location='?page=dtsis&tid=<?php echo $r['no_reg']; ?>' ">
                                    </div>
                                <?php } else { ?>
                                    <div class="btn-group">
                                      <input type="button" class="btn btn-primary" name="submit" value="Cek Data Siswa" onclick="window.location='?page=dtsis&tid=<?php echo $r['no_reg']; ?>' ">
                                      <a class="btn btn-default" name="btnCetak" href="./cetak/biodata" target="_blank">Cetak</a>
                                    </div>
                                <?php } ?>
                              </td>
                            </tr>

                        <?php $no++; } ?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div><!-- /.row -->

           