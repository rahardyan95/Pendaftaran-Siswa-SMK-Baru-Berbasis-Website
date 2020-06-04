<?php
  session_start();
  include "../lib/inc.session.sis.php";
  // var_dump($_SESSION['noreg']);exit();

  $pg = isset($_GET['page']) ? $_GET['page'] : '' ; /*-- PHP 5 --*/
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Ruang Calon Siswa</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
    <!--<link href="css/grid.css" rel="stylesheet">-->
    <link href="./css/casis/theme.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]-->
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <!--[endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="media.php?page=home">Ruang Calon Siswa</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="?page=pfsis">Profil Siswa</a></li>
            <li><a href="sign-out">Sign out</a></li>
          </ul>
          <ul></ul>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li  class="<?=($pg=='home')? 'active' : '' ?>"><a href="?page=home">Dashboard</a></li>
            <li   class="<?=($pg=='unggah')? 'active' : '' ?>"><a href="?page=unggah">Unggah Dokumen</a></li>
            <!-- <li><a href="?page=mapel">Input Mata Pelajaran</a></li> -->
            <li class="<?=($pg=='nilai-raport')? 'active' : '' ?>"><a href="?page=nilai-raport">Input Nilai Raport</a></li>
            <li class="<?=($pg=='ujian')? 'active' : '' ?>"><a href="?page=ujian">Ujian Saringan Masuk</a></li>
          </ul>
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          
          <?php include "open_file.php"; ?>

        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/docs.min.js"></script>

  </body>
</html>