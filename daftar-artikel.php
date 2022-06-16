<?php require('head.php'); error_reporting(0);
$kategori = $_REQUEST['kategori'];
if(isset($kategori)){
  $artikel = mysqli_query($kon, "SELECT * FROM artikel WHERE kategori = '$kategori' ORDER BY waktu DESC");
}else{
  $artikel = mysqli_query($kon, "SELECT * FROM artikel ORDER BY waktu DESC");
}
?>
 <section id="mu-page-breadcrumb">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-page-breadcrumb-area">
           <h2>Daftar Artikel</h2>
           <ol class="breadcrumb">
            <li><a href="./">Beranda</a></li>            
            <li class="active">Daftar Artikel</li>
          </ol>
         </div>
       </div>
     </div>
   </div>
 </section>
 <section id="mu-course-content">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">
              <div class="col-md-9">
                <div class="mu-course-container">
                  <div class="row">
<?php 
  while($j = mysqli_fetch_array($artikel)){ ?>
  <div class="col-md-6 col-sm-6">
    <div class="mu-latest-course-single">
      <figure class="mu-latest-course-img">
        <a href="<?= $j['thumb'] ?>"><img src="<?= $j['thumb'] ?>" style="object-fit: cover; width: 407px; height: 271px;"></a>
        <figcaption class="mu-latest-course-imgcaption">
          <a href="#"><?= $j['kategori'] ?></a>
          <span><i class="fa fa-clock-o"></i><?= htw($j['waktu']); ?></span>
        </figcaption>
      </figure>
      <div class="mu-latest-course-single-content">
        <h4><a href="#"><?= substr(strip_tags($j['judul']),0,60).'...'; ?></a></h4>
        <p><?= substr(strip_tags($j['konten']),0,40).'...'; ?></p>
        <div class="mu-latest-course-single-contbottom">
          <a class="mu-course-details" href="post?idArtikel=<?= $j['idArtikel'] ?>">Baca Selengkapnya</a>
        </div>
      </div>
    </div> 
  </div>
<?php } ?>
    </div>
  </div>
</div>
<div class="col-md-3">
<?php require('sidebar.php') ?>
<?php require('foot.php') ?>