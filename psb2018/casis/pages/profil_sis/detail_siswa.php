<?php
  include "../conf/koneksi.php";
  include "../conf/fungsi_indotgl.php";
  include "../lib/inc.session.sis.php";
      
  /* versi PDO */
  $sql = $conn->prepare("SELECT * FROM psb, kompetensi
                     WHERE psb.id_kompetensi = kompetensi.id_kompetensi
                     AND psb.no_reg = :noreg
                     AND psb.no_reg = :no ");
  $sql->bindParam(":noreg", $_SESSION['noreg']);
  $sql->bindParam(":no", mysql_real_escape_string(stripslashes(strip_tags($_GET['tid']))));
  $sql->execute();
  while($r = $sql->fetch()){
?>

<script type="text/javascript">
  function validasi(){
    /*--- validasi tanggal lahir ---*/
    var tgllhr = (form1.tgl_lahir.value);
    if(tgllhr == '0000-00-00'){
      alert("Lengkapi kolom isian tanggal lahir siswa.");
      document.form1.tgl_lahir.focus();
      return false;
    }

    /*--- validasi radio button jenis kelamin ---*/
    var laki = form1.kelamin[0].checked;
    var prp = form1.kelamin[1].checked;
      
    if(laki==false && prp==false){
      alert("Silahkan pilih jenis kelamin.");
      return false;
    }

    /*--- validasi tanggal ijazah ---*/
    var tglijz = (form1.tgl_ijazah.value);
    if(tglijz == '0000-00-00'){
      alert("Lengkapi kolom isian tanggal ijazah siswa.");
      document.form1.tgl_ijazah.focus();
      return false;
    }
  }
</script>

<div class="row">
  <div class="col-lg-12">
    <div class="box">

        <div class="alert alert-info">
          <strong>PERHATIAN!</strong><BR>
          Lengkapi data diri calon siswa, data sekolah asal, dan data orang tua/wali dibawah ini dengan sebenar-benarnya.
        </div>

        <h4 class="page-header">Rincian Data Diri Calon Siswa</h4>
        <form role="form1" name="form1" action="?page=upsis" method="post" onSubmit="return validasi()">
        <input type='hidden' name='tid' value="<?php echo $r['no_reg']; ?>" >

          <p>
            <div class="form-group">
              <label for="noReg">No. Pendaftaran</label>
              <input type="text" class="form-control" name="noreg" id="noReg" placeholder="Nomor pendaftaran siswa baru." value="<?php echo $r['no_reg']; ?>" readonly="readonly">
            </div>
          </p>

          <p>
            <div class="form-group">
              <label for="tglReg">Tanggal Pendaftaran</label>
              <input type="text" class="form-control" name="tglreg" id="tglReg" placeholder="Tanggal pendaftaran siswa baru." value="<?php echo tgl_indo($r['tgl_daftar']); ?>" readonly="readonly">
            </div>
          </p>

          <p>
            <div class="form-group">
              <label>Bidang Kompetensi</label>
              <select name="kompetensi" class="form-control">
                <?php
                  /* versi PDO */
                  $tampil = $conn->prepare("SELECT * FROM kompetensi ORDER BY bid_kompetensi");
                  $tampil->execute();

                  if ($r['id_kompetensi']==0){
                    echo "<option value=0 selected>-Pilih Bidang Kompetensi-</option>";
                  }

                  /* versi PDO */
                  while($w = $tampil->fetch()){
                  
                    
                    if ($r['id_kompetensi']==$w['id_kompetensi']){
                      echo "<option value=$w[id_kompetensi] selected>$w[bid_kompetensi]</option>";
                    }
                    else{
                      echo "<option value=$w[id_kompetensi]>$w[bid_kompetensi]</option>";
                    }
                  }
                ?>
              </select>
            </div>
          </p>

          <p>
            <div class="form-group">
              <label for="nisn">NISN</label>
              <input type="text" class="form-control" name="nisn" id="nisn" placeholder="Nomor Induk Siswa Nasional." value="<?php echo $r['nisn']; ?>" required="required">
            </div>
          </p>

          <p>
            <div class="form-group">
              <label for="nmSiswa">Nama Siswa</label>
              <input type="text" class="form-control" name="nm_siswa" id="nmSiswa" placeholder="Nama lengkap siswa." value="<?php echo $r['nm_siswa']; ?>" required="required">
            </div>
          </p>

          <p>
            <div class="form-group">
              <label for="tmpLahir">Tempat Lahir</label>
              <input type="text" class="form-control" name="tmp_lahir" id="tmpLahir" placeholder="Tempat lahir siswa." value="<?php echo $r['tmp_lahir']; ?>" required="required">
            </div>
          </p>

          <p>
            <div class="form-group">
              <label for="tglLahir">Tanggal Lahir</label>
              <input type="text" class="form-control" name="tgl_lahir" id="tglLahir" placeholder="Tanggal lahir siswa." value="<?php echo $r['tgl_lahir']; ?>" required="required">
              <label class="small">Format tanggal lahir: tahun-bulan-tanggal (yyyy-mm-dd)</label>
            </div>
          </p>

          <?php
            if ($r['jns_kelamin']=='L'){
          ?>

          <p>       
            <div class="form-group">
              <label>Jenis Kelamin</label>
            </div>
                    
            <div class="form-group">
              <input type="radio" name="kelamin" id="optionsRadios1" value="L" checked> Laki-laki &nbsp;
              <input type="radio" name="kelamin" id="optionsRadios1" value="P" > Perempuan
            </div>
          </p>

          <?php } else { ?>

          <p>       
            <div class="form-group">
              <label>Jenis Kelamin</label>
            </div>
                    
            <div class="form-group">
              <input type="radio" name="kelamin" id="optionsRadios1" value="L" > Laki-laki &nbsp;
              <input type="radio" name="kelamin" id="optionsRadios1" value="P" checked> Perempuan
            </div>
          </p>

          <?php } ?>

          <p>
            <div class="form-group">
              <label for="agama">Agama</label>
              <input type="text" class="form-control" name="agama" id="agama" placeholder="Agama." value="<?php echo $r['agama']; ?>" required="required">
            </div>
          </p>

          <p>
            <div class="form-group">
              <label for="anakKe">Anak ke-</label>
              <input type="text" class="form-control" name="anak_ke" id="anakKe" placeholder="Anak ke-." value="<?php echo $r['anak_ke']; ?>" required="required">
            </div>
          </p>

          <p>
            <div class="form-group">
              <label for="jmlSaudara">Jumlah Saudara</label>
              <input type="text" class="form-control" name="jml_saudara" id="jmlSaudara" placeholder="Jumlah saudara." value="<?php echo $r['jml_saudara']; ?>" required="required">
            </div>
          </p>

          <p>
            <div class="form-group">
              <label for="statAnak">Status Anak</label>
              <input type="text" class="form-control" name="status_anak" id="statAnak" placeholder="Status anak." value="<?php echo $r['status_anak']; ?>" required="required">
            </div>
          </p>

          <p>
            <div class="form-group">
              <label for="tinggiBdn">Tinggi Badan</label>
              <input type="text" class="form-control" name="tinggi_bdn" id="tinggiBdn" placeholder="Tinggi badan siswa." value="<?php echo $r['tinggi_badan']; ?>" required="required">
            </div>
          </p>

          <p>
            <div class="form-group">
              <label for="beratBdn">Berat Badan</label>
              <input type="text" class="form-control" name="berat_bdn" id="beratBdn" placeholder="Berat badan siswa." value="<?php echo $r['berat_badan']; ?>" required="required">
            </div>
          </p>

          <p>
            <div class="form-group">
              <label for="golDarah">Golongan Darah</label>
              <input type="text" class="form-control" name="gol_darah" id="golDarah" placeholder="Golongan darah." value="<?php echo $r['gol_darah']; ?>" required="required">
            </div>
          </p>

          <p>
            <div class="box-body pad">
              <label>Alamat Siswa</label>
              <textarea class="textarea" name="alamat_sis" placeholder="Alamat lengkap siswa." required style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $r['alamat_siswa']; ?></textarea>
            </div>
          </p>

          <p>
            <div class="form-group">
              <label for="kotaKab">Kota/Kabupaten</label>
              <input type="text" class="form-control" name="kota_kab" id="kotaKab" placeholder="Kota/kabupaten." value="<?php echo $r['kota_kab']; ?>" required="required">
            </div>
          </p>

          <p>
            <div class="form-group">
              <label for="kodePos">Kode Pos</label>
              <input type="text" class="form-control" name="kodepos" id="kodePos" placeholder="Kode pos." value="<?php echo $r['kode_pos']; ?>" required="required">
            </div>
          </p>

          <p>
            <div class="form-group">
              <label for="hpSiswa">No. HP Siswa</label>
              <input type="text" class="form-control" name="hp_siswa" id="hpSiswa" placeholder="Nomor HP siswa." value="<?php echo $r['hp_siswa']; ?>" required="required">
            </div>
          </p>

          <p>
            <div class="form-group">
              <label for="tlpSiswa">No. Telepon Siswa</label>
              <input type="text" class="form-control" name="tlp_siswa" id="tlpSiswa" placeholder="Nomor telepon siswa." value="<?php echo $r['tlp_siswa']; ?>" required="required">
            </div>
          </p>

          <p>
            <div class="form-group">
              <label for="email">Email Siswa</label>
              <input type="text" class="form-control" name="email" id="email" placeholder="Email siswa." value="<?php echo $r['email_siswa']; ?>" required="required">
            </div>
          </p>

          <p>
            <div class="form-group">
              <label for="sttRumah">Status Rumah Siswa</label>
              <input type="text" class="form-control" name="stt_rumah" id="sttRumah" placeholder="Status rumah siswa (rumah sendiri, kos, atau tinggal dengan orang tua)."  value="<?php echo $r['status_rumah_siswa']; ?>" required="required">
            </div>
          </p>

          <p>
            <div class="form-group">
              <label for="kendaraan">Kendaraan</label>
              <input type="text" class="form-control" name="kendaraan" id="kendaraan" placeholder="Kendaraan yang dimiliki siswa (mobil atau motor)." value="<?php echo $r['kendaraan']; ?>" required="required">
            </div>
          </p>

          <p><br></p>
          <h4 class="page-header">Rincian Data Sekolah Asal</h4>

          <p>
            <div class="form-group">
              <label for="sekolah">Asal Sekolah</label>
              <input type="text" class="form-control" name="sekolah" id="sekolah" placeholder="Nama sekolah asal siswa." value="<?php echo $r['asal_sekolah']; ?>" required="required">
            </div>
          </p>

          <p>
            <div class="box-body pad">
              <label>Alamat Sekolah</label>
              <textarea class="textarea" name="alamat_skl" placeholder="Alamat lengkap sekolah asal." required style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $r['alamat_sekolah']; ?></textarea>
            </div>
          </p>

          <p>
            <div class="form-group">
              <label for="noIjazah">No. Ijazah</label>
              <input type="text" class="form-control" name="no_ijazah" id="noIjazah" placeholder="Nomor ijazah siswa." value="<?php echo $r['no_ijazah']; ?>" required="required">
            </div>
          </p>

          <p>
            <div class="form-group">
              <label for="tglIjazah">Tanggal Ijazah</label>
              <input type="text" class="form-control" name="tgl_ijazah" id="tglIjazah" placeholder="Tanggal ijazah siswa." value="<?php echo $r['tgl_ijazah']; ?>" required="required">
              <label class="small">Format tanggal ijazah: tahun-bulan-tanggal (yyyy-mm-dd)</label>
            </div>
          </p>

          <p>
            <div class="form-group">
              <label for="thnIjazah">Tahun Ijazah</label>
              <input type="text" class="form-control" name="thn_ijazah" id="thnIjazah" placeholder="Tahun ijazah siswa." value="<?php echo $r['thn_ijazah']; ?>" required="required">
            </div>
          </p>

          <p>
            <div class="form-group">
              <label for="nilaiUN">Nilai Akhir Ujian Nasional</label>
              <input type="text" class="form-control" name="nilai_un" id="nilaiUN" placeholder="Nilai akhir Ujian Nasional siswa." value="<?php echo $r['nilai_un']; ?>" required="required">
            </div>
          </p>

          <p>
            <div class="form-group">
              <label for="presAkademik">Prestasi Bidang Akademik</label>
              <input type="text" class="form-control" name="pres_akademik" id="presAkademik" placeholder="Prestasi siswa dibidang akademik." value="<?php echo $r['prestasi_akademik']; ?>" required="required">
            </div>
          </p>

          <p>
            <div class="form-group">
              <label for="presOlahraga">Prestasi Bidang Olahraga</label>
              <input type="text" class="form-control" name="pres_olahraga" id="presOlahraga" placeholder="Prestasi siswa dibidang olahraga." value="<?php echo $r['prestasi_olahraga']; ?>" required="required">
            </div>
          </p>

          <p>
            <div class="form-group">
              <label for="presSeni">Prestasi Bidang Kesenian</label>
              <input type="text" class="form-control" name="pres_seni" id="presSeni" placeholder="Prestasi siswa dibidang kesenian." value="<?php echo $r['prestasi_kesenian']; ?>" required="required">
            </div>
          </p>

          <p><br></p>
          <h4 class="page-header">Rincian Data Orang Tua/Wali Siswa</h4>

          <p>
            <div class="form-group">
              <label for="nmAyah">Nama Ayah</label>
              <input type="text" class="form-control" name="nm_ayah" id="nmAyah" placeholder="Nama orang tua Ayah." value="<?php echo $r['nm_orangtua_ayah']; ?>" required="required">
            </div>
          </p>

          <p>
            <div class="form-group">
              <label for="nmIbu">Nama Ibu</label>
              <input type="text" class="form-control" name="nm_ibu" id="nmIbu" placeholder="Nama orang tua Ibu." value="<?php echo $r['nm_orangtua_ibu']; ?>" required="required">
            </div>
          </p>

          <p>
            <div class="form-group">
              <label for="jobAyah">Pekerjaan Ayah</label>
              <input type="text" class="form-control" name="job_ayah" id="jobAyah" placeholder="Pekerjaan ayah." value="<?php echo $r['pekerjaan_ayah']; ?>" required="required">
            </div>
          </p>

          <p>
            <div class="form-group">
              <label for="jobIbu">Pekerjaan Ibu</label>
              <input type="text" class="form-control" name="job_ibu" id="jobIbu" placeholder="Pekerjaan ibu." value="<?php echo $r['pekerjaan_ibu']; ?>" required="required">
            </div>
          </p>

          <p>
            <div class="form-group">
              <label for="gajiAyah">Penghasilan Ayah</label>
              <input type="text" class="form-control" name="gaji_ayah" id="gajiAyah" placeholder="Penghasilan ayah." value="<?php echo $r['penghasilan_ayah']; ?>" required="required">
            </div>
          </p>

          <p>
            <div class="form-group">
              <label for="gajiIbu">Penghasilan Ibu</label>
              <input type="text" class="form-control" name="gaji_ibu" id="gajiIbu" placeholder="Penghasilan ibu." value="<?php echo $r['penghasilan_ibu']; ?>" required="required">
            </div>
          </p>

          <p>
            <div class="box-body pad">
              <label>Alamat Orangtua Siswa</label>
              <textarea class="textarea" name="alamat_ortu" placeholder="Alamat lengkap orangtua siswa." required style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $r['alamat_orangtua']; ?></textarea>
            </div>
          </p>

          <p>
            <div class="form-group">
              <label for="kotaKabOrtu">Kota/Kab Orangtua Siswa</label>
              <input type="text" class="form-control" name="kota_kab_ortu" id="kotaKabOrtu" placeholder="Kota/kabupaten orangtua siswa." value="<?php echo $r['kota_kab_orgtua']; ?>" required="required">
            </div>
          </p>

          <p>
            <div class="form-group">
              <label for="kodeposOrtu">Kode Pos Orangtua Siswa</label>
              <input type="text" class="form-control" name="kodepos_ortu" id="kodeposOrtu" placeholder="Kode pos orangtua siswa." value="<?php echo $r['kode_pos_orgtua']; ?>" required="required">
            </div>
          </p>

          <p>
            <div class="form-group">
              <label for="hpOrtu">No. HP Orangtua Siswa</label>
              <input type="text" class="form-control" name="hp_ortu" id="hpOrtu" placeholder="No. HP orangtua siswa." value="<?php echo $r['hp_orgtua']; ?>" required="required">
            </div>
          </p>

          <p>
            <div class="form-group">
              <label for="nmWali">Nama Wali Siswa</label>
              <input type="text" class="form-control" name="nm_wali" id="nmWali" placeholder="Nama wali siswa." value="<?php echo $r['nm_wali']; ?>" required="required">
            </div>
          </p>

          <p>
            <div class="form-group">
              <label for="jobWali">Pekerjaan Wali Siswa</label>
              <input type="text" class="form-control" name="job_wali" id="jobWali" placeholder="Pekerjaan wali siswa." value="<?php echo $r['pekerjaan_wali']; ?>" required="required">
            </div>
          </p>

          <p>
            <div class="form-group">
              <label for="gajiWali">Penghasilan Wali Siswa</label>
              <input type="text" class="form-control" name="gaji_wali" id="gajiWali" placeholder="Penghasilan wali siswa." value="<?php echo $r['penghasilan_wali']; ?>" required="required">
            </div>
          </p>

          <p>
            <div class="box-body pad">
              <label>Alamat Wali Siswa</label>
              <textarea class="textarea" name="alamat_wali" placeholder="Alamat lengkap wali siswa." required style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $r['alamat_wali']; ?></textarea>
            </div>
          </p>

          <p>
            <div class="form-group">
              <label for="hpWali">No. HP Wali Siswa</label>
              <input type="text" class="form-control" name="hp_wali" id="hpWali" placeholder="No. HP wali siswa." value="<?php echo $r['hp_wali']; ?>" required="required">
            </div>
          </p>

          <p>
            <div class="form-group">
              <label for="pjBiaya">Penanggung Jawab Biaya Siswa</label>
              <input type="text" class="form-control" name="pjbiaya" id="pjBiaya" placeholder="Penanggung jawab biaya siswa (biaya sendiri, dari orangtua, atau wali)." value="<?php echo $r['penanggung_biaya']; ?>" required="required">
            </div>
          </p>

          <p>
            <div class="form-actions">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal" onclick="self.history.back()">Cancel</button>
              <input type="submit" name="submit" value="Save changes" class="btn btn-primary pull-right">
            </div>
          </p>
        </form>
  
    </div>
  </div><!-- /.col-lg-12 -->
</div><!-- /.row -->

<?php } ?>