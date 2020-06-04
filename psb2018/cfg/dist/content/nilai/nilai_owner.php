<?php
  include "../../conf/koneksi.php";
  include "../../lib/inc.session.php";
      
  /* versi PDO */
  $sql = $conn->prepare("SELECT * FROM psb, nilai_raport
                     WHERE psb.no_reg = nilai_raport.no_reg
                     AND nilai_raport.no_reg = :noreg ");
  $sql->bindParam(":noreg", mysql_real_escape_string(stripslashes(strip_tags($_GET['tid']))));
  $sql->execute();
  $r = $sql->fetch();
?>

<div class="row">
  <div class="col-lg-12">
    <div class="box">

      <header>
        <div class="icons">
          <i class="fa fa-th-large"></i>
        </div>
          <h5>Data Siswa</h5>
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
            <input type="text" id="noreg" name="noreg" placeholder="No. pendaftaran calon siswa" class="form-control" value="<?php echo $r['no_reg']; ?>" required="required" readonly>
          </div>
        </div>

        <div class="form-group">
          <label for="text1" class="control-label col-lg-4">Nama Siswa</label>
          <div class="col-lg-8">
            <input type="text" id="nmsis" name="nmsis" placeholder="Nama calon siswa" class="form-control" value="<?php echo $r['nm_siswa']; ?>" required="required" readonly>
          </div>
        </div>
      </div>
  
    </div>
  </div><!-- /.col-lg-12 -->
</div><!-- /.row -->