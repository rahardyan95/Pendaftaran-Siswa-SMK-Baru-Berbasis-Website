<?php
  include "../../conf/koneksi.php";
  include "../../lib/inc.session.php";
      
  // /* versi PDO */
  // $sql = $conn->prepare("SELECT * FROM psb, kompetensi, dok_kk, dok_foto
  //                    WHERE psb.id_kompetensi = kompetensi.id_kompetensi
  //                    AND psb.no_reg = dok_kk.no_reg
  //                    AND dok_kk.no_reg = dok_foto.no_reg
  //                    AND psb.no_reg = :noreg ");

  $sql = $conn->prepare(" SELECT * FROM psb as p 
                                      LEFT JOIN kompetensi as k 
                                        ON p.id_kompetensi = k.id_kompetensi 
                                      LEFT JOIN dok_kk as kk 
                                        ON p.no_reg = kk.no_reg 
                                      LEFT JOIN dok_foto as foto 
                                        ON  p.no_reg = foto.no_reg
                                      LEFT JOIN dok_ijazah as ijazah
                                        ON p.no_reg = ijazah.no_reg
                                      WHERE p.no_reg = :noreg ");
 
  $sql->bindParam(":noreg", mysql_real_escape_string(stripslashes(strip_tags($_GET['tid']))));
  $sql->execute();

  // var_dump($sql);
  // exit;
  while($r = $sql->fetch()){

    if ($r['status_verifikasi']=='Belum'){
        $pilihan_status = array('Belum', 'Sudah');
      }
      elseif ($r['status_verifikasi']=='Sudah'){
        $pilihan_status = array('Sudah', 'Batal');
      }
      else{
        $pilihan_status = array('Belum', 'Sudah', 'Batal');
      }

      $pilihan_stt = '';
      foreach ($pilihan_status as $status) {
        $pilihan_stt .= "<option value=$status";
        if ($status == $r['status_verifikasi']) {
          $pilihan_stt .= " selected";
        }
        $pilihan_stt .= ">$status</option>\r\n";
    }
?>

<style>
  ul.wysihtml5-toolbar > li {
    position: relative;
  }

  a img{
    padding: 0px 20px 20px 20px;
    width: 180px !important;
  }
</style>

<div class="row">
  <div class="col-lg-12">
    <div class="box">

      <header>
        <div class="icons">
          <i class="fa fa-th-large"></i>
          </div>
            <h5>Rincian Data Penerimaan Siswa Baru</h5>
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
        <form action="?page=upreg" method="post">
          <input type='hidden' name='noreg' value="<?php echo $r['no_reg']; ?>" >

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">No. Pendaftaran</label>
            <div class="col-lg-8">
              <input type="text" id="noreg" name="no_reg" placeholder="No. pendaftaran calon siswa baru" class="form-control" value="<?php echo $r['no_reg']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Tanggal Pendaftaran</label>
            <div class="col-lg-8">
              <input type="text" id="tglreg" name="tgl_reg" placeholder="Tanggal pendaftaran calon siswa baru" class="form-control" value="<?php echo tgl_indo($r['tgl_daftar']); ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Waktu Pendaftaran</label>
            <div class="col-lg-8">
              <input type="text" id="jamreg" name="jam_reg" placeholder="Waktu/jam pendaftaran calon siswa baru" class="form-control" value="<?php echo $r['jam_daftar']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Password</label>
            <div class="col-lg-8">
              <input type="text" id="pass" name="passwd" placeholder="Password calon siswa baru" class="form-control" value="<?php echo $r['password']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Kode Aktivasi</label>
            <div class="col-lg-8">
              <input type="text" id="kdaktivate" name="kd_aktivasi" placeholder="Kode aktivasi calon siswa baru" class="form-control" value="<?php echo $r['kode_aktivasi']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Status Aktivasi</label>
            <div class="col-lg-8">
              <input type="text" id="sttaktivate" name="stt_aktivasi" placeholder="Status aktivasi calon siswa baru" class="form-control" value="<?php echo $r['status_aktivasi']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">NISN</label>
            <div class="col-lg-8">
              <input type="text" id="nisn" name="nisn" placeholder="NISN" class="form-control" value="<?php echo $r['nisn']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Nama Siswa</label>
            <div class="col-lg-8">
              <input type="text" id="nm_siswa" name="nm_siswa" placeholder="Nama siswa" class="form-control" value="<?php echo $r['nm_siswa']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Tempat Lahir</label>
            <div class="col-lg-8">
              <input type="text" id="tmp_lahir" name="tmp_lahir" placeholder="Tempat lahir siswa" class="form-control" value="<?php echo $r['tmp_lahir']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-lg-4">Tanggal Lahir</label>
            <div class="col-lg-8">
              <div class="input-group">
                <input class="form-control" type="text" id="tgl_lahir" name="tgl_lahir" value="<?php echo $r['tgl_lahir']; ?>" required="required" data-mask="9999/99/99" readonly>
                <span class="input-group-addon">yyyy/mm/dd</span> 
              </div>
            </div>
          </div>

          <div class="form-group">
            <?php
              if ($r['jns_kelamin']=='L'){
            ?>
                    
              <div class="form-group">
                <label class="control-label col-lg-4">Jenis Kelamin</label>
              </div>
                    
              <div class="col-lg-8">
                <input class="uniform" type="radio" name="kelamin" value="L" checked disabled> Laki-laki
                <input class="uniform" type="radio" name="kelamin" value="P" disabled> Perempuan
              </div>
                    
            <?php } else { ?>
                    
              <div class="form-group">
                <label class="control-label col-lg-4">Jenis Kelamin</label>
              </div>
                    
              <div class="col-lg-8">
                <input class="uniform" type="radio" name="kelamin" value="L" disabled> Laki-laki
                <input class="uniform" type="radio" name="kelamin" value="P" checked disabled> Perempuan
              </div>
                    
            <?php } ?>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Agama</label>
            <div class="col-lg-8">
              <input type="text" id="agama" name="agama" placeholder="Agama" class="form-control" value="<?php echo $r['agama']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Anak ke-</label>
            <div class="col-lg-8">
              <input type="text" id="anak_ke" name="anak_ke" placeholder="Anak ke-" class="form-control" value="<?php echo $r['anak_ke']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Jumlah Saudara</label>
            <div class="col-lg-8">
              <input type="text" id="jml_sdr" name="jml_sdr" placeholder="Jumlah saudara" class="form-control" value="<?php echo $r['jml_saudara']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Tinggi Badan (Cm)</label>
            <div class="col-lg-8">
              <input type="text" id="tinggi_bdn" name="tinggi_bdn" placeholder="Tinggi badan siswa" class="form-control" value="<?php echo $r['tinggi_badan']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Berat Badan (Kg)</label>
            <div class="col-lg-8">
              <input type="text" id="berat_bdn" name="berat_bdn" placeholder="Berat badan siswa" class="form-control" value="<?php echo $r['berat_badan']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Golongan Darah</label>
            <div class="col-lg-8">
              <input type="text" id="gol_drh" name="gol_drh" placeholder="Golongan darah siswa" class="form-control" value="<?php echo $r['gol_darah']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Alamat Siswa</label>
            <div class="col-lg-8">
              <input type="text" id="almt_siswa" name="almt_siswa" placeholder="Alamat siswa" class="form-control" value="<?php echo $r['alamat_siswa']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Kota/Kabupaten</label>
            <div class="col-lg-8">
              <input type="text" id="kota_kab" name="kota_kab" placeholder="Kota atau kabupaten" class="form-control" value="<?php echo $r['kota_kab']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Kode Pos</label>
            <div class="col-lg-8">
              <input type="text" id="kodepos" name="kodepos" placeholder="Kode pos" class="form-control" value="<?php echo $r['kode_pos']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">No. HP Siswa</label>
            <div class="col-lg-8">
              <input type="text" id="hp_siswa" name="hp_siswa" placeholder="No. HP siswa" class="form-control" value="<?php echo $r['hp_siswa']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">No. Telepon Siswa</label>
            <div class="col-lg-8">
              <input type="text" id="tlp_siswa" name="tlp_siswa" placeholder="No. telepon siswa" class="form-control" value="<?php echo $r['tlp_siswa']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Email Siswa</label>
            <div class="col-lg-8">
              <input type="text" id="email_siswa" name="email_siswa" placeholder="Email siswa" class="form-control" value="<?php echo $r['email_siswa']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Status Rumah Siswa</label>
            <div class="col-lg-8">
              <input type="text" id="stt_rumah" name="stt_rumah" placeholder="Status rumah siswa" class="form-control" value="<?php echo $r['status_rumah_siswa']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Kepemilikan Kendaraan</label>
            <div class="col-lg-8">
              <input type="text" id="kendaraan" name="kendaraan" placeholder="Kepemilikan kendaraan siswa" class="form-control" value="<?php echo $r['kendaraan']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Asal Sekolah</label>
            <div class="col-lg-8">
              <input type="text" id="asal_skl" name="asal_skl" placeholder="Asal sekolah siswa" class="form-control" value="<?php echo $r['asal_sekolah']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Alamat Sekolah</label>
            <div class="col-lg-8">
              <textarea id="wysihtml5" class="form-control" rows="10" name="alamat_skl" readonly><?php echo $r['alamat_sekolah']; ?></textarea>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">No. Ijazah</label>
            <div class="col-lg-8">
              <input type="text" id="no_ijazah" name="no_ijazah" placeholder="Nomor ijazah" class="form-control" value="<?php echo $r['no_ijazah']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-lg-4">Tanggal Ijazah</label>
            <div class="col-lg-8">
              <div class="input-group">
                <input class="form-control" type="text" id="tgl_ijazah" name="tgl_ijazah" value="<?php echo $r['tgl_ijazah']; ?>" required="required" data-mask="9999/99/99" readonly>
                <span class="input-group-addon">yyyy/mm/dd</span> 
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Tahun Ijazah</label>
            <div class="col-lg-8">
              <input type="text" id="thn_ijazah" name="thn_ijazah" placeholder="Tahun ijazah" class="form-control" value="<?php echo $r['thn_ijazah']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-lg-4">Nilai UN</label>
            <div class="col-lg-8">
              <input class="form-control" id="nil_un" name="nil_un" type="number" step="0.1" value="<?php echo $r['nilai_un']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Prestasi Akademik</label>
            <div class="col-lg-8">
              <input type="text" id="pres_akademik" name="pres_akademik" placeholder="Prestasi akademik siswa" class="form-control" value="<?php echo $r['prestasi_akademik']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Prestasi Olahraga</label>
            <div class="col-lg-8">
              <input type="text" id="pres_or" name="pres_or" placeholder="Prestasi olahraga siswa" class="form-control" value="<?php echo $r['prestasi_olahraga']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Prestasi Kesenian</label>
            <div class="col-lg-8">
              <input type="text" id="pres_kes" name="pres_kes" placeholder="Prestasi kesenian siswa" class="form-control" value="<?php echo $r['prestasi_kesenian']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Nama Ayah</label>
            <div class="col-lg-8">
              <input type="text" id="nm_ayah" name="nm_ayah" placeholder="Nama orang tua Ayah siswa" class="form-control" value="<?php echo $r['nm_orangtua_ayah']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Nama Ibu</label>
            <div class="col-lg-8">
              <input type="text" id="nm_ibu" name="nm_ibu" placeholder="Nama orang tua Ibu siswa" class="form-control" value="<?php echo $r['nm_orangtua_ibu']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Pekerjaan Ayah</label>
            <div class="col-lg-8">
              <input type="text" id="job_ayah" name="job_ayah" placeholder="Pekerjaan ayah" class="form-control" value="<?php echo $r['pekerjaan_ayah']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Pekerjaan Ibu</label>
            <div class="col-lg-8">
              <input type="text" id="job_ibu" name="job_ibu" placeholder="Pekerjaan ibu" class="form-control" value="<?php echo $r['pekerjaan_ibu']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Penghasilan Ayah</label>
            <div class="col-lg-8">
              <input type="text" id="gaji_ayah" name="gaji_ayah" placeholder="Penghasilan ayah" class="form-control" value="<?php echo $r['penghasilan_ayah']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Penghasilan Ibu</label>
            <div class="col-lg-8">
              <input type="text" id="gaji_ibu" name="gaji_ibu" placeholder="Penghasilan ibu" class="form-control" value="<?php echo $r['penghasilan_ibu']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Alamat Orang Tua</label>
            <div class="col-lg-8">
              <input type="text" id="alamat_orangtua" name="alamat_orangtua" placeholder="Alamat orang tua" class="form-control" value="<?php echo $r['alamat_orangtua']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Kota/Kabupaten Alamat Orang Tua</label>
            <div class="col-lg-8">
              <input type="text" id="kota_kab_ortu" name="kota_kab_ortu" placeholder="Kota atau Kabupaten alamat orang tua" class="form-control" value="<?php echo $r['kota_kab_orgtua']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Kode Pos Alamat Orang Tua</label>
            <div class="col-lg-8">
              <input type="text" id="kodepos_ortu" name="kodepos_ortu" placeholder="Kode pos alamat orang tua" class="form-control" value="<?php echo $r['kode_pos_orgtua']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">No. HP Orang Tua</label>
            <div class="col-lg-8">
              <input type="text" id="hp_ortu" name="hp_ortu" placeholder="No. HP orang tua" class="form-control" value="<?php echo $r['hp_orgtua']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Nama Wali</label>
            <div class="col-lg-8">
              <input type="text" id="nm_wali" name="nm_wali" placeholder="Nama wali" class="form-control" value="<?php echo $r['nm_wali']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Pekerjaan Wali</label>
            <div class="col-lg-8">
              <input type="text" id="job_wali" name="job_wali" placeholder="Pekerjaan wali" class="form-control" value="<?php echo $r['pekerjaan_wali']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Penghasilan Wali</label>
            <div class="col-lg-8">
              <input type="text" id="gaji_wali" name="gaji_wali" placeholder="Penghasilan wali" class="form-control" value="<?php echo $r['penghasilan_wali']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Alamat Wali</label>
            <div class="col-lg-8">
              <textarea id="wysihtml5" class="form-control" rows="10" name="alamat_wali" readonly><?php echo $r['alamat_wali']; ?></textarea>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">No. HP Wali</label>
            <div class="col-lg-8">
              <input type="text" id="hp_wali" name="hp_wali" placeholder="No. HP wali" class="form-control" value="<?php echo $r['hp_wali']; ?>" required="required" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Penanggung Biaya</label>
            <div class="col-lg-8">
              <input type="text" id="pj_biaya" name="pj_biaya" placeholder="Penanggung jawab biaya" class="form-control" value="<?php echo $r['penanggung_biaya']; ?>" required="required" readonly>
            </div>
          </div>
          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">&nbsp;</label>
            <div class="col-lg-8">&nbsp;
            </div>
          </div>
          <div class="clearfix"></div>

          <?php
            if ($r['pic_dok_kk']!=''){                    
          ?>
              <div class="form-group">
            <label for="text1" class="control-label col-lg-4">KK</label>
                <div class="col-lg-8">
                  <a href="#"  data-toggle="modal" data-target="#modalKK">
                    <?php echo "<img src='./../dist/img_kk/$r[pic_dok_kk]' width='100px'>"; ?>
                  </a>
                </div>
              </div>

              <!-- Modal -->
              <div class="modal fade" id="modalKK" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Dokumen KK</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <?php echo "<img src='./../dist/img_kk/$r[pic_dok_kk]' width='100%'>"; ?>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>


            <?php } else { ?>
              <div class="form-group">
            <label for="text1" class="control-label col-lg-4">KK</label>
                <div class="col-lg-8">
                  <?php echo "<img src='./../dist/img_foto/image_not_available.jpg' oncontextmenu='return false;' width='100px'>"; ?>
                  <!-- script (oncontextmenu='return false;'): mencegah gambar tidak dapat di klik kanan. -->
                </div>
              </div>
          <?php } ?>

          <?php
            if ($r['pic_foto']!=''){                    
          ?>
              <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Foto</label>
                <div class="col-lg-8">
                  <a href="#"  data-toggle="modal" data-target="#modalfoto">
                    <?php echo "<img src='./../dist/img_foto/$r[pic_foto]' width='100px'>"; ?>
                  </a>
                </div>
              </div>

              <!-- Modal -->
              <div class="modal fade" id="modalfoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Dokumen Foto</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <?php echo "<img src='./../dist/img_foto/$r[pic_foto]' width='100%'>"; ?>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>


            <?php } else { ?>
              <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Foto</label>
                <div class="col-lg-8">
                  <?php echo "<img src='./../dist/img_foto/image_not_available.jpg' oncontextmenu='return false;' width='100px'>"; ?>
                  <!-- script (oncontextmenu='return false;'): mencegah gambar tidak dapat di klik kanan. -->
                </div>
              </div>
          <?php } ?>

          <?php
            if ($r['pic_dok_ijazah']!=''){                    
          ?>
              <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Ijazah</label>
                <div class="col-lg-8">
                  <a href="#"  data-toggle="modal" data-target="#modalijazah">
                    <?php echo "<img src='./../dist/img_ijazah/$r[pic_dok_ijazah]' width='100px'>"; ?>
                  </a>
                </div>
              </div>

              <!-- Modal -->
              <div class="modal fade" id="modalijazah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Dokumen Ijazah</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <?php echo "<img src='./../dist/img_ijazah/$r[pic_dok_ijazah]' width='100%'>"; ?>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>


            <?php } else { ?>
              <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Foto</label>
                <div class="col-lg-8">
                  <?php echo "<img src='./../dist/img_foto/image_not_available.jpg' oncontextmenu='return false;' width='100px'>"; ?>
                  <!-- script (oncontextmenu='return false;'): mencegah gambar tidak dapat di klik kanan. -->
                </div>
              </div>
          <?php } ?>

          <div class="form-group">
            <label for="text1" class="control-label col-lg-4">Ubah Status Verifikasi</label>
            <div class="col-lg-8">
              <select name='status_ver' class='form-control'>
                <?php echo $pilihan_stt ?>
              </select>
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