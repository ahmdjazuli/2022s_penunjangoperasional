<?php 
  require('kon.php'); 
  require('view/config.php'); 
  session_start(); error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>SMK DARUSSALAM MARTAPURA</title>
    <link rel="icon" type="image/png" href="assets/img/logo.png"/>
    <link rel="stylesheet" href="assets/css/font-awesome.css">
    <link href="assets/css/bootstrap.css" rel="stylesheet">   
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css">          
    <link rel="stylesheet" href="assets/css/jquery.fancybox.css" type="text/css" media="screen" /> 
    <link id="switcher" href="assets/css/theme-color/default-theme.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">    
    <link rel="stylesheet" href="assets/css/googleFont.css">
  </head>
  <body> 
    <a class="scrollToTop" href="#">
      <i class="fa fa-angle-up"></i>      
    </a>
  <!-- Start header  -->
  <header id="mu-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="mu-header-area">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="mu-header-top-left">
                  <div class="mu-top-email">
                    Informasi & Pertanyaan?&nbsp;&nbsp;
                    <i class="fa fa-envelope"></i><span>stm_mtp@yahoo.com</span>
                  </div>
                  <div class="mu-top-phone">
                    <i class="fa fa-phone"></i><span>0511-4720-057</span>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="mu-header-top-right">
                  <nav>
                    <ul class="mu-top-social-nav">
                      <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                      <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                      <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                      <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                      <li><a href="#"><span class="fa fa-youtube"></span></a></li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- End header  -->
  <!-- Start menu -->
  <section id="mu-menu">
    <nav class="navbar navbar-default" role="navigation">  
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index"><img src="assets/img/logo.png" style="display: inline;" width="50px"><span>SMK DARUSSALAM MTP</span></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
          <?php 
            if($_SESSION['level'] == 'Siswa'){?>
            <li class="active"><a href="index">Beranda</a></li>
            <li><a href="jurusan">Jurusan</a></li>
            <li><a href="fasilitas">Fasilitas</a></li>
            <li><a href="daftar-artikel">Daftar Artikel</a></li>
            <li><a href="profil?id=<?= $_SESSION['id'] ?>">Profil Akun</a></li>
            <li><a href="out">Keluar</a></li>          
          <?php  }else{ ?>
            <li class="active"><a href="index">Beranda</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Profil <span class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="sambutan-kepala-sekolah">Sambutan Kepala Sekolah</a></li>                
                <li><a href="visi-misi">Visi dan Misi</a></li>                
                <li><a href="contact">Kontak</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">PPDB <span class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="ppdb">Formulir PPDB</a></li>                
                <li><a href="daftar-artikel?kategori=Pengumuman">Pengumuman PPDB</a></li>
              </ul>
            </li>           
            <li><a href="jurusan">Jurusan</a></li>
            <li><a href="fasilitas">Fasilitas</a></li>
            <li><a href="daftar-artikel">Daftar Artikel</a></li>
            <li><a data-toggle="modal" data-target="#modalku" id="mu-search-icon"><i class="fa fa-sign-in"></i></a></li>
          <?php } ?>
          </ul>                     
        </div><!--/.nav-collapse -->        
      </div>     
    </nav>
  </section>
  <!-- End menu -->
<div class="modal fade" id="modalku">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" style="display: inline;">Ingin Masuk?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="cek-login.php" method="post" >
        <div class="input-group input-group-md" style="margin-bottom: 10px; width: 100%;">
          <div class="input-group-prepend">
              <span class="input-group-text" style="width: 100%">Username</span>
          </div>
          <input type="text" name="username" required class="form-control">
        </div>
        <div class="input-group input-group-md" style="margin-bottom: 10px; width: 100%;">
          <div class="input-group-prepend">
              <span class="input-group-text" style="width: 100%">Password</span>
          </div>
          <input type="password" name="password" required class="form-control">
        </div>
      </div>
      <div style="margin-bottom: 10px; margin-left: 10px">
        <button type="reset" class="btn bg-dark text-white">Reset</button>
        <button type="submit" class="btn text-white float-right mr-3" style="background-color: #83c326">Masuk</button>
      </div>
      </form>
    </div>
  </div>
</div>
