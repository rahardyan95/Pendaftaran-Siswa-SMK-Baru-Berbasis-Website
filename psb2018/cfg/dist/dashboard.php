<?php
  include "../../conf/koneksi.php";
  include "../../lib/inc.session.php";

  /* versi PDO */
  $sqlPsb = $conn->prepare("SELECT *, count(psb.no_reg) as jml_psb FROM psb");
  $sqlPsb->execute();
  $p = $sqlPsb->fetch();
  $jmlPsb = $p['jml_psb'];

  $ver = 'Sudah';
  $sqlVer = $conn->prepare("SELECT *, count(psb.status_verifikasi) as jml_ver 
                          FROM psb 
                          WHERE status_verifikasi = :ver ");
  $sqlVer->bindParam(":ver", $ver);
  $sqlVer->execute();
  $v = $sqlVer->fetch();
  $jmlVer = $v['jml_ver'];

  // $sqlUsm = $conn->prepare("SELECT *, count(ujian_masuk.no_ujian) as jml_usm 
  //                           FROM ujian_masuk");

                          $sqlUsm = $conn->prepare("SELECT ujian_masuk.*, count(ujian_masuk.no_ujian) as jml_usm  FROM psb, ujian_masuk
                                              WHERE psb.no_reg = ujian_masuk.no_reg
                                              ORDER BY ujian_masuk.no_ujian DESC");
  $sqlUsm->execute();
  $u = $sqlUsm->fetch();
  $jmlUsm = $u['jml_usm'];

  $ket1 = 'Belum';
  $sql1 = $conn->prepare("SELECT ujian_masuk.*, count(ujian_masuk.ket_ujian) as jml_usm_belum 
                          FROM psb, ujian_masuk
                                              WHERE psb.no_reg = ujian_masuk.no_reg AND 
                            ket_ujian = :ket1 
                                              ORDER BY ujian_masuk.no_ujian DESC");
                        
  $sql1->bindParam(":ket1", $ket1);
  $sql1->execute();
  $u1 = $sql1->fetch();
  $jmlUsmBelum = $u1['jml_usm_belum'];

  $ket2 = 'Lulus';
  $sql2 = $conn->prepare("SELECT *, count(ujian_masuk.ket_ujian) as jml_usm_lulus 
                          FROM ujian_masuk
                          WHERE ket_ujian = :ket2 ");
  $sql2->bindParam(":ket2", $ket2);
  $sql2->execute();
  $u2 = $sql2->fetch();
  $jmlUsmLulus = $u2['jml_usm_lulus'];

  $ket3 = 'Tidak';
  $sql3 = $conn->prepare("SELECT *, count(ujian_masuk.ket_ujian) as jml_usm_tidak 
                          FROM ujian_masuk
                          WHERE ket_ujian = :ket3 ");
  $sql3->bindParam(":ket3", $ket3);
  $sql3->execute();
  $u3 = $sql3->fetch();
  $jmlUsmTidak = $u3['jml_usm_tidak'];
?>

<div class="row">
  <div class="col-lg-12">
    <div class="box">

      <header>
        <div class="icons">
          <i class="fa fa-th-large"></i>
          </div>
            <h5>Halaman Administrator</h5>
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
        <p>Selamat datang di halaman administrator. <br>
        Gunakan fitur-fitur yang tersedia di halaman ini untuk meningkatkan mutu pelayanan <br>
        terhadap calon siswa baru.</p>
      </div>
  
    </div>
  </div><!-- /.col-lg-12 -->
</div><!-- /.row -->

<hr>

<div class="text-center">
  <a class="quick-btn" href="?page=vwreg">
    <i class="fa fa-group fa-2x"></i>
    <span>Jumlah PSB</span> 
    <span class="label label-default"><?php echo $jmlPsb; ?></span> 
  </a> 
  <a class="quick-btn" href="?page=vwreg">
    <i class="fa fa-check fa-2x"></i>
    <span>Verifikasi</span> 
    <span class="label label-danger"><?php echo $jmlVer; ?></span> 
  </a> 
</div>

<hr>

<div class="text-center">
  <a class="quick-btn" href="?page=vwusm">
    <i class="fa fa-signal fa-2x"></i>
    <span>Jumlah USM</span> 
    <span class="label label-danger"><?php echo $jmlUsm; ?></span> 
  </a> 
  <a class="quick-btn" href="?page=vwusm">
    <i class="fa fa-spinner fa-2x"></i>
    <span>Belum Ujian</span> 
    <span class="label label-success"><?php echo $jmlUsmBelum; ?></span> 
  </a> 
  <a class="quick-btn" href="?page=vwusm">
    <i class="fa fa-check fa-2x"></i>
    <span>Lulus Ujian</span> 
    <span class="label label-warning"><?php echo $jmlUsmLulus; ?></span> 
  </a> 
  <a class="quick-btn" href="?page=vwusm">
    <i class="fa fa-refresh fa-2x"></i>
    <span>Tidak Lulus</span> 
    <span class="label label-warning"><?php echo $jmlUsmTidak; ?></span> 
  </a> 
</div>