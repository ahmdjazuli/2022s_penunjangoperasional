<?php require('../../kon.php'); require('../../view/config.php');
$jurusan     = $_REQUEST['jurusan'];
if ($jurusan) {
  $query = mysqli_query($kon, "SELECT * FROM kelas JOIN guru ON kelas.idGuru = guru.idGuru JOIN user ON guru.id = user.id WHERE jurusan = '$jurusan' ORDER BY idKelas DESC");
}else{
  $query = mysqli_query($kon, "SELECT * FROM kelas JOIN guru ON kelas.idGuru = guru.idGuru JOIN user ON guru.id = user.id ORDER BY idKelas DESC");
} beo(); ?>
<h3 class="text-center">Laporan Kelas</h3>
<p class="text-center">Jurusan : <b><?= empty($jurusan) ? 'Semua' : $jurusan; ?></b></p>
<div class="container-fluid"><table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Kelas</th>
        <th>Jurusan</th>
        <th>Tahun Ke</th>
        <th>Nama Wali Kelas</th>
      </tr>
    </thead>
    <?php $i = 1; while ($j = mysqli_fetch_array($query)) : ?>
    <tr class="text-center">
      <td><?= $i++ ?></td>
      <td><?= $j['kelasnya'] ?></td>
      <td><?= $j['jurusan'] ?></td>
      <td><?= $j['tahun'] ?></td>      
      <td><?= $j['nama'].' - '.$j['ni'] ?></td>     
    </tr>
    <?php endwhile; ?>
</table></div>
<?php ttd() ?>