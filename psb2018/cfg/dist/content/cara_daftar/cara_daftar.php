<?php
  include "../../conf/koneksi.php";
  include "../../lib/inc.session.php";
      
  /* versi PDO */
  $cd = $conn->prepare("SELECT * FROM cara_daftar LIMIT 1");
  $cd->execute();
  while($r = $cd->fetch()){
?>

<style>
  ul.wysihtml5-toolbar > li {
    position: relative;
  }
</style>

<div class="row">
  <div class="col-lg-12">
    <div class="box">

      <header>
        <div class="icons">
          <i class="fa fa-th-large"></i>
          </div>
            <h5>Cara Pendaftaran Siswa Baru</h5>
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
        <form action="?page=upcrdft" method="post" enctype="multipart/form-data">
          <input type='hidden' name='tid' value="<?php echo $r['id_caradft']; ?>" >

          <textarea id="wysihtml5" class="form-control" rows="10" name="isi_caradft"><?php echo $r['deskripsi_caradft']; ?></textarea>

          <div><br></div>

          <?php
            if ($r['pic_caradft']!=''){                    
          ?>

            <div class="form-group">
            <label class="control-label col-lg-4">Thumbnail image</label>
            <div class="col-lg-8">
              <?php echo "<img src='img_caradft/$r[pic_caradft]' oncontextmenu='return false;'>"; ?>
              <!-- script (oncontextmenu='return false;'): mencegah gambar tidak dapat di klik kanan. -->
            </div>
            </div>

          <?php } else { ?>

            <div class="form-group">
              <?php echo "<img src='img_caradft/image_not_available.jpg' oncontextmenu='return false;'>"; ?>
              <!-- script (oncontextmenu='return false;'): mencegah gambar tidak dapat di klik kanan. -->
            </div>

          <?php } ?>

          <div class="form-group">
            <label class="control-label col-lg-4">Gambar Cara Pendaftaran</label>
            <div class="col-lg-8">
              <input type="file" name="fupload">
            </div>
          </div>
<div class="clearfix"></div>
              <div class="form-group">
              <label class="control-label col-lg-4">Aktif Cara Pendaftaran</label>
              <div class="col-lg-8">
                
                <!-- <div class="checkbox"> -->
                  <input class="" type="radio" name="aktif" value="Y" <?=($r['aktif_caradft']=='Y') ? 'checked' : '';?>> Ya
                  <input class="" type="radio" name="aktif" value="N" <?=($r['aktif_caradft']=='N') ? 'checked' : '';?>> Tidak
                <!-- </div> -->
              </div>
          </div>
          <!-- </div> -->

          <div class="form-actions">
            <div class="col-lg-8">
              <button type="button" class="btn btn-md btn-default" name="reset" onClick="self.history.back()">Cancel</button>
              <input type="submit" name="submit" value="Save changes" class="btn btn-primary">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div><!-- /.col-lg-12 -->
</div><!-- /.row -->

<?php } ?>