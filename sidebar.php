<?php require('kon.php');
$kategori = mysqli_query($kon, "SELECT * FROM artikel GROUP BY kategori ORDER BY kategori ASC");
$populer = mysqli_query($kon, "SELECT * FROM artikel ORDER BY view DESC LIMIT 0,3");
?>
<div class="row">
  <div class="col-md-12">
  </div>
</div>
</div>
<div class="col-md-3">
<aside class="mu-sidebar">
  <div class="mu-single-sidebar">
    <h3>Kategori</h3>
    <ul class="mu-sidebar-catg">
      <?php 
        while($j = mysqli_fetch_array($kategori)){ ?>
          <li><a href="daftar-artikel?kategori=<?= $j['kategori'] ?>"><?= $j['kategori'] ?></a></li>
        <?php }
      ?>
    </ul>
  </div>
  <div class="mu-single-sidebar">
    <h3>Paling Banyak Dilihat</h3>
    <div class="mu-sidebar-popular-courses">
      <?php 
        while($ju = mysqli_fetch_array($populer)){ ?>
          <div class="media">
            <div class="media-left">
              <a href="post?idArtikel=<?= $ju['idArtikel'] ?>"><img class="media-object" style="object-fit: cover;" src="<?= $ju['thumb'] ?>"></a>
            </div>
            <div class="media-body">
              <h4 class="media-heading"><a href="post?idArtikel=<?= $ju['idArtikel'] ?>"><?= substr(strip_tags($ju['judul']),0,50).'...';  ?></a></h4>                      
            </div>
          </div>
        <?php }
      ?>
    </div>
  </div>
</aside>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>