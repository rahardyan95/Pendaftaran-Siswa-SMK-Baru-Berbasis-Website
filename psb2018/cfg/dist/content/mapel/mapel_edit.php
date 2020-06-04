<?php
  include "../../conf/koneksi.php";
  include "../../lib/inc.session.php";
      
  /* versi PDO */
  $sql = $conn->prepare("SELECT * FROM mapel 
                          WHERE id_mapel = :id_mapel ");
  $sql->bindParam(":id_mapel", mysql_real_escape_string(stripslashes(strip_tags($_GET['tid']))));
  $sql->execute();
  while ($r = $sql->fetch()){
?>

<div class="row">
  <div class="col-lg-12">
    <div class="box">

      <header>
        <div class="icons">
          <i class="fa fa-th-large"></i>
          </div>
            <h5>Ubah Data Mata Pelajaran</h5>
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
        <form action="?page=upmapel" method="post">
          <input type='hidden' name='tid' value="<?php echo $r['id_mapel']; ?>" >
          
          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Mata Pelajaran</label>
            <div class="col-lg-8">
              <input type="text" id="mapel" name="mapel" placeholder="Mata pelajaran" class="form-control" value="<?php echo $r['mapel']; ?>" required="required">
            </div>
          </div>

          <p>
            <?php
              if ($r['aktif_mapel']=='Y'){
            ?>
                    
            <div class="control-label col-lg-4">
              <label>Aktif Mata Pelajaran</label>
            </div>
                    
            <div class="col-lg-8">
              <input type="radio" name="aktif" id="optionsRadios1" value="Y" checked> Ya
              <input type="radio" name="aktif" id="optionsRadios1" value="N" > Tidak
            </div>
                    
            <?php } else { ?>
                    
            <div class="control-label col-lg-4">
              <label>Aktif Mata Pelajaran</label>
            </div>
                    
            <div class="col-lg-8">
              <input type="radio" name="aktif" id="optionsRadios1" value="Y" > Ya
              <input type="radio" name="aktif" id="optionsRadios1" value="N" checked> Tidak
            </div>
                    
            <?php } ?>
          </p>

          <div class="form-actions">
            <div class="col-lg-8">
              <button type="button" class="btn btn-default" data-dismiss="modal" onclick="self.history.back()">Cancel</button>
              <input type="submit" name="submit" value="Save changes" class="btn btn-primary">
            </div>
          </div>
        </form>
      </div>
  
    </div>
  </div><!-- /.col-lg-12 -->
</div><!-- /.row -->

<?php } ?>