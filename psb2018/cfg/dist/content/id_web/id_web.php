<?php
  include "../../conf/koneksi.php";
  include "../../lib/inc.session.php";
      
  /* versi PDO */
  $id = $conn->prepare("SELECT * FROM identitas_web LIMIT 1");
  $id->execute();
  while($r = $id->fetch()){
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
            <h5>Identitas Website</h5>
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
        <form action="?page=upcridweb" method="post">
          <input type='hidden' name='tid' value="<?php echo $r['id_identitas']; ?>" >

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Nama Website Sekolah</label>
            <div class="col-lg-8">
              <input type="text" id="nm_web" name="nm_web" placeholder="Nama website" class="form-control" value="<?php echo $r['nm_website']; ?>" required="required">
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Nama Sekolah</label>
            <div class="col-lg-8">
              <input type="text" id="nm_skl" name="nm_skl" placeholder="Nama sekolah" class="form-control" value="<?php echo $r['nm_sekolah']; ?>" required="required">
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Alamat Sekolah</label>
            <div class="col-lg-8">
              <textarea id="wysihtml5" class="form-control" rows="10" name="alamat_skl"><?php echo $r['alamat_sekolah']; ?></textarea>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Kode Pos</label>
            <div class="col-lg-8">
              <input type="text" id="kodepos" name="kodepos" placeholder="Kode pos" class="form-control" value="<?php echo $r['kode_pos']; ?>" required="required">
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">No. Telepon Sekolah</label>
            <div class="col-lg-8">
              <input type="text" id="tlp_skl" name="tlp_skl" placeholder="No. telepon sekolah" class="form-control" value="<?php echo $r['tlp_sekolah']; ?>" required="required">
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Email Sekolah</label>
            <div class="col-lg-8">
              <input type="text" id="email_skl" name="email_skl" placeholder="Email sekolah" class="form-control" value="<?php echo $r['email_sekolah']; ?>" required="required">
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">URL Sekolah</label>
            <div class="col-lg-8">
              <input type="text" id="url_skl" name="url_skl" placeholder="http://" class="form-control" value="<?php echo $r['url']; ?>" required="required">
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Akun Facebook Sekolah</label>
            <div class="col-lg-8">
              <input type="text" id="fb_skl" name="fb_skl" placeholder="Akun facebook sekolah" class="form-control" value="<?php echo $r['facebook']; ?>" required="required">
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Akun Twitter Sekolah</label>
            <div class="col-lg-8">
              <input type="text" id="twitter_skl" name="twitter_skl" placeholder="Akun twitter sekolah" class="form-control" value="<?php echo $r['twitter']; ?>" required="required">
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Akun Instagram Sekolah</label>
            <div class="col-lg-8">
              <input type="text" id="insta_skl" name="insta_skl" placeholder="Akun instagram sekolah" class="form-control" value="<?php echo $r['instagram']; ?>" required="required">
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Profil Website</label>
            <div class="col-lg-8">
              <textarea id="wysihtml5" class="form-control" rows="10" name="profil_web"><?php echo $r['profil_web']; ?></textarea>
            </div>
          </div>

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