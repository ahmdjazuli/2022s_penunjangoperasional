<?php require('../../kon.php'); require('../../view/config.php');
$kategori     = $_REQUEST['kategori'];
if ($kategori) {
  $query = mysqli_query($kon, "SELECT * FROM alumnus_detail JOIN alumnus ON alumnus_detail.idAlumnus = alumnus.idAlumnus WHERE kategori = '$kategori' ORDER BY nama ASC");
}else{
  $query = mysqli_query($kon, "SELECT * FROM alumnus_detail JOIN alumnus ON alumnus_detail.idAlumnus = alumnus.idAlumnus ORDER BY nama ASC");
} beo(); ?>
<h3 class="text-center">Laporan Detail Alumni</h3>
<p class="text-center">kategori : <b><?= empty($kategori) ? 'Semua' : $kategori; ?></b></p>
<div class="container-fluid"><table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Kategori</th>
        <th>Tahun Mulai Dari</th>
        <th>Sampai Dengan</th>
        <th>Keterangan</th>
      </tr>
    </thead>
    <?php $i = 1; while ($j = mysqli_fetch_array($query)) : ?>
    <tr class="text-center">
      <td><?= $i++ ?></td>
      <td><?= $j['nama'].'<br>('.$j['jabatan'].')' ?></td>
      <td><?= $j['kategori'] ?></td>
      <td><?= $j['tahun1'] ?></td>           
      <td><?= $j['tahun2'] ?></td>
      <td><?= $j['ket'] ?></td>
    </tr>
    <?php endwhile; ?>
</table></div>
<?php ttd() ?>