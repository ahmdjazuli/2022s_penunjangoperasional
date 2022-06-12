<?php 
  require('../kon.php'); 
  require('config.php'); 
  session_start();
  $username   = $_SESSION['username'];
  $password   = $_SESSION['password'];
  $endorse    = mysqli_query($kon, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");
  $ayang      = mysqli_fetch_array($endorse);
  $_SESSION['id'] = $ayang['id'];
  $id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php title(); ?>
  <link rel="icon" type="image/png" href="../assets/img/logo.png"/>
  <link rel="stylesheet" href="../assets/css/googleFont.css">
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="../assets/css/adminlte.min.css">
  <link rel="stylesheet" href="../assets/plugins/sweetalert2/sweetalert2.min.css">
  <link rel="stylesheet" href="../assets/plugins/pace-progress/themes/green/pace-theme-flat-top.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/plugins/summernote/summernote-bs4.css">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      <li>
      <li class="nav-item">
        <a class="nav-link" href="index" data-toggle="tooltip" title="Home"><i class="fas fa-home"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="guru" data-toggle="tooltip" title="Guru"><i class="fas fa-user-tie"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="siswa" data-toggle="tooltip" title="Siswa"><i class="fas fa-user"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../out" role="button">
          <i class="fas fa-running"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-success elevation-4">
    <!-- Brand Logo -->
    <a href="./" class="brand-link">
      <img src="../assets/img/logo.png" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SMK DARUSSALAM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assets/img/user2-160x160.jpg" class="img-circle elevation-2">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $ayang['nama'] ?></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item"><a href="kelas" class="nav-link">
              <i class="nav-icon fas fa-hotel"></i><p>Kelas</p> 
          </a></li>
          <li class="nav-item"><a href="kegiatan" class="nav-link">
              <i class="nav-icon fas fa-person-booth"></i><p>Kegiatan</p> 
          </a></li>
          <li class="nav-item"><a href="artikel" class="nav-link">
              <i class="nav-icon fas fa-map"></i><p>Artikel</p> 
          </a></li>
          <li class="nav-item">
            <a href="ss" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i><p>
                Surat
                <i class="right fas fa-angle-left"></i>
              </p></a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="surat_panggilan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i><p>Pemanggilan Orang Tua</p>
              </a></li>
              <li class="nav-item"><a href="surat_pindah" class="nav-link">
                  <i class="far fa-circle nav-icon"></i><p>Pindah Sekolah</p>
              </a></li>
              <li class="nav-item"><a href="surat_thadir" class="nav-link">
                  <i class="far fa-circle nav-icon"></i><p>Izin Tidak Hadir (Guru)</p>
              </a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-id-card"></i><p>
                Alumnus
                <i class="right fas fa-angle-left"></i>
              </p></a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="alumnus" class="nav-link">
                  <i class="far fa-circle nav-icon"></i><p>Alumnus</p>
              </a></li>
              <li class="nav-item"><a href="alumni" class="nav-link">
                  <i class="far fa-circle nav-icon"></i><p>Detail Alumnus</p>
              </a></li>
            </ul>
          </li>
          <li class="nav-item"><a href="laporan" class="nav-link">
              <i class="nav-icon fas fa-print"></i><p>Laporan</p> 
          </a></li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>