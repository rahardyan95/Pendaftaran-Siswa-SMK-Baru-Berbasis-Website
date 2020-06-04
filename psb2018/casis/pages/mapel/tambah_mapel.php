<script type="text/javascript">
  function validasi(){
    /*--- validasi combo mapel ---*/
    var mpl = (form1.mapel.value);
    if(mpl == 0){
      alert("Silahkan pilih mata pelajaran.");
      document.form1.mapel.focus();
      return false;
    }
  }
</script>

<?php
  include "../conf/koneksi.php";
  include "../lib/inc.session.sis.php";
?>

<div class="row">
  <div class="col-lg-12">
    <div class="box">
      <header>
        <div class="icons">
          <i class="fa fa-table"></i>
        </div>
        <div class="page-header">
          <h3>Input Mata Pelajaran</h3>
        </div>
      </header>

      <div class="alert alert-info">
        Input mata pelajaran untuk selanjutnya menginputkan nilai raport dari masing-masing mata pelajaran.<br>  
        Pilih 1 kali untuk masing-masing mata pelajaran yang tersedia.<br>
        Untuk masing-masing mata pelajaran yang terpilih, akan langsung ditampilkan pada menu <b>Input Nilai Raport</b>.
      </div>

      <form class="form-horizontal" role="form1" name="form1" action="?page=svmapel" method="post" onSubmit="return validasi()">
        <div class="form-group">
          <label class="control-label col-lg-4">Mata Pelajaran</label>
          <div class="col-lg-8">
            <select class="form-control" name="mapel">
              <?php 
                echo"
                <option value=0 selected>- Pilih Mata Pelajaran -</option>";

                /* versi PDO */
                $tampil = $conn->prepare("SELECT * FROM mapel ORDER BY id_mapel");
                $tampil->execute();
                while($r = $tampil->fetch()){
                  echo "<option value=$r[id_mapel]>$r[mapel]</option>"; 
                }
              ?>
            </select>
          </div>
        </div>
        <div class="form-actions">
          <input type="submit" class="btn btn-primary" name="submit" value="Submit">
        </div>
      </form>
    </div>
  </div>
</div>