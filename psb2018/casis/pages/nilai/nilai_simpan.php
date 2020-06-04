<?php
	include "../conf/koneksi.php";
	include "../lib/inc.session.sis.php";
// echo"<pre>";
// print_r($_POST);
// echo"</pre>";
// exit;
	if($_POST){
		$noreg = $_POST['noreg'];
		$idmpl = $_POST['idmapel'];
		$nil1 = isset($_POST['nil1']) ? $_POST['nil1'] : '';
		$nil2 = isset($_POST['nil2']) ? $_POST['nil2'] : '';
		$nil3 = isset($_POST['nil3']) ? $_POST['nil3'] : '';
		$nil4 = isset($_POST['nil4']) ? $_POST['nil4'] : '';
		$nil5 = isset($_POST['nil5']) ? $_POST['nil5'] : '';
		
		$jml = count($idmpl);

		echo "Jumlah data: ".$jml;
		for($x=0; $x<$jml; $x++){
			$ratarata[$x] = ($nil1[$x] + $nil2[$x] + $nil3[$x] + $nil4[$x] + $nil5[$x]) / 5;

			if (($nil1[$x])=="" or ! is_numeric($nil1[$x]) or 
				($nil2[$x])=="" or ! is_numeric($nil2[$x]) or
				($nil3[$x])=="" or ! is_numeric($nil3[$x]) or
				($nil4[$x])=="" or ! is_numeric($nil4[$x]) or
				($nil5[$x])=="" or ! is_numeric($nil5[$x])) {
				echo "<script>alert('Nilai semester hanya dapat di isi oleh angka.');</script>";
				echo "<meta http-equiv='refresh' content='0;url=?page=nilai-raport'>";
				exit;
			}
			else{
				try{
					$sql = $conn->prepare("UPDATE nilai_raport SET id_mapel = '".$idmpl[$x]."',
														  nil1 = '".$nil1[$x]."',
														  nil2 = '".$nil2[$x]."',
														  nil3 = '".$nil3[$x]."',
														  nil4 = '".$nil4[$x]."',
														  nil5 = '".$nil5[$x]."',
														  nil_ratarata = '".$ratarata[$x]."'
														WHERE id_mapel = :idmapel
														AND no_reg = :noreg ");
					$sql->bindParam(":idmapel", $idmpl[$x]);
					$sql->bindParam(":noreg", $noreg);
					$sql->execute();

				}
				catch(PDOException $e){
					echo $e->getMessage();
				}
			}

		}
		
					echo "<script>alert('Data nilai raport siswa telah terupdate.');</script>";
					echo "<meta http-equiv='refresh' content='0;url=?page=nilai-raport'>";
	}
?>