<?php
  include "../../conf/koneksi.php";
  include "../../lib/inc.session.php";
  include "nilai_owner.php"; 
?>

<!--Begin Datatables-->
<div class="row">
  <div class="col-lg-12">
    <div class="box">

      <header>
        <div class="icons">
          <i class="fa fa-th-large"></i>
        </div>
          <h5>Rincian Data Nilai Raport Siswa</h5>
          <ul class="nav pull-right">
            <li>
              <div class="btn-group">
                <a class="accordion-toggle btn btn-default btn-xs minimize-box" data-toggle="collapse" href="#div-1">
                  <i class="fa fa-minus"></i>
                </a> 
                <button class="btn btn-danger btn-xs close-box">
                  <i class="fa fa-times"></i>
                </button>
              </div>
            </li>
          </ul>
      </header>

      <div id="div-1" class="body collapse in"> 
        <table >
          <thead>
            <tr>
              <th rowspan="2">Mata Pelajaran</th>
              <th>&nbsp;</th>
              <th colspan="5"><center>Nilai Raport Semester</center></th>
              <th rowspan="2">Nilai Rata-rata</th>
            </tr>
            <tr>
              <th>&nbsp;</th>
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
              $sqlMpl = $conn->prepare("SELECT * FROM nilai_raport, mapel, psb
                                     WHERE nilai_raport.id_mapel = mapel.id_mapel
                                     AND nilai_raport.no_reg = psb.no_reg 
                                     AND nilai_raport.no_reg = :noreg ");
              $sqlMpl->bindParam(":noreg", mysql_real_escape_string(stripslashes(strip_tags($_GET['tid']))));
              $sqlMpl->execute();
              while($r = $sqlMpl->fetch()){
            ?>

                <input type="hidden" name="idmapel[]" value="<?php echo $r['id_mapel']; ?>">
                <tr>
                  <td><?php echo $r['mapel']; ?></td>
                  <td>&nbsp;</td>
                  <td><input type="text" class="form-control" name="nil1[]" id="nil1" value="<?php echo $r['nil1']; ?>" readonly></td>
                  <td><input type="text" class="form-control" name="nil2[]" id="nil2" value="<?php echo $r['nil2']; ?>" readonly></td>
                  <td><input type="text" class="form-control" name="nil3[]" id="nil3" value="<?php echo $r['nil3']; ?>" readonly></td>
                  <td><input type="text" class="form-control" name="nil4[]" id="nil4" value="<?php echo $r['nil4']; ?>" readonly></td>
                  <td><input type="text" class="form-control" name="nil5[]" id="nil5" value="<?php echo $r['nil5']; ?>" readonly></td>
                  <td><input type="text" class="form-control" name="ratarata[]" id="ratarata" value="<?php echo $r['nil_ratarata']; ?>" readonly></td>
                </tr>

              <?php } ?>

          </tbody>
        </table>
        <br>
      </div>
                
    </div>
  </div>
</div><!-- /.row -->

<div class="row">
  <div class="form-actions">
    <div class="col-lg-8">
      <button type="button" class="btn btn-default pull-left" data-dismiss="modal" onclick="self.history.back()">Cancel</button>
    </div>
  </div>
</div>

<div><br></div>