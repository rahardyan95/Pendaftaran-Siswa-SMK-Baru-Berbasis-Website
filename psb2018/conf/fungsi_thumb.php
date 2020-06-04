<?php
/*------------------------------------------------ UPLOAD DOKUMEN KK ------------------------------------------------*/
function UploadKk($fupload_name){
  //direktori gambar
  $vdir_upload = "../cfg/dist/img_kk/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $imageType = $_FILES["fupload_kk"]["type"];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload_kk"]["tmp_name"], $vfile_upload);

  //identitas file asli
  switch($imageType) {
		case "image/gif":
			$im_src=imagecreatefromgif($vfile_upload);
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
			$im_src=imagecreatefromjpeg($vfile_upload);
			break;
	    case "image/png":
		case "image/x-png":
			$im_src=imagecreatefrompng($vfile_upload);
			break;
  }

  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 500 pixel
  //Set ukuran gambar hasil perubahan
  if($src_width>=500){
  $dst_width = 500;
  } else {
  $dst_width = $src_width;
  }
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  switch($imageType) {
		case "image/gif":
  			imagegif($im,$vdir_upload.$fupload_name);
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
  			imagejpeg($im,$vdir_upload.$fupload_name);
			break;
	    case "image/png":
		case "image/x-png":
  			imagepng($im,$vdir_upload.$fupload_name);
			break;
  }

  //Simpan dalam versi small 300 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width2 = 300;
  $dst_height2 = ($dst_width2/$src_width)*$src_height;

  //proses perubahan ukuran
  $im2 = imagecreatetruecolor($dst_width2,$dst_height2);
  imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);

  //Simpan gambar
  switch($imageType) {
		case "image/gif":
  			imagegif($im2,$vdir_upload . "small_" . $fupload_name);
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
  			imagejpeg($im2,$vdir_upload . "small_" . $fupload_name);
			break;
	    case "image/png":
		case "image/x-png":
  			imagepng($im2,$vdir_upload . "small_" . $fupload_name);
			break;
  }

  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
  imagedestroy($im2);
}

/*---------------------------------------------------------------------------------------------------------------------*/

/*------------------------------------------------ UPLOAD DOKUMEN IJAZAH ------------------------------------------------*/
function UploadiZ($fupload_name){
  //direktori gambar
  $vdir_upload = "../cfg/dist/img_ijazah/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $imageType = $_FILES["fupload_iz"]["type"];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload_iz"]["tmp_name"], $vfile_upload);

  //identitas file asli
  switch($imageType) {
    case "image/gif":
      $im_src=imagecreatefromgif($vfile_upload);
      break;
      case "image/pjpeg":
    case "image/jpeg":
    case "image/jpg":
      $im_src=imagecreatefromjpeg($vfile_upload);
      break;
      case "image/png":
    case "image/x-png":
      $im_src=imagecreatefrompng($vfile_upload);
      break;
  }

  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 500 pixel
  //Set ukuran gambar hasil perubahan
  if($src_width>=500){
  $dst_width = 500;
  } else {
  $dst_width = $src_width;
  }
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  switch($imageType) {
    case "image/gif":
        imagegif($im,$vdir_upload.$fupload_name);
      break;
      case "image/pjpeg":
    case "image/jpeg":
    case "image/jpg":
        imagejpeg($im,$vdir_upload.$fupload_name);
      break;
      case "image/png":
    case "image/x-png":
        imagepng($im,$vdir_upload.$fupload_name);
      break;
  }

  //Simpan dalam versi small 300 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width2 = 300;
  $dst_height2 = ($dst_width2/$src_width)*$src_height;

  //proses perubahan ukuran
  $im2 = imagecreatetruecolor($dst_width2,$dst_height2);
  imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);

  //Simpan gambar
  switch($imageType) {
    case "image/gif":
        imagegif($im2,$vdir_upload . "small_" . $fupload_name);
      break;
      case "image/pjpeg":
    case "image/jpeg":
    case "image/jpg":
        imagejpeg($im2,$vdir_upload . "small_" . $fupload_name);
      break;
      case "image/png":
    case "image/x-png":
        imagepng($im2,$vdir_upload . "small_" . $fupload_name);
      break;
  }

  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
  imagedestroy($im2);
}

/*---------------------------------------------------------------------------------------------------------------------*/

/*------------------------------------------------ UPLOAD DOKUMEN FOTO ------------------------------------------------*/
function UploadfT($fupload_name){
  //direktori gambar
  $vdir_upload = "../cfg/dist/img_foto/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $imageType = $_FILES["fupload_ft"]["type"];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload_ft"]["tmp_name"], $vfile_upload);

  //identitas file asli
  switch($imageType) {
    case "image/gif":
      $im_src=imagecreatefromgif($vfile_upload);
      break;
      case "image/pjpeg":
    case "image/jpeg":
    case "image/jpg":
      $im_src=imagecreatefromjpeg($vfile_upload);
      break;
      case "image/png":
    case "image/x-png":
      $im_src=imagecreatefrompng($vfile_upload);
      break;
  }

  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 500 pixel
  //Set ukuran gambar hasil perubahan
  if($src_width>=500){
  $dst_width = 500;
  } else {
  $dst_width = $src_width;
  }
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  switch($imageType) {
    case "image/gif":
        imagegif($im,$vdir_upload.$fupload_name);
      break;
      case "image/pjpeg":
    case "image/jpeg":
    case "image/jpg":
        imagejpeg($im,$vdir_upload.$fupload_name);
      break;
      case "image/png":
    case "image/x-png":
        imagepng($im,$vdir_upload.$fupload_name);
      break;
  }

  //Simpan dalam versi small 300 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width2 = 300;
  $dst_height2 = ($dst_width2/$src_width)*$src_height;

  //proses perubahan ukuran
  $im2 = imagecreatetruecolor($dst_width2,$dst_height2);
  imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);

  //Simpan gambar
  switch($imageType) {
    case "image/gif":
        imagegif($im2,$vdir_upload . "small_" . $fupload_name);
      break;
      case "image/pjpeg":
    case "image/jpeg":
    case "image/jpg":
        imagejpeg($im2,$vdir_upload . "small_" . $fupload_name);
      break;
      case "image/png":
    case "image/x-png":
        imagepng($im2,$vdir_upload . "small_" . $fupload_name);
      break;
  }

  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
  imagedestroy($im2);
}

/*---------------------------------------------------------------------------------------------------------------------*/

/*------------------------------------------------ UPLOAD FOTO PENGGUNA ------------------------------------------------*/
function UploadUser($fupload_name){
  //direktori gambar
  $vdir_upload = "../../cfg/dist/img_user/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $imageType = $_FILES["fupload"]["type"];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli
  switch($imageType) {
    case "image/gif":
      $im_src=imagecreatefromgif($vfile_upload);
      break;
      case "image/pjpeg":
    case "image/jpeg":
    case "image/jpg":
      $im_src=imagecreatefromjpeg($vfile_upload);
      break;
      case "image/png":
    case "image/x-png":
      $im_src=imagecreatefrompng($vfile_upload);
      break;
  }

  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 250 pixel
  //Set ukuran gambar hasil perubahan
  if($src_width>=250){
  $dst_width = 250;
  } else {
  $dst_width = $src_width;
  }
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  switch($imageType) {
    case "image/gif":
        imagegif($im,$vdir_upload.$fupload_name);
      break;
      case "image/pjpeg":
    case "image/jpeg":
    case "image/jpg":
        imagejpeg($im,$vdir_upload.$fupload_name);
      break;
      case "image/png":
    case "image/x-png":
        imagepng($im,$vdir_upload.$fupload_name);
      break;
  }

  //Simpan dalam versi small 75 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width2 = 75;
  $dst_height2 = ($dst_width2/$src_width)*$src_height;

  //proses perubahan ukuran
  $im2 = imagecreatetruecolor($dst_width2,$dst_height2);
  imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);

  //Simpan gambar
  switch($imageType) {
    case "image/gif":
        imagegif($im2,$vdir_upload . "small_" . $fupload_name);
      break;
      case "image/pjpeg":
    case "image/jpeg":
    case "image/jpg":
        imagejpeg($im2,$vdir_upload . "small_" . $fupload_name);
      break;
      case "image/png":
    case "image/x-png":
        imagepng($im2,$vdir_upload . "small_" . $fupload_name);
      break;
  }

  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
  imagedestroy($im2);
}

/*---------------------------------------------------------------------------------------------------------------------*/

/*------------------------------------------------ UPLOAD CARA DAFTAR ------------------------------------------------*/
function UploadCaraDaftar($fupload_name){
  //direktori gambar
  $vdir_upload = "../../cfg/dist/img_caradft/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $imageType = $_FILES["fupload"]["type"];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli
  switch($imageType) {
    case "image/gif":
      $im_src=imagecreatefromgif($vfile_upload);
      break;
      case "image/pjpeg":
    case "image/jpeg":
    case "image/jpg":
      $im_src=imagecreatefromjpeg($vfile_upload);
      break;
      case "image/png":
    case "image/x-png":
      $im_src=imagecreatefrompng($vfile_upload);
      break;
  }

  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 300 pixel
  //Set ukuran gambar hasil perubahan
  if($src_width>=600){
  $dst_width = 600;
  } else {
  $dst_width = $src_width;
  }
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  switch($imageType) {
    case "image/gif":
        imagegif($im,$vdir_upload.$fupload_name);
      break;
      case "image/pjpeg":
    case "image/jpeg":
    case "image/jpg":
        imagejpeg($im,$vdir_upload.$fupload_name);
      break;
      case "image/png":
    case "image/x-png":
        imagepng($im,$vdir_upload.$fupload_name);
      break;
  }

  //Simpan dalam versi small 250 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width2 = 500;
  $dst_height2 = ($dst_width2/$src_width)*$src_height;

  //proses perubahan ukuran
  $im2 = imagecreatetruecolor($dst_width2,$dst_height2);
  imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);

  //Simpan gambar
  switch($imageType) {
    case "image/gif":
        imagegif($im2,$vdir_upload . "small_" . $fupload_name);
      break;
      case "image/pjpeg":
    case "image/jpeg":
    case "image/jpg":
        imagejpeg($im2,$vdir_upload . "small_" . $fupload_name);
      break;
      case "image/png":
    case "image/x-png":
        imagepng($im2,$vdir_upload . "small_" . $fupload_name);
      break;
  }

  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
  imagedestroy($im2);
}

/*---------------------------------------------------------------------------------------------------------------------*/

/*------------------------------------------------ UPLOAD INFORMASI ------------------------------------------------*/
function UploadInformasi($fupload_name){
  //direktori gambar
  $vdir_upload = "../../cfg/dist/img_informasi/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $imageType = $_FILES["fupload"]["type"];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli
  switch($imageType) {
    case "image/gif":
      $im_src=imagecreatefromgif($vfile_upload);
      break;
      case "image/pjpeg":
    case "image/jpeg":
    case "image/jpg":
      $im_src=imagecreatefromjpeg($vfile_upload);
      break;
      case "image/png":
    case "image/x-png":
      $im_src=imagecreatefrompng($vfile_upload);
      break;
  }

  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 300 pixel
  //Set ukuran gambar hasil perubahan
  if($src_width>=300){
  $dst_width = 300;
  } else {
  $dst_width = $src_width;
  }
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  switch($imageType) {
    case "image/gif":
        imagegif($im,$vdir_upload.$fupload_name);
      break;
      case "image/pjpeg":
    case "image/jpeg":
    case "image/jpg":
        imagejpeg($im,$vdir_upload.$fupload_name);
      break;
      case "image/png":
    case "image/x-png":
        imagepng($im,$vdir_upload.$fupload_name);
      break;
  }

  //Simpan dalam versi small 250 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width2 = 250;
  $dst_height2 = ($dst_width2/$src_width)*$src_height;

  //proses perubahan ukuran
  $im2 = imagecreatetruecolor($dst_width2,$dst_height2);
  imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);

  //Simpan gambar
  switch($imageType) {
    case "image/gif":
        imagegif($im2,$vdir_upload . "small_" . $fupload_name);
      break;
      case "image/pjpeg":
    case "image/jpeg":
    case "image/jpg":
        imagejpeg($im2,$vdir_upload . "small_" . $fupload_name);
      break;
      case "image/png":
    case "image/x-png":
        imagepng($im2,$vdir_upload . "small_" . $fupload_name);
      break;
  }

  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
  imagedestroy($im2);
}

/*---------------------------------------------------------------------------------------------------------------------*/
?>
