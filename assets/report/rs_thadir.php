<?php require('../../kon.php'); require('../../view/config.php');
$bulan     = $_REQUEST['bulan'];
$tahun     = $_REQUEST['tahun'];
if ($bulan AND $tahun) {
  $query = mysqli_query($kon, "SELECT * FROM surat_thadir JOIN guru ON surat_thadir.idGuru = guru.idGuru JOIN user ON guru.id = user.id WHERE MONTH(tgl) = '$bulan' AND YEAR(tgl) = '$tahun' ORDER BY tgl DESC");
} beo(); ?>
<h3 class="text-center">Laporan Surat Izin Tidak Hadir (Guru)</h3>
<p class="text-center">Periode bulan <b><?= bulan($bulan); ?></b> tahun <b><?= $tahun; ?></b></p>
<div class="container-fluid"><table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>NIP</th>
        <th>Nama Guru</th>
        <th>Keterangan</th>
        <th>Status</th>
      </tr>
    </thead>
    <?php $i = 1; while ($j = mysqli_fetch_array($query)) : ?>
    <tr class="text-center">
      <td><?= $i++ ?></td>
      <td><?= ht($j['tgl']); ?></td>      
      <td><?= $j['ni'] ?></td>      
      <td><?= $j['nama'] ?></td>
      <td><?= $j['ket'] ?></td>
      <td><?= $j['status'] ?></td>  
    </tr>
    <?php endwhile; ?>
</table></div>
<?php ttd() ?>