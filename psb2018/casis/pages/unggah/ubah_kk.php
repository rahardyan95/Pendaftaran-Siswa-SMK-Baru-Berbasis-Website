  <?php
      include "../conf/koneksi.php";
      include "../lib/inc.session.sis.php";  

      /* versi PDO */
      $sql = $conn->prepare("SELECT * FROM psb, dok_kk
                          WHERE psb.no_reg = dok_kk.no_reg
                          AND psb.no_reg = :noreg
                          AND dok_kk.id_dok_kk = :id_kk ");
      $sql->bindParam(":noreg", $_SESSION['noreg']);
      $sql->bindParam(":id_kk", mysql_real_escape_string(stripslashes(strip_tags($_GET['tid']))));
      $sql->execute();
      $r = $sql->fetch();
  ?>

  <form role="form" name="form1" action="?page=upkk" method="post" enctype="multipart/form-data" onSubmit="return validasi()">
    <input type="hidden" name="id_kk" value="<?php echo $r['id_dok_kk']; ?>">
    <div class="row">
      <div class="col-sm-12">
        <div class="panel panel-default">

          <div class="panel-heading">Ubah Dokumen Kartu Keluarga</div>
          <div class="panel-body">

            <?php
              if ($r['pic_dok_kk']!=''){   
                echo "<p align = center><img class='img-responsive' src='../cfg/dist/img_kk/$r[pic_dok_kk]' oncontextmenu='return false;'></p>";
              } else {
                echo "<p align = center><img class='img-responsive' src='../cfg/dist/img_kk/image_not_available.jpg' oncontextmenu='return false;'></p>";
              }
            ?>

            <div><br></div>
            <div class="form-group">
              <label>Pilih dokumen</label>
              <input type="file" name="fupload_kk">
              <p class="help-block">File dokumen harus bertipe *.jpeg, *.jpg, atau *.png</p>
            </div>
            <div class="box-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal" onclick="self.history.back()">Cancel</button>
              <button type="submit" class="btn btn-primary pull-right" name="submit">Save changes</button>
            </div>

          </div>
      </div>
    </div>
  </form>
  

  