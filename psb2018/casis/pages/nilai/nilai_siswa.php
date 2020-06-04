            <?php
              include "../conf/koneksi.php";
              include "../lib/inc.session.sis.php";

              /* versi PDO */
              $sqlPsb = $conn->prepare("SELECT * FROM psb 
                                        WHERE no_reg = :noreg ");
              $sqlPsb->bindParam(":noreg", $_SESSION['noreg']);
              $sqlPsb->execute();
              $p = $sqlPsb->fetch();
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
                      <h3>Input Nilai Raport</h3>
                    </div>
                  </header>

                  <div class="alert alert-info">
                    <b>PERHATIAN!</b><br>
                    Input nilai raport semester SMP dari kelas VII sampai dengan kelas IX.<br>
                    <li>Untuk kolom 1 dan 2, mohon isi dengan nilai raport kelas VII semester 1 dan 2.</li>
                    <li>Untuk kolom 3 dan 4, mohon isi dengan nilai raport kelas VIII semester 1 dan 2.</li>
                    <li>Untuk kolom 5, mohon isi dengan nilai raport kelas IX semester 1.</li>
                    <br>
                    Gunakan tanda titik (.) untuk menyatakan nilai raport yang mengandung koma. Contoh: 75.5<br>
                    Apabila terjadi kesalahan dalam penginputan nilai, segera lakukan perubahan nilai.
                  </div>

                  <div id="collapse4" class="body"> 
                    <form name="form1" action="?page=svnil" method="post" >
                      <input type="hidden" name="noreg" value="<?php echo $_SESSION['noreg']; ?>">
                        <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped table-responsive">
                          <thead>
                            <tr>
                              <th rowspan="2">#</th>
                              <th rowspan="2">Mata Pelajaran</th>
                              <th colspan="5"><center>Nilai Raport Semester</center></th>
                              <th rowspan="2">Nilai Rata-rata</th>
                            </tr>
                            <tr>
                              <th><center>1</center></th>
                              <th><center>2</center></th>
                              <th><center>3</center></th>
                              <th><center>4</center></th>
                              <th><center>5</center></th>
                            </tr>
                          </thead>
                          <tbody>

                            <?php
                              /* versi PDO */
                              $tampil = $conn->prepare("SELECT * FROM mapel ORDER BY id_mapel");
                              $tampil->execute();
                              while($r = $tampil->fetch()){
                                $sqlcheck = $conn->prepare("SELECT * FROM nilai_raport
                                                        WHERE id_mapel = :idmapel
                                                        AND no_reg = :noreg ");
                                $sqlcheck->bindParam(":noreg", $_SESSION['noreg']);
                                $sqlcheck->bindParam(":idmapel", $r['id_mapel']);
                                $sqlcheck->execute(); 

                                if(!$sqlcheck->fetch()){
                                  $sql = "INSERT INTO nilai_raport (no_reg,
                                                                  id_mapel)
                                                            VALUES ('$_SESSION[noreg]',
                                                                    '$r[id_mapel]')";
                                  $stmt = $conn->prepare($sql);
                                  $stmt->execute();
                                }

// echo"<pre>";
// print_r($sqlcheck->fetch());
// echo"</pre>";
// exit;
                              }







                              $sqlMpl = $conn->prepare("SELECT * FROM nilai_raport, mapel, psb
                                                      WHERE nilai_raport.id_mapel = mapel.id_mapel
                                                      AND nilai_raport.no_reg = psb.no_reg
                                                      AND psb.no_reg = :noreg ");
                              $sqlMpl->bindParam(":noreg", $_SESSION['noreg']);
                              $sqlMpl->execute();
                              $no = 1;
                              while($r = $sqlMpl->fetch()){
                            ?>

                                <input type="hidden" name="idmapel[]" value="<?php echo $r['id_mapel']; ?>">

                                <tr>
                                  <td><?php echo $no; ?></td>
                                  <td><?php echo $r['mapel']; ?></td>
                                  <td><input type="text" class="form-control" name="nil1[]" id="nil1" value="<?php echo $r['nil1']; ?>"></td>
                                  <td><input type="text" class="form-control" name="nil2[]" id="nil2" value="<?php echo $r['nil2']; ?>"></td>
                                  <td><input type="text" class="form-control" name="nil3[]" id="nil3" value="<?php echo $r['nil3']; ?>"></td>
                                  <td><input type="text" class="form-control" name="nil4[]" id="nil4" value="<?php echo $r['nil4']; ?>"></td>
                                  <td><input type="text" class="form-control" name="nil5[]" id="nil5" value="<?php echo $r['nil5']; ?>"></td>
                                  <td><input type="text" class="form-control" name="ratarata[]" id="ratarata" value="<?php echo $r['nil_ratarata']; ?>" readonly></td>
                                </tr>

                            <?php $no++; } ?>

                          </tbody>
                        </table>

                      <div class="form-actions">
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                      </div>
                      
                    </form>
                  </div>
                </div>
              </div>
            </div><!-- /.row -->