<?php
  include "../../conf/koneksi.php";
  include "../../lib/inc.session.php";

  /* versi PDO */
  $sql = $conn->prepare("SELECT * FROM psb, dok_foto
                     WHERE psb.no_reg = dok_foto.no_reg
                     AND dok_foto.id_dok_foto = :id_dok_foto ");
  $sql->bindParam(":id_dok_foto", mysql_real_escape_string(stripslashes(strip_tags($_GET['tid']))));
  $sql->execute();
  while($r = $sql->fetch()){
?>

<div class="row">
  <div class="col-lg-12">
    <div class="box">

      <header>
        <div class="icons">
          <i class="fa fa-th-large"></i>
          </div>
            <h5>Rincian Kelengkapan Dokumen Foto</h5>
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
          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">No. Pendaftaran</label>
            <div class="col-lg-8">
              <input type="text" id="noreg" name="noreg" placeholder="No. pendaftaran" class="form-control" value="<?php echo $r['no_reg']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Nama Siswa</label>
            <div class="col-lg-8">
              <input type="text" id="nmsis" name="nmsis" placeholder="Nama siswa" class="form-control" value="<?php echo $r['nm_siswa']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Tanggal Unggah</label>
            <div class="col-lg-8">
              <input type="text" id="tgl" name="tgl" placeholder="Tanggal unggah dokumen kartu keluarga" class="form-control" value="<?php echo tgl_indo($r['tgl_up_foto']); ?>" required="required" readonly>
            </div>
          </div>

          <?php
            if ($r['pic_foto']!=''){                    
          ?>
              <div class="form-group">
                <div class="col-lg-8">
                  <?php echo "<img src='./../dist/img_foto/$r[pic_foto]' >"; ?>
                </div>
              </div>
            <?php } else { ?>
              <div class="form-group">
                <div class="col-lg-8">
                  <?php echo "<img src='./../dist/img_foto/image_not_available.jpg' oncontextmenu='return false;'>"; ?>"; ?>
                  <!-- script (oncontextmenu='return false;'): mencegah gambar tidak dapat di klik kanan. -->
                </div>
              </div>
          <?php } ?>

          <div class="form-actions">
            <div class="col-lg-8">
              <button type="button" class="btn btn-md btn-default" name="reset" onClick="self.history.back()">Cancel</button>
            </div>
          </div>
      </div>
  
    </div>
  </div><!-- /.col-lg-12 -->
</div><!-- /.row -->

<?php } ?>