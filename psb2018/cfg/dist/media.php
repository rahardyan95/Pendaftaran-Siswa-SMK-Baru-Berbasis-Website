<?php
  session_start();
  include "../../lib/inc.session.php";
  include "../../conf/koneksi.php";
  include "../../conf/fungsi_indotgl.php";

  /* versi PDO */
  $sql = $conn->prepare("SELECT * FROM admin 
                          WHERE username = :user ");
  $sql->bindParam(":user", $_SESSION['usernm']);
  $sql->execute();
  $r = $sql->fetch();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Sisfo PSB Online</title>

    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-TileColor" content="#5bc0de">
    <meta name="msapplication-TileImage" content="assets/img/metis-tile.png">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../dist/assets/lib/bootstrap/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../dist/assets/lib/Font-Awesome/css/font-awesome.min.css">

    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="../dist/assets/css/main.min.css">
    <link rel="stylesheet" href="../dist/assets/css/theme.css">
    
    <link rel="stylesheet" href="../dist/assets/lib/wysihtml5/dist/bootstrap-wysihtml5-0.0.2.css">
    <link rel="stylesheet" href="../dist/assets/css/bootstrap-wysihtml5-hack.css">
    
    <link rel="stylesheet" href="../dist/assets/lib/datatables/css/demo_page.css">
    <link rel="stylesheet" href="../dist/assets/lib/datatables/css/DT_bootstrap.css">

    
    <link rel="stylesheet" href="../dist/ssets/lib/uniform/themes/default/css/uniform.default.css">
    <link rel="stylesheet" href="../dist/assets/lib/inputlimiter/jquery.inputlimiter.1.0.css">
    <link rel="stylesheet" href="../dist/assets/lib/chosen/chosen.min.css">
    <link rel="stylesheet" href="../dist/assets/lib/colorpicker/css/colorpicker.css">
    <link rel="stylesheet" href="../dist/assets/lib/tagsinput/jquery.tagsinput.css">
    <link rel="stylesheet" href="../dist/assets/lib/daterangepicker/daterangepicker-bs3.css">
    <link rel="stylesheet" href="../dist/assets/lib/datepicker/css/datepicker.css">
    <link rel="stylesheet" href="../dist/assets/lib/timepicker/css/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="../dist/assets/lib/switch/build/css/bootstrap3/bootstrap-switch.min.css">
    <link rel="stylesheet" href="../dist/assets/lib/jasny/css/jasny-bootstrap.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>-->
    <script src="assets/lib/html5shiv/html5shiv.js"></script>
    <script src="assets/lib/respond/respond.min.js"></script>
    <!--[endif]-->

    <!--Modernizr 3.0-->
    <script src="assets/lib/modernizr-build.min.js"></script>

  </head>
  <body>
    <div id="wrap">
      <div id="top">

        <!-- .navbar -->
        <nav class="navbar navbar-inverse navbar-static-top">

          <!-- Brand and toggle get grouped for better mobile display -->
          <header class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
              <span class="sr-only">Toggle navigation</span> 
              <span class="icon-bar"></span> 
              <span class="icon-bar"></span> 
              <span class="icon-bar"></span> 
            </button>
            <a href="?page=dashboard" class="navbar-brand">
              <img src="assets/img/logo.png" alt="PSB Online">
            </a> 
          </header>
          <div class="topnav">
            <div class="btn-toolbar">
              <div class="btn-group">
                <a data-placement="bottom" data-original-title="Fullscreen" data-toggle="tooltip" class="btn btn-default btn-sm" id="toggleFullScreen">
                  <i class="glyphicon glyphicon-fullscreen"></i>
                </a> 
              </div>
              <div class="btn-group">
                <a data-placement="bottom" data-original-title="Show / Hide Sidebar" data-toggle="tooltip" class="btn btn-success btn-sm" id="changeSidebarPos">
                  <i class="fa fa-expand"></i>
                </a> 
              </div>

              <div class="btn-group">
                <a data-placement="bottom" data-original-title="Document" href="#" data-toggle="tooltip" class="btn btn-default btn-sm">
                  <i class="fa fa-file"></i>
                </a> 
                <a data-toggle="modal" data-original-title="Help" data-placement="bottom" class="btn btn-default btn-sm" href="#helpModal">
                  <i class="fa fa-question"></i>
                </a> 
              </div>

              <div class="btn-group">
                <a href="sign-out" data-toggle="tooltip" data-original-title="Logout" data-placement="bottom" class="btn btn-metis-1 btn-sm">
                  <i class="fa fa-power-off"></i>
                </a> 
              </div>
            </div>
          </div><!-- /.topnav -->
          <div class="collapse navbar-collapse navbar-ex1-collapse"></div>
        </nav><!-- /.navbar -->

        <!-- header.head -->
        <header class="head"></header>

        <!-- end header.head -->
      </div><!-- /#top -->
      <div id="left">
        <div class="media user-media">
          <div class="user-media-toggleHover">
            <span class="fa fa-user"></span> 
          </div>
          <div class="user-wrapper">
            <a class="user-link" href="#">
              <?php
                if ($r['pic_admin']!=''){                    
              ?>
                  <img class="media-object img-thumbnail user-img" alt="User Picture" src="../../cfg/dist/img_user/small_<?php echo $r['pic_admin']; ?>" oncontextmenu="return false;">
                <?php } else { ?>
                  <img class="media-object img-thumbnail user-img" alt="User Picture" src="../../cfg/dist/img_user/image_not_available_copy.jpg" oncontextmenu="return false;">
              <?php } ?>
            </a> 
            <div class="media-body">
              <h5 class="media-heading"><?php echo $r['nm_lengkap']; ?></h5>
              <ul class="list-unstyled user-info">
                <li>Last Access :
                  <br>
                  <small>
                    <i class="fa fa-calendar"></i>&nbsp;<?php echo tgl_indo($r['dt_last_akses']); ?></small><br>
                    <i class="fa fa-user"></i>&nbsp;<?php echo $r['status_admin']; ?></small>  
                </li>
              </ul>
            </div>
          </div>
        </div>

        <!-- #menu -->
        <ul id="menu" class="">
          <li class="nav-header">Menu</li>
          <li class="nav-divider"></li>
          <li class="">
            <a href="?page=dashboard">
              <i class="fa fa-desktop"></i>
              <span class="link-title">Dashboard</span> 
            </a> 
          </li>
          <li class="">
            <a href="javascript:;">
              <i class="fa fa-tasks"></i>
              <span class="link-title">
              Konten
            </span> 
              <span class="fa arrow"></span>
            </a> 
            <ul>
              <li class="">
                <a href="?page=cridweb">
                  <i class="fa fa-angle-right"></i>&nbsp;Identitas Website</a> 
              </li>
              <li class="">
                <a href="?page=crdft">
                  <i class="fa fa-angle-right"></i>&nbsp;Cara Pendaftaran</a> 
              </li>
              <li class="">
                <a href="?page=crinfo">
                  <i class="fa fa-angle-right"></i>&nbsp;Informasi PSB</a> 
              </li>
            </ul>
          </li>
          <li class="">
            <a href="javascript:;">
              <i class="fa fa-file"></i>
              <span class="link-title">
                Manajemen
	             </span> 
              <span class="fa arrow"></span> 
            </a> 
            <ul>
              <li class="">
                <a href="?page=vwreg">
                  <i class="fa fa-angle-right"></i>&nbsp;Penerimaan Siswa Baru</a> 
              </li>
              <!-- <li class="">
                <a href="?page=vwnil">
                  <i class="fa fa-angle-right"></i>&nbsp;Nilai Raport Siswa</a> 
              </li> -->
              <li class="">
                <a href="?page=vwconfig">
                  <i class="fa fa-paste"></i>
                  <span class="link-title">
                    Configuration Dokumen
                  </span> 
                  <!-- <span class="fa arrow"></span>  -->
                </a> 
               <!--  <ul>
                  <li class="">
                    <a href="?page=vwkk">
                      <i class="fa fa-angle-right"></i>&nbsp;Kartu Keluarga (KK)
                    </a> 
                  </li>
                  <li class="">
                    <a href="?page=vwiz">
                      <i class="fa fa-angle-right"></i>&nbsp;Ijazah/SHUN/SKL
                    </a> 
                  </li>
                  <li class="">
                    <a href="?page=vwft">
                      <i class="fa fa-angle-right"></i>&nbsp;Foto
                    </a> 
                  </li>
                  <li class="">
                    <a href="?page=vwconfig">
                      <i class="fa fa-angle-right"></i>&nbsp;Configuration Dokumen
                    </a> 
                  </li>
                </ul> -->
              </li>
              <li class="">
                <a href="?page=vwusm">
                  <i class="fa fa-angle-right"></i>&nbsp;Ujian Saringan Masuk</a> 
              </li>
            </ul>
          </li>

          <li>
            <a href="javascript:;">
              <i class="fa fa-cog"></i>
              <span class="link-title">
              Pengaturan
            </span> 
              <span class="fa arrow"></span> 
            </a> 
            <ul>
              <li>
                <a href="?page=vwuser">
                  <i class="fa fa-angle-right"></i>&nbsp;Pengguna</a> 
              </li>
              <li>
                <a href="?page=vwkmpt">
                  <i class="fa fa-angle-right"></i>&nbsp;Kompetensi</a> 
              </li>
              <li>
                <a href="?page=vwmapel">
                  <i class="fa fa-angle-right"></i>&nbsp;Mata Pelajaran</a> 
              </li>
            </ul>
          </li>

          <!-- <li>
            <a href="javascript:;">
              <i class="fa fa-wrench"></i>
              <span class="link-title">
              Utility
            </span> 
              <span class="fa arrow"></span> 
            </a> 
            <ul>
              <li>
                <a href="?page=bcdb">
                  <i class="fa fa-angle-right"></i>&nbsp;Backup Database</a> 
              </li>
            </ul>
          </li>
        </ul><!-- /#menu -->
      </div><!-- /#left --> -->

      <div id="content">
        <div class="outer">
          <div class="inner">
            <div class="col-lg-12">

              <?php include "../dist/open_file.php"; ?>
            
            </div>
          </div>

          <!-- end .inner -->
        </div>

        <!-- end .outer -->
      </div>

      <!-- end #content -->
    </div><!-- /#wrap -->
    <div id="footer">
      <p>2018 &copy; SMK Nusantara Indonesia</p>
    </div>

    <!-- #helpModal -->
    <div id="helpModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Informasi</h4>
          </div>
          <div class="modal-body">
            <p>
              Selamat datang dihalaman administrator PSB SMK Nusantara Indonesia. Halaman ini disediakan khusus untuk mengelola konten website PSB SMK Nusantara Indonesia guna meningkatkan mutu pelayanan terhadap calon siswa.
              Mohon gunakan halaman ini dengan sebaik-baiknya. Utamakan pelayanan terhadap calon siswa SMK usantara Indonesia.
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal --><!-- /#helpModal -->
    <script src="../dist/assets/lib/jquery.min.js"></script>
    <script src="../dist/assets/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="../dist/assets/lib/screenfull/screenfull.js"></script>
    <script src="../dist/assets/js/main.min.js"></script>

    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="../dist/assets/lib/datatables/jquery.dataTables.js"></script>
    <script src="../dist/assets/lib/datatables/DT_bootstrap.js"></script>
    <script src="../dist/assets/lib/tablesorter/js/jquery.tablesorter.min.js"></script> 

    
    <script src="../dist/assets/lib/uniform/jquery.uniform.min.js"></script>
    <script src="../dist/assets/lib/inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
    <script src="../dist/assets/lib/chosen/chosen.jquery.min.js"></script>
    <script src="../dist/assets/lib/colorpicker/js/bootstrap-colorpicker.js"></script>
    <script src="../dist/assets/lib/tagsinput/jquery.tagsinput.min.js"></script>
    <script src="../dist/assets/lib/validVal/src/js/jquery.validVal.min.js"></script>
    <script src="../dist/assets/lib/daterangepicker/daterangepicker.js"></script>
    <script src="../dist/assets/lib/daterangepicker/moment.min.js"></script>
    <script src="../dist/assets/lib/datepicker/js/bootstrap-datepicker.js"></script>
    <script src="../dist/assets/lib/timepicker/js/bootstrap-timepicker.min.js"></script>
    <script src="../dist/assets/lib/switch/build/js/bootstrap-switch.min.js"></script>
    <script src="../dist/assets/lib/jquery.dualListbox-1.3/jquery.dualListBox-1.3.min.js"></script>
    <script src="../dist/assets/lib/autosize/jquery.autosize.min.js"></script>
    <script src="../dist/assets/lib/jasny/js/jasny-bootstrap.min.js"></script>
    <script>
      $(function() {
        formGeneral();
      });
    </script>
    <script src="../dist/assets/lib/screenfull/screenfull.js"></script>
    <script src="../dist/assets/js/main.min.js"></script>

    <script>
      $(function() {
        metisTable();
        metisSortable();
      });
    </script>
    
    <script src="../dist/assets/lib/wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
    <script src="../dist/assets/lib/bootstrap-wysihtml5-hack.js"></script>
    <script>
      $(function() {
        formWysiwyg();
      });
    </script>

    <!--For Demo Only. Not required -->
    <!-- <script type="text/javascript" src="assets/js/style-switcher.js"></script> -->
  </body>
</html>