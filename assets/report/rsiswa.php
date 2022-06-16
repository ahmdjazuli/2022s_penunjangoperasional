<?php require('../../kon.php'); require('../../view/config.php');
$status     = $_REQUEST['status'];
$tahun      = $_REQUEST['tahun'];
if($status == 'hmm' AND $tahun) {
  $query = mysqli_query($kon, "SELECT *,user.id AS idku FROM siswa JOIN user ON siswa.id = user.id JOIN kelas ON siswa.idKelas = kelas.idKelas JOIN guru ON guru.idGuru = kelas.idGuru WHERE status = 'Aktif' OR status = 'Ditolak' AND YEAR(tgldaftar) = '$tahun' ORDER BY status DESC");
}else if($status != 'hmm' AND !(empty($status)) AND $tahun) {
  $query = mysqli_query($kon, "SELECT *,user.id AS idku FROM siswa JOIN user ON siswa.id = user.id JOIN kelas ON siswa.idKelas = kelas.idKelas JOIN guru ON guru.idGuru = kelas.idGuru WHERE status = '$status' AND YEAR(tgldaftar) = '$tahun' ORDER BY idku DESC");
}else if($status != 'hmm' AND empty($status) AND $tahun) {
  $query = mysqli_query($kon, "SELECT *,user.id AS idku FROM siswa JOIN user ON siswa.id = user.id JOIN kelas ON siswa.idKelas = kelas.idKelas JOIN guru ON guru.idGuru = kelas.idGuru WHERE YEAR(tgldaftar) = '$tahun' ORDER BY idku DESC");
}else{
  $query = mysqli_query($kon, "SELECT *,user.id AS idku FROM siswa JOIN user ON siswa.id = user.id JOIN kelas ON siswa.idKelas = kelas.idKelas JOIN guru ON guru.idGuru = kelas.idGuru ORDER BY idku DESC");
} beo(); ?>
<h3 class="text-center">Laporan Siswa</h3>
<p class="text-center"><?php 
if($status == 'hmm' AND $tahun) {
  echo 'Status : <b>Aktif</b> dan <b>Ditolak</b>, Tahun <b>'.$tahun.'</b>';
}else if($status != 'hmm' AND !(empty($status)) AND $tahun) {
  echo 'Status : <b>'.$status.'</b>, Tahun <b>'.$tahun.'</b>';
}else if($status != 'hmm' AND empty($status) AND $tahun) {
  echo 'Status : <b>Semua</b>, Tahun <b>'.$tahun.'</b>';
}
?></b></p>
<div class="container-fluid"><table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Jurusan</th>
        <th>Tahun Ke</th>
        <th>Tanggal Daftar</th>
        <th>Status</th>
      </tr>
    </thead>
    <?php $i = 1; while ($j = mysqli_fetch_array($query)) : ?>
    <tr class="text-center">
      <td><?= $i++ ?></td>
      <td><?= $j['ni'] ?></td>           
      <td><?= $j['nama'] ?></td>
      <td><?= $j['kelasnya'] ?></td>
      <td><?= $j['jurusan'] ?></td>         
      <td><?= $j['tahun'] ?></td>         
      <td><?= ht($j['tgldaftar']) ?></td>         
      <td><?= $j['status'] ?></td>
    </tr>
    <?php endwhile; ?>
</table></div>
<?php ttd() ?>