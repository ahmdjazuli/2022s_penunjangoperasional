<?php require('../../kon.php'); require('../../view/config.php');
$bulan     = $_REQUEST['bulan'];
$tahun     = $_REQUEST['tahun'];
if ($bulan AND $tahun) {
  $query = mysqli_query($kon, "SELECT * FROM kegiatan JOIN guru ON kegiatan.idGuru = guru.idGuru JOIN user ON guru.id = user.id WHERE MONTH(waktu) = '$bulan' AND YEAR(waktu) = '$tahun' ORDER BY idKegiatan DESC");
} beo(); ?>
<h3 class="text-center">Laporan Kegiatan</h3>
<p class="text-center">Periode bulan <b><?= bulan($bulan); ?></b> tahun <b><?= $tahun; ?></b></p>
<div class="container-fluid"><table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Waktu (WITA)</th>
        <th>Nama Kegiatan</th>
        <th>Lokasi</th>
        <th>No. Surat</th>
        <th>Nama Petugas</th>
        <th>Status</th>
      </tr>
    </thead>
    <?php $i = 1; while ($j = mysqli_fetch_array($query)) : ?>
    <tr class="text-center">
      <td><?= $i++ ?></td>
      <td><?= htw($j['waktu']) ?></td>      
      <td><?= $j['kegiatannya'] ?></td>
      <td><?= $j['lokasi'] ?></td>      
      <td><?= $j['nosurat'] ?></td>
      <td><?= $j['nama'] ?></td>           
      <td><?php if($j['status'] == 0){ echo 'Menunggu Persetujuan Kepsek';
      }else if($j['status'] == 1){ echo 'Ditolak, Data Tidak Lengkap'; 
      }else if($j['status'] == 2){ echo 'Diterima Kepsek'; 
      } ?></td>    
    </tr>
    <?php endwhile; ?>
</table></div>
<?php ttd() ?>