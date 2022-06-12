<?php require('../../kon.php'); require('../../view/config.php');
$bulan     = $_REQUEST['bulan'];
$tahun     = $_REQUEST['tahun'];
if ($bulan AND $tahun) {
  $query = mysqli_query($kon, "SELECT * FROM surat_panggilan JOIN siswa ON surat_panggilan.idSiswa = siswa.idSiswa JOIN user ON siswa.id = user.id JOIN kelas ON kelas.idKelas = siswa.idKelas WHERE MONTH(waktu) = '$bulan' AND YEAR(waktu) = '$tahun' ORDER BY waktu DESC");
} beo(); ?>
<h3 class="text-center">Laporan Surat Pemanggilan Orang Tua</h3>
<p class="text-center">Periode bulan <b><?= bulan($bulan); ?></b> tahun <b><?= $tahun; ?></b></p>
<div class="container-fluid"><table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Waktu Pemanggilan (WITA)</th>
        <th>Nama Siswa</th>
        <th>Kelas</th>
        <th>Tempat Pertemuan</th>
        <th>Keterangan</th>
        <th>No.Surat</th>
      </tr>
    </thead>
    <?php $i = 1; while ($j = mysqli_fetch_array($query)) : ?>
    <tr class="text-center">
      <td><?= $i++ ?></td>
      <td><?= htw($j['waktu']); ?></td>      
      <td><?= $j['nama'] ?></td>
      <td><?= $j['kelasnya'] ?></td>      
      <td><?= $j['tempat'] ?></td>           
      <td><?= $j['ket'] ?></td>           
      <td><?= $j['nosurat'] ?></td>
    </tr>
    <?php endwhile; ?>
</table></div>
<?php ttd() ?>