<?php
  include "../../conf/koneksi.php";
  include "../../lib/inc.session.php";

  $ses = isset($_SESSION['stat_admin']) ? $_SESSION['stat_admin'] : '';
      
  if($ses == 'Admin' OR $ses == 'User'){
    /* versi PDO */
    $sql = $conn->prepare("SELECT * FROM admin
                     WHERE username = :username ");
    $sql->bindParam(":username", mysql_real_escape_string(stripslashes(strip_tags($_GET['tid']))));
    $sql->execute();
  }

  /* versi PDO */
  while ($r = $sql->fetch()){
?>

<style>
  ul.wysihtml5-toolbar > li {
    position: relative;
  }
</style>

<?php
/*----------------- session admin ------------------*/
  if($ses == 'Admin'){
?>
<div class="row">
  <div class="col-lg-12">
    <div class="box">

      <header>
        <div class="icons">
          <i class="fa fa-th-large"></i>
          </div>
            <h5>Rincian Data Pengguna Sistem</h5>
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
        <form action="?page=upuser" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Username</label>
            <div class="col-lg-8">
              <input type="text" id="usernm" name="usernm" placeholder="Username" class="form-control" value="<?php echo $r['username']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Password</label>
            <div class="col-lg-8">
              <input type="text" id="pass" name="pass" placeholder="Password pengguna" class="form-control" value="<?php echo $r['password_origin']; ?>" required="required">
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Nama Pengguna</label>
            <div class="col-lg-8">
              <input type="text" id="nmuser" name="nmuser" placeholder="Nama pengguna" class="form-control" value="<?php echo $r['nm_lengkap']; ?>" required="required">
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Alamat Pengguna</label>
            <div class="col-lg-8">
              <textarea id="wysihtml5" class="form-control" rows="10" name="alamat" required="required"><?php echo $r['alamat_admin']; ?></textarea>
            </div>
          </div>

           <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Email Pengguna</label>
            <div class="col-lg-8">
              <input type="text" id="email" name="email" placeholder="Email pengguna" class="form-control" value="<?php echo $r['email_admin']; ?>" required="required">
            </div>
          </div>

         

          <div class="form-group">
            <label class="control-label col-lg-4">Unggah Foto</label>
            <div class="col-lg-8">

               <?php
            if ($r['pic_admin']!=''){                    
          ?>
              <!-- <div class="form-group">
                <div class="col-lg-8"> -->
                  <?php echo "<img src='img_user/$r[pic_admin]' oncontextmenu='return false;'>"; ?>
                  <!-- script (oncontextmenu='return false;'): mencegah gambar tidak dapat di klik kanan. -->
                <!-- </div>
              </div> -->
            <?php } else { ?>
              <!-- <div class="form-group">
                <div class="col-lg-8"> -->
                  <?php echo "<img src='img_user/image_not_available.jpg' oncontextmenu='return false;'>"; ?>
                  <!-- script (oncontextmenu='return false;'): mencegah gambar tidak dapat di klik kanan. -->
               <!--  </div>
              </div> -->
          <?php } ?>
              <input type="file" name="fupload">
            </div>
          </div>
<div class="clearfix">&nbsp;</div>
          
            <?php
              if ($r['aktif_admin']=='Y'){
            ?>
                <div class="form-group">
                  <label class="control-label col-lg-4">Aktif</label>
                  <div class="col-lg-8">
                    <input class="" type="radio" name="aktif" value="Y" checked > Ya
                    <input class="" type="radio" name="aktif" value="N" > Tidak
                  </div>
                </div>
                    
              <?php } else { ?>

                <div class="form-group">
                  <label class="control-label col-lg-4">Aktif</label>
                  <div class="col-lg-8">
                  <input class="uniform" type="radio" name="aktif" value="Y" > Ya
                  <input class="uniform" type="radio" name="aktif" value="N" checked > Tidak
                </div>
                </div>
                    
                
              <?php  }  ?>

<div class="clearfix">&nbsp;</div>
            <?php
              if ($r['status_admin']=='Admin'){
            ?>
                <div class="form-group">
                  <label class="control-label col-lg-4">Status Admin</label>
                  <div class="col-lg-8">
                  <input class="" type="radio" name="status" value="Admin" checked > Administrator
                  <input class="" type="radio" name="status" value="User" > User
                </div>
                </div>
                    
                
                  
              <?php } else { ?>
                    
                <div class="form-group">
                  <label class="control-label col-lg-4">Status Admin</label>
                   <div class="col-lg-8">
                  <input class="" type="radio" name="status" value="Admin" > Administrator
                  <input class="" type="radio" name="status" value="User" checked > User
                </div>
                </div>
                    
               
              <?php } ?>

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


<?php
/*----------------- session user ------------------*/
  if($ses == 'User'){
?>

<div class="row">
  <div class="col-lg-12">
    <div class="box">

      <header>
        <div class="icons">
          <i class="fa fa-th-large"></i>
          </div>
            <h5>Rincian Data Pengguna Sistem</h5>
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
        <form action="?page=upuser" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Username</label>
            <div class="col-lg-8">
              <input type="text" id="usernm" name="usernm" placeholder="Username" class="form-control" value="<?php echo $r['username']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Password</label>
            <div class="col-lg-8">
              <input type="text" id="pass" name="pass" placeholder="Password pengguna" class="form-control" value="<?php echo $r['password_origin']; ?>" required="required">
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Nama Pengguna</label>
            <div class="col-lg-8">
              <input type="text" id="nmuser" name="nmuser" placeholder="Nama pengguna" class="form-control" value="<?php echo $r['nm_lengkap']; ?>" required="required">
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Alamat Pengguna</label>
            <div class="col-lg-8">
              <textarea id="wysihtml5" class="form-control" rows="10" name="alamat" required="required"><?php echo $r['alamat_admin']; ?></textarea>
            </div>
          </div>

           <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Email Pengguna</label>
            <div class="col-lg-8">
              <input type="text" id="email" name="email" placeholder="Email pengguna" class="form-control" value="<?php echo $r['email_admin']; ?>" required="required">
            </div>
          </div>

          <?php
            if ($r['pic_admin']!=''){                    
          ?>
              <div class="form-group">
                <div class="col-lg-8">
                  <?php echo "<img src='img_user/$r[pic_admin]' oncontextmenu='return false;'>"; ?>
                  <!-- script (oncontextmenu='return false;'): mencegah gambar tidak dapat di klik kanan. -->
                </div>
              </div>
            <?php } else { ?>
              <div class="form-group">
                <div class="col-lg-8">
                  <?php echo "<img src='img_user/image_not_available.jpg' oncontextmenu='return false;'>"; ?>
                  <!-- script (oncontextmenu='return false;'): mencegah gambar tidak dapat di klik kanan. -->
                </div>
              </div>
          <?php } ?>

          <div class="form-group">
            <label class="control-label col-lg-4">Unggah Foto</label>
            <div class="col-lg-8">
              <input type="file" name="fupload">
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

<?php } ?>