<?php require('head.php'); require('kon.php'); require('view/config.php'); $idArtikel = $_GET['idArtikel'];
  $artikel = mysqli_query($kon, "SELECT * FROM artikel WHERE idArtikel='$idArtikel'");
  $j = mysqli_fetch_array($artikel);
  mysqli_query($kon, "UPDATE artikel SET view = view + 1 WHERE idArtikel='$idArtikel'");
?>
 <!-- Page breadcrumb -->
 <section id="mu-page-breadcrumb">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-page-breadcrumb-area">
           <h2><?= $j['judul'] ?></h2>
           <ol class="breadcrumb">
            <li><a href="./">Beranda</a></li>            
            <li class="active"><?= $j['judul'] ?></li>
          </ol>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- End breadcrumb -->
 <section id="mu-course-content">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">
              <div class="col-md-9">
                <!-- start course content container -->
                <div class="mu-course-container mu-blog-single">
                  <div class="row">
                    <div class="col-md-12">
                      <article class="mu-blog-single-item">
                        <figure class="mu-blog-single-img">
                          <a href="#"><img alt="img" src="<?= $j['thumb'] ?>"></a>
                          <figcaption class="mu-blog-caption">
                            <h4>Dipublikasikan pada : <a href="#" style="display: inline;">
                              <?= htw($j['waktu']); ?></a> WITA</h4>
                          </figcaption>                      
                        </figure>
                        <div class="mu-blog-description">
                          <?= $j['konten'] ?>
                        </div>
                        <figcaption class="mu-blog-caption">
                            <h4>Kategori : <a href="#"><?= $j['kategori'] ?></a></h4>
                          </figcaption>
                      </article>
                    </div>                                   
                  </div>
                </div>
<?php require('sidebar.php') ?>
<?php require('foot.php') ?>