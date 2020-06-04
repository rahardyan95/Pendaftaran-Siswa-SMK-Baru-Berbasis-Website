  <?php
      include "../conf/koneksi.php";
      include "../lib/inc.session.sis.php";  

      /* versi PDO */
      $sql = $conn->prepare("SELECT * FROM psb, dok_ijazah
                          WHERE psb.no_reg = dok_ijazah.no_reg
                          AND psb.no_reg = :noreg
                          AND dok_ijazah.id_dok_ijazah = :id_ijazah ");
      $sql->bindParam(":noreg", $_SESSION['noreg']);
      $sql->bindParam(":id_ijazah", mysql_real_escape_string(stripslashes(strip_tags($_GET['tid']))));
      $sql->execute();
      $r = $sql->fetch();
  ?>

  <form role="form" name="form1" action="?page=upiz" method="post" enctype="multipart/form-data" onSubmit="return validasi()">
    <input type="hidden" name="id_iz" value="<?php echo $r['id_dok_ijazah']; ?>">
    <div class="row">
      <div class="col-sm-12">
        <div class="panel panel-default">

          <div class="panel-heading">Ubah Dokumen Ijazah</div>
          <div class="panel-body">

            <?php
              if ($r['pic_dok_ijazah']!=''){   
                echo "<p align = center><img class='img-responsive' src='../cfg/dist/img_ijazah/$r[pic_dok_ijazah]' oncontextmenu='return false;'></p>";
              } else {
                echo "<p align = center><img class='img-responsive' src='../cfg/dist/img_ijazah/image_not_available.jpg' oncontextmenu='return false;'></p>";
              }
            ?>

            <div><br></div>
            <div class="form-group">
              <label>Pilih dokumen</label>
              <input type="file" name="fupload_iz">
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
  

  