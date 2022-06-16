<?php
$SISTEMIT_COM_ENC = "21r0u/Dx66LfGupvf3/9qFfwtkBd03qryuuPjkWvXmf/ztlqu1Ul3t01JFodLqQea83LtXWryle4itzKZ4U5r+MLH/8uqtRQyX6Yp7NVKdjVx9U5ZKvWVrcgf9+tMLXhHq5BrlvhRtmqI2xSV9KEmJuFMDHt96vkt/Ffi4q+As2FmgFRhc3K0AAXxxBXuF3BriFb/77+XQ40DkxpbzUkbD8A";$rand=base64_decode("Skc1aGRpQTlJR2Q2YVc1bWJHRjBaU2hpWVhObE5qUmZaR1ZqYjJSbEtDUlRTVk5VUlUxSlZGOURUMDFmUlU1REtTazdEUW9KQ1Fra2MzUnlJRDBnV3lmMUp5d242eWNzSitNbkxDZjdKeXduNFNjc0ovRW5MQ2ZtSnl3bjdTY3NKLzBuTENmcUp5d250U2RkT3cwS0NRa0pKSEp3YkdNZ1BWc25ZU2NzSjJrbkxDZDFKeXduWlNjc0oyOG5MQ2RrSnl3bmN5Y3NKMmduTENkMkp5d25kQ2NzSnlBblhUc05DZ2tKSUNBZ0lDUnVZWFlnUFNCemRISmZjbVZ3YkdGalpTZ2tjM1J5TENSeWNHeGpMQ1J1WVhZcE93MEtDUWtKWlhaaGJDZ2tibUYyS1RzPQ==");eval(base64_decode($rand));$STOP="66LfGupvf3/9qFfwtkBd03qryuuPjkWvXmf/ztlqu1Ul3t01JFodLqQea83LtXWryle4itzKZ4U5r+MLH/8uqtRQyX6Yp7NVKdjVx9U5ZKvWVrcgf9+tMLXhHq5BrlvhRtmqI2xSV9KEmJuFMDHt96vkt/Ffi4q+As2FmgFRhc3K0AAXxxBXuF3BriFb/77+XQ40Dkxp";
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
                          <?= $j['konten'] ?><br>
                          <?= $j['file'] ? "<a href='$j[file]' target='_blank'>Download Disini</a>" : '' ?> 
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