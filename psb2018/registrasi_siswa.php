<?php
	session_start();
	include("assets/simple-captcha/simple-php-captcha.php");
	$_SESSION['captcha'] = simple_php_captcha();
?>

<script type="text/javascript">
	function validasi(){
		/*--- validasi combo bidang kompetensi ---*/
		var kmpt = (form1.kompetensi.value);
		if(kmpt == 0){
			alert("Pilih bidang kompetensi.");
			document.form1.kompetensi.focus();
			return false;
		}
	}
</script>

<div class="alert alert-info">
    <p>Lengkapi formulir blanko pendaftaran siswa dibawah ini.</p>
</div>

<div class="well">
	<form role="form1" name="form1" action="aksi-registrasi.html" method="post" onSubmit="return validasi()" >
	<p>
		<div class="form-group">
        	<label for="nisn">NISN*</label>
            <input type="text" class="form-control" name="nisn" id="nisn" placeholder="Masukkan NISN"  required="required" onkeypress="return event.charCode>=48 &amp;&amp; event.charCode<=57" title="Hanya bisa dimasukkan angka NISN.">
        </div>
	</p>

	<p>
		<div class="form-group">
        	<label for="nm_siswa">Nama Siswa*</label>
            <input type="text" class="form-control" name="nm_siswa" id="nm_siswa" placeholder="Masukkan nama siswa"  required="required" title="Masukkan nama siswa sesuai data." onkeypress="return (event.charCode>=65 && event.charCode<=90) || (event.charCode>=97 && event.charCode<=122) || event.charCode==32">
        </div>
	</p>

	<p>
		<div class="form-group">
        	<label for="asal_skl">Asal Sekolah*</label>
            <input type="text" class="form-control" name="asal_skl" id="asal_skl" placeholder="Masukkan asal sekolah"  required="required" title="Masukkan nama sekolah sesuai data.">
        </div>
	</p>

	<p>
		<div class="form-group">
        	<label for="email">E-mail Siswa*</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="email-siswa@maildomain.com"  required="required" title="Masukkan email yang aktif.">
        </div>
	</p>

	<p>
		<div class="form-group">
			<label>Bidang Kompetensi*</label>
			<select class="form-control" name="kompetensi">
				<?php 
					include "conf/koneksi.php";
						
					echo"
						<option value=0 selected>- Pilih Bidang Kompetensi -</option>";

						/* versi PDO */
						$aktif = 'Y';
						// $sql = $conn->prepare("SELECT * FROM kompetensi 
												// WHERE aktif_kompetensi = :aktif_kompetensi 
												// ORDER BY id_kompetensi");
						$sql = $conn->prepare("SELECT k.id_kompetensi,k.bid_kompetensi,k.kuota,k.aktif_kompetensi, COUNT(p.id_kompetensi) AS total_masuk FROM kompetensi AS k  LEFT JOIN psb AS p ON p.id_kompetensi=k.id_kompetensi WHERE k.aktif_kompetensi = :aktif_kompetensi GROUP BY k.id_kompetensi");
						$sql->bindParam(":aktif_kompetensi", $aktif);
						$sql->execute();
						while ($r = $sql->fetch()){
							if($r[total_masuk]<$r[kuota]){

							echo "<option value=$r[id_kompetensi]>$r[bid_kompetensi] - Kuota $r[kuota]</option>";
							}
						} 
				?>
  			</select>
		</div>
	</p>

	<?php
		/* captcha from https://www.abeautifulsite.net/a-simple-php-captcha-script --*/
        // echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA" />';
        // echo "<br>";
	?>

	<p>
		<div class="form-group">
			<div class="g-recaptcha" data-sitekey="6LeFslcUAAAAACYarWLZl6oPlNiV5agp4ro-KHHE"></div>
        	<!-- <input type="text" class="form-control" name="captcha" id="captcha" placeholder="Masukkan kode captcha diatas." required="required" title="Pengecekan anti robot."> -->
    	</div>
    </p>
	
    <p align="right">
		<button type="submit" class="btn btn-primary" name="submit">Submit</button>
	</p>
	</form>
</div>