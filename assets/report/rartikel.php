<?php require('../../kon.php'); require('../../view/config.php');
$bulan     = $_REQUEST['bulan'];
$tahun     = $_REQUEST['tahun'];
if ($bulan AND $tahun) {
  $query = mysqli_query($kon, "SELECT * FROM artikel JOIN user ON artikel.id = user.id WHERE MONTH(waktu) = '$bulan' AND YEAR(waktu) = '$tahun' ORDER BY idArtikel DESC");
} beo(); ?>
<h3 class="text-center">Laporan Artikel</h3>
<p class="text-center">Periode bulan <b><?= bulan($bulan); ?></b> tahun <b><?= $tahun; ?></b></p>
<div class="container-fluid"><table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Tanggal Publikasi (WITA)</th>
        <th>Judul</th>
        <th>Kategori</th>
        <th>Konten</th>
        <th>Penulis</th>
        <th>Thumbnail</th>
        <th>Jumlah Dilihat</th>
      </tr>
    </thead>
    <?php $i = 1; while ($j = mysqli_fetch_array($query)) : ?>
    <tr class="text-center">
      <td><?= $i++ ?></td>
      <td><?= htw($j['waktu']); ?></td>      
      <td><?= $j['judul'] ?></td>
      <td><?= $j['kategori'] ?></td>
      <td><?= substr(strip_tags($j['konten']),0,30).'...'; ?></td>      
      <td><?= $j['nama'].' - '.$j['level'] ?></td>           
      <td><a target="_blank" href="../../<?= $j['thumb'] ?>"><img src="../../<?= $j['thumb'] ?>" width='60px'></a></td>           
      <td><?= $j['view'] ?></td> 
    </tr>
    <?php endwhile; ?>
</table></div>
<?php ttd() ?>