<?php require('../../kon.php'); require('../../view/config.php');
$bulan     = $_REQUEST['bulan'];
$tahun     = $_REQUEST['tahun'];
if ($bulan AND $tahun) {
  $query = mysqli_query($kon, "SELECT * FROM surat_pindah JOIN siswa ON surat_pindah.idSiswa = siswa.idSiswa JOIN user ON siswa.id = user.id JOIN kelas ON kelas.idKelas = siswa.idKelas WHERE MONTH(tgl) = '$bulan' AND YEAR(tgl) = '$tahun' ORDER BY tgl DESC");
} beo(); ?>
<h3 class="text-center">Laporan Surat Pindah Sekolah</h3>
<p class="text-center">Periode bulan <b><?= bulan($bulan); ?></b> tahun <b><?= $tahun; ?></b></p>
<div class="container-fluid"><table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Nama Siswa</th>
        <th>Kelas</th>
        <th>No.Surat</th>
        <th>Sekolah Tujuan</th>
        <th>Alasan Pindah</th>
      </tr>
    </thead>
    <?php $i = 1; while ($j = mysqli_fetch_array($query)) : ?>
    <tr class="text-center">
      <td><?= $i++ ?></td>
      <td><?= ht($j['tgl']); ?></td>      
      <td><?= $j['nama'] ?></td>
      <td><?= $j['kelasnya'] ?></td>      
      <td><?= $j['nosurat'] ?></td>
      <td><?= $j['sekolahTujuan'] ?></td>           
      <td><?= $j['ket'] ?></td>   
    </tr>
    <?php endwhile; ?>
</table></div>
<?php ttd() ?>