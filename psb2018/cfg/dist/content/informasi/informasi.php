<?php
  include "../../conf/koneksi.php";
  include "../../lib/inc.session.php";
      
  /* versi PDO */
  $info = $conn->prepare("SELECT * FROM informasi LIMIT 1");
  $info->execute();
  while($r = $info->fetch()){
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
            <h5>Informasi Penerimaan Siswa Baru</h5>
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
        <form action="?page=upcrinfo" method="post" enctype="multipart/form-data">
          <input type='hidden' name='tid' value="<?php echo $r['id_info']; ?>" >

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Judul Informasi</label>
            <div class="col-lg-8">
              <input type="text" id="jdl_info" name="jdl_info" placeholder="Judul informasi" class="form-control" value="<?php echo $r['judul_info']; ?>" required="required">
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Deskripsi Informasi</label>
            <div class="col-lg-8">
              <textarea id="wysihtml5" class="form-control" rows="10" name="isi_info"><?php echo $r['deskripsi_info']; ?></textarea>
            </div>
          </div>

          <div><br></div>

         

          <div class="form-group">
            <label class="control-label col-lg-4">Gambar Informasi</label>
            <div class="col-lg-8">

              <?php
                if ($r['pic_info']!=''){                    
              ?>

             <!--   <div class="form-group">
                  <div class="col-lg-12"> -->
                    <?php echo "<img src='img_informasi/$r[pic_info]' oncontextmenu='return false;'>"; ?> 
                    <!-- script (oncontextmenu='return false;'): mencegah gambar tidak dapat di klik kanan. -->
               <!--  </div>
                </div>  -->

              <?php } else { ?>

            <!--     <div class="form-group">
                  <div class="col-lg-8"> -->
                    <?php echo "<img src='img_informasi/image_not_available.jpg' oncontextmenu='return false;'>"; ?>
                    <!-- script (oncontextmenu='return false;'): mencegah gambar tidak dapat di klik kanan. -->
                <!--   </div>
                </div> -->

              <?php } ?>
              <input type="file" name="fupload">
            </div>
          </div>

          <!-- <div class="form-group"> -->
          
                    
          <div class="form-group">
              <label class="control-label col-lg-4">Aktif Informasi</label>
              <div class="col-lg-8">
                
                <!-- <div class="checkbox"> -->
                  <input class="" type="radio" name="aktif" value="Y" <?=($r['aktif_info']=='Y') ? 'checked' : '';?>> Ya
                  <input class="" type="radio" name="aktif" value="N" <?=($r['aktif_info']=='N') ? 'checked' : '';?>> Tidak
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