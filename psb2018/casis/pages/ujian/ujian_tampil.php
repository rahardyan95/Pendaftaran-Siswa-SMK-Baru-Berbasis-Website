            <?php
              include "../conf/koneksi.php";
              include "../conf/fungsi_indotgl.php";
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
                      <h3>Ujian Saringan Masuk Calon Siswa</h3>
                    </div>
                  </header>

                  <div class="alert alert-info">
                    <b>PERHATIAN!</b>
                    <li>Cetak <b>Kartu Peserta Ujian Saringan Masuk</b> sebagai identitas peserta ujian saringan masuk.</li>
                    <li>Datang 30 menit sebelum pelaksanaan ujian untuk melakukan registrasi ulang peserta ujian.</li>
                    <li>Gunakan seragam sekolah masing-masing (putih-biru) untuk mengikuti ujian saringan masuk.</li>
                    <li>Informasi waktu dan ruang ujian akan tampil dalam waktu 1 x 24 jam terhitung dari tanggal pendaftaran calon siswa.</li>
                  </div>

                  <div id="collapse4" class="body">
                    <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped table-responsive">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>No. Ujian</th>
                          <th>Nama Peserta</th>
                          <th>Tgl Ujian</th>
                          <th>Waktu Ujian</th>
                          <th>Ruang Ujian</th>
                          <th>Keterangan</th>
                          <th><center>Aksi</center></th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                          /* versi PDO */
                          $sql = $conn->prepare("SELECT * FROM ujian_masuk, psb
                                              WHERE ujian_masuk.no_reg = psb.no_reg
                                              AND ujian_masuk.no_reg = :noreg ");
                          $sql->bindParam(":noreg", $_SESSION['noreg']);
                          $sql->execute();
                          $no = 1;
                          while($r = $sql->fetch()){

                            if($r['ket_ujian']=="Belum"){
                              $ket = "Belum Ujian";
                            }
                            else
                            if($r['ket_ujian']=="Lulus"){
                              $ket = "Lulus";
                            }
                            else
                            if($r['ket_ujian']=="Tidak"){
                              $ket = "Tidak Lulus";
                            }
                        ?>
                        
                            <tr>
                              <td><?php echo $no; ?></td>
                              <td><?php echo $r['no_ujian']; ?></td>
                              <td><?php echo $r['nm_siswa']; ?></td>
                              <td><?php echo tgl_indo($r['tgl_ujian']); ?></td>
                              <td><?php echo $r['jam_ujian']; ?></td>
                              <td><?php echo $r['ruang_ujian']; ?></td>
                              <td><?php echo $ket; ?></td>
                              <td align="center">
                                <?php
                                  if($r['jam_ujian'] != '00:00:00' AND $r['ruang_ujian'] != ''){
                                ?>
                                    <a class="btn btn-success" name="btnCetak" href="./cetak/kpusm" target="_blank">Cetak Kartu Peserta Ujian</a>
                                  <?php } else { ?>
                                    <a class="btn btn-danger" name="btnCetak" href="#" >Cetak Kartu Belum Tersedia</a>
                                <?php } ?>
                              </td>
                            </tr>

                            <?php
                              if($r['ket_ujian'] == 'Lulus'){
                            ?>
                                <div class="alert alert-success">
                                  <p>Selamat kamu terdaftar sebagai siswa baru di SMK NUSANTARA INDONESIA.</p>
                                  <b>NIS</b> kamu adalah <b><?php echo $r['nis']; ?></b>.
                                </div>
                            <?php } ?>

                        <?php $no++; } ?>

                      </tbody>
                    </table>
                  </div>
                  
                </div>
              </div>
            </div><!-- /.row -->

           