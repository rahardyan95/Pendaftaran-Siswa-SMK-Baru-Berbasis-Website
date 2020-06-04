<?php
  include "../conf/koneksi.php";
  include "../conf/functionglobal.php";
	include "../lib/inc.session.sis.php";

$config = $conn->prepare("SELECT * FROM data_config where code='reservation' and group_data='dokumen' ");
  $config->execute();
  $dataconfig = $config->fetch();
  $today = date("m/d/Y");
  $date = explode(' - ' ,$dataconfig['value']);
  $startdate = $date[0];
  $enddate = $date[1];

  $buttonUpload = false;
  $alertInfo = "warning";
  if($today>= $startdate && $today <= $enddate){
    $buttonUpload = true;
    $alertInfo = "info";
  }

?>

<div class="page-header">
    <h3>Unggah Dokumen</h3>
</div>

<div class="alert alert-info">
  Unggah kelengkapan dokumen calon siswa.<br>
  File dokumen yang di unggah harus dalam format *.JPG, *.JPEG, atau *.PNG dengan ukuran maksimal 2MB.
</div>

<div class="alert alert-<?=$alertInfo?>">
  Tanggal Pengisian Upload Dokumen<br>
  <strong><?=$dataconfig['value']?></strong>
</div>

<div class="row">
  <div class="col-sm-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Unggah Kartu Keluarga</h3>
      </div>
      <div class="panel-body">

        <?php
          /* versi PDO */
          $sql1 = $conn->prepare("SELECT * FROM dok_kk, psb
                                WHERE dok_kk.no_reg = psb.no_reg
                                AND dok_kk.no_reg = :noreg ");
          $sql1->bindParam(":noreg", $_SESSION['noreg']);
          $sql1->execute();
          $r1 = $sql1->fetch();

          if ($r1['pic_dok_kk']!=''){   
            echo "<p align = center><img class='img-responsive' src='../cfg/dist/img_kk/$r1[pic_dok_kk]' oncontextmenu='return false;'></p>";
          } else {
            echo "<p align = center><img class='img-responsive' src='../cfg/dist/img_kk/image_not_available.jpg' oncontextmenu='return false;'></p>";
          }

          if($buttonUpload==true){
            if ($r1['pic_dok_kk'] != ''){
        ?>

            <center><button type="button" class="btn btn-success" name="submit" onclick="window.location='?page=edkk&tid=<?php echo $r1['id_dok_kk']; ?>' ">Ubah Kartu Keluarga</button></center>
          <?php } else { ?>
            <center><button type="button" class="btn btn-primary" onclick="window.location='?page=adkk'">Unggah Kartu Keluarga</button></center>
          <?php } 
        }

        ?>

      </div>
    </div>
  </div>

  <div class="col-sm-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Unggah Ijazah/SHUN/SKL</h3>
      </div>
      <div class="panel-body">

        <?php
          /* versi PDO */
          $sql2 = $conn->prepare("SELECT * FROM dok_ijazah, psb
                                WHERE dok_ijazah.no_reg = psb.no_reg
                                AND dok_ijazah.no_reg = :noreg ");
          $sql2->bindParam(":noreg", $_SESSION['noreg']);
          $sql2->execute();
          $r2 = $sql2->fetch();

          if ($r2['pic_dok_ijazah']!=''){   
            echo "<p align = center><img class='img-responsive' src='../cfg/dist/img_ijazah/$r2[pic_dok_ijazah]' oncontextmenu='return false;'></p>";
          } else {
            echo "<p align = center><img class='img-responsive' src='../cfg/dist/img_ijazah/image_not_available.jpg' oncontextmenu='return false;'></p>";
          }

          if($buttonUpload==true){
          if ($r2['pic_dok_ijazah'] != ''){
        ?>
            <center><button type="button" class="btn btn-success" name="submit" onclick="window.location='?page=ediz&tid=<?php echo $r2['id_dok_ijazah']; ?>' ">Ubah Ijazah/SHUN/SKL</button></center>
          <?php } else { ?>
            <center><button type="button" class="btn btn-primary" onclick="window.location='?page=adiz'">Unggah Ijazah/SHUN/SKL</button></center>
          <?php }
          } 
          ?>

      </div>
    </div>
  </div>

  <div class="col-sm-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Unggah Foto</h3>
      </div>
      <div class="panel-body">

        <?php
          /* versi PDO */
          $sql3 = $conn->prepare("SELECT * FROM dok_foto, psb
                                WHERE dok_foto.no_reg = psb.no_reg
                                AND dok_foto.no_reg = :noreg ");
          $sql3->bindParam(":noreg", $_SESSION['noreg']);
          $sql3->execute();
          $r3 = $sql3->fetch();

          if ($r3['pic_foto']!=''){   
            echo "<p align = center><img class='img-responsive' src='../cfg/dist/img_foto/$r3[pic_foto]' oncontextmenu='return false;'></p>";
          } else {
            echo "<p align = center><img class='img-responsive' src='../cfg/dist/img_foto/image_not_available.jpg' oncontextmenu='return false;'></p>";
          }

          if($buttonUpload==true){

          if ($r3['pic_foto'] != ''){
        ?>
            <center><button type="button" class="btn btn-success" name="submit" onclick="window.location='?page=edft&tid=<?php echo $r3['id_dok_foto']; ?>' ">Ubah Foto</button></center>
          <?php } else { ?>
            <center><button type="button" class="btn btn-primary" onclick="window.location='?page=adft'">Unggah Foto</button></center>
          <?php } 
          }
          ?>

      </div>
    </div>
  </div>
</div>