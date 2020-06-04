<?php
  include "../../conf/koneksi.php";
  include "../../lib/inc.session.php";
      
  /* versi PDO */
  $sql = $conn->prepare("SELECT * FROM psb, ujian_masuk
                     WHERE psb.no_reg = ujian_masuk.no_reg
                     AND ujian_masuk.no_ujian = :noujian ");
  $sql->bindParam(":noujian", mysql_real_escape_string(stripslashes(strip_tags($_GET['tid']))));
  $sql->execute();
  while ($r = $sql->fetch()){

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

<div class="row">
  <div class="col-lg-12">
    <div class="box">

      <header>
        <div class="icons">
          <i class="fa fa-th-large"></i>
          </div>
            <h5>Rincian Data Ujian Saringan Masuk Siswa Baru</h5>
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
        <form action="?page=upusm" method="post">
          <input type='hidden' name='noreg' value="<?php echo $r['no_reg']; ?>" >

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">No. Ujian</label>
            <div class="col-lg-8">
              <input type="text" id="noujian" name="noujian" placeholder="No. ujian saringan masuk calon siswa baru" class="form-control" value="<?php echo $r['no_ujian']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">No. Pendaftaran</label>
            <div class="col-lg-8">
              <input type="text" id="noreg" name="noreg" placeholder="No. pendaftaran calon siswa baru" class="form-control" value="<?php echo $r['no_reg']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Nama Siswa</label>
            <div class="col-lg-8">
              <input type="text" id="nmcasis" name="nmcasis" placeholder="Nama calon siswa" class="form-control" value="<?php echo $r['nm_siswa']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Tanggal Ujian</label>
            <div class="col-lg-8">
              <input type="text" id="tglujian" name="tglujian" placeholder="Tanggal ujian saringan masuk calon siswa baru" class="form-control" value="<?php echo tgl_indo($r['tgl_ujian']); ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-lg-4">Waktu Ujian</label>
            <div class="col-lg-8">
              <div class="input-group bootstrap-timepicker">
                <input class="timepicker-24 form-control" type="text" name="waktu" value="<?php echo $r['jam_ujian']; ?>" required="required">
                <span class="input-group-addon add-on"><i class="fa fa-clock-o"></i></span> 
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Ruang Ujian</label>
            <div class="col-lg-8">
              <input type="text" id="rujian" name="rujian" placeholder="Ruang ujian saringan masuk calon siswa baru" class="form-control" value="<?php echo $r['ruang_ujian']; ?>" required="required" >
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Hasil Ujian</label>
            <div class="col-lg-8">
              <input type="text" id="hslujian" name="hslujian" placeholder="Hasil ujian saringan masuk calon siswa baru" class="form-control" value="<?php echo $r['hasil_ujian']; ?>" required="required" >
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Keterangan Ujian</label>
            <div class="col-lg-8">
              <input type="text" id="keterangan" name="keterangan" placeholder="Keterangan ujian saringan masuk calon siswa baru" class="form-control" value="<?php echo $ket; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-actions">
            <div class="col-lg-8">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal" onclick="self.history.back()">Cancel</button>&nbsp;
              <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </form>
      </div>
  
    </div>
  </div><!-- /.col-lg-12 -->
</div><!-- /.row -->

<?php } ?>


    