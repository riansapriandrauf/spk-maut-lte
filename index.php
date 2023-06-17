<?php
include 'functions.php';
if (empty($_SESSION['login']))
  header("location:login.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SPK MAUT</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="assets/adminlte/bower/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/adminlte/bower/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/adminlte/bower/datatables/css/dataTables.bootstrap.css">
  <link rel="stylesheet" href="assets/adminlte/bower/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/adminlte/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="assets/adminlte/dist/css/skins/_all-skins.min.css">
  <script src="assets/adminlte/bower/jquery/dist/jquery.min.js"></script>
  <style type="text/css">
    .form-horizontal .control-label {
      text-align: left;
    }
  </style>
</head>

<body class="hold-transition skin-red sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <a href="#" class="logo">
        <span class="logo-mini"><b>SPK</b></span>
        <span class="logo-lg"><b>MAUT</span>
      </a>
      <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="assets/adminlte/dist/img/avatar5.png" class="user-image" alt="User Image">
                <span class="hidden-xs"><b><?php if ($_SESSION['level'] == 1) {
                                              echo 'Admin';
                                            } else if ($_SESSION['level'] == 2) {
                                              echo 'Donatur';
                                            } ?></b></span>
              </a>
              <ul class="dropdown-menu">
                <li class="user-header">
                  <img src="assets/adminlte/dist/img/avatar5.png" class="img-circle" alt="User Image">

                  <p>
                    <?php if ($_SESSION['level'] == 1) {
                      echo 'Admin';
                    } else if ($_SESSION['level'] == 2) {
                      echo 'Donatur';
                    } ?>
                  </p>
                </li>
                <li class="user-footer">
                  <div class="pull-right">
                    <a href="aksi.php?act=logout" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
          </ul>
        </div>
      </nav>
    </header>
    <aside class="main-sidebar">
      <section class="sidebar">
        <div class="user-panel">
          <div class="pull-left image">
            <img src="assets/adminlte/dist/img/avatar5.png" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?= $_SESSION['admin'] ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">HEADER</li>
          <?php
          if ($_SESSION['level'] == 1) { ?>

            <li><a href="?m=donatur"><span class="glyphicon glyphicon-user"></span> Donatur</a></li>
            <li class="dropdown">
              <a href="?m=kriteria" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-th-large"></span> Kriteria <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="?m=kriteria"><span class="glyphicon glyphicon-th-large"></span> Kriteria</a></li>
                <li><a href="?m=crips"><span class="glyphicon glyphicon-star"></span> Nilai Crips</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="?m=alternatif" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Alternatif <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="?m=alternatif"><span class="glyphicon glyphicon-user"></span> Alternatif</a></li>
                <li><a href="?m=rel_alternatif"><span class="glyphicon glyphicon-user"></span> Nilai Alternatif</a></li>
              </ul>
            </li>
            <li><a href="?m=hitung"><span class="glyphicon glyphicon-calendar"></span> Perhitungan</a></li>
            <li><a href="?m=kuota"><span class="glyphicon glyphicon-calendar"></span> Kuota</a></li>
            <?php 
            }if($_SESSION['level'] == 1 || $_SESSION['level'] == 3){
            ?>
            <li class="dropdown">
              <a href="?m=kriteria" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-th-large"></span> Laporan <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="?m=laporan_kriteria"><span class="glyphicon glyphicon-th-large"></span> Laporan Kriteria</a></li>
                <li><a href="?m=laporan_alternatif"><span class="glyphicon glyphicon-star"></span> Laporan Alternatif</a></li>
                <li><a href="?m=laporan_hitung"><span class="glyphicon glyphicon-star"></span> Laporan Hasil Perhitungan</a></li>
                <li><a href="?m=dokumentasi"><span class="glyphicon glyphicon-star"></span> Dokumentasi</a></li>
              </ul>
            </li>
          <?php } else if ($_SESSION['level'] == 2) { ?>
            <li><a href="?m=dokumentasi"><span class="glyphicon glyphicon-lock"></span> Dokumentasi</a></li>
          <?php
          }
          ?>
          <li><a href="?m=password"><span class="glyphicon glyphicon-lock"></span> Password</a></li>
          <li><a href="aksi.php?act=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          <!-- <li><a href="?m=home"><i class="fa fa-home"></i><span>Dashboard</span></a></li>
          <li><a href="?m=client"><i class="fa fa-users"></i><span>Client</span></a></li>
          <li><a href="?m=jadwal"><i class="fa fa-calendar-check-o"></i><span>Schedule Setting</span></a></li>
          <li><a href="?m=jadwal_tampil"><i class="fa fa-calendar"></i><span>Client Schedule</span></a></li>
          <li><a href="?m=target_company"><i class="fa fa-building"></i><span>Company Target</span></a></li>
          <li><a href="?m=retail"><i class="fa fa-server"></i><span>Retail Target</span></a></li> -->
        </ul>
      </section>
    </aside>
    <div class="content-wrapper">
      <section class="content container-fluid">

        <?php
        if (file_exists($mod . '.php'))
          include $mod . '.php';
        else
          include 'home.php';
        ?>

      </section>
    </div>
    <footer class="main-footer">
      <strong>Copyright &copy; 2020 All rights reserved.
    </footer>
    <aside class="control-sidebar control-sidebar-dark">
      <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
      </ul>
    </aside>
    <div class="control-sidebar-bg"></div>
  </div>

  <script src="assets/adminlte/bower/bootstrap/dist/js/bootstrap.min.js"></script>

  <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="assets/adminlte/bower/datatables/js/jquery.dataTables.min.js"></script>
  <script src="assets/adminlte/bower/datatables/js/dataTables.bootstrap.js"></script>
  <script src="assets/adminlte/bower/chart.js/Chart.js"></script>
  <script src="assets/adminlte/bower/fastclick/lib/fastclick.js"></script>
  <script src="assets/adminlte/dist/js/adminlte.min.js"></script>
  <script src="assets/adminlte/dist/js/demo.js"></script>
  </strong>
</body>

</html>