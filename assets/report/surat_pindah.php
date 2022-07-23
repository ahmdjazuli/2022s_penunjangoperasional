<?php require "../../kon.php"; require "../../view/config.php";
	$idSuratPindah = $_GET['idSuratPindah'];
  $query = mysqli_query($kon, "SELECT * FROM surat_pindah JOIN siswa ON surat_pindah.idSiswa = siswa.idSiswa JOIN user ON siswa.id = user.id JOIN kelas ON kelas.idKelas = siswa.idKelas WHERE idSuratPindah = '$idSuratPindah'");
  $j = mysqli_fetch_array($query); reportOne(); ?>
  <div class="container"><br>
    <h3 class="text-center">SURAT KETERANGAN PINDAH SEKOLAH</h3>
    <h5 class="text-center"><?= $idSuratPindah ?>/<?= $j['nosurat'] ?>-ACDC-SMK1DRSLM/DISDIKBUD/2022</h5>
  </div>
<br>
<br>
<div class="container">
  Yang bertanda tangan di bawah ini, Kepala SMK Darrusalam Martapura, menerangkan bahwa :
  <table class="table table-sm">
    <thead >
      <tr class="hiding">
        <td style="padding-left: 50px;font-weight: bold">NIS</td>
        <td>: <?= $j['ni'] ?></td>
      </tr>
      <tr class="hiding">
        <td width="20%" style="padding-left: 50px;font-weight: bold">Nama</td>
        <td>: <?= $j['nama'] ?></td>
      </tr>
      <tr class="hiding">
        <td style="padding-left: 50px;font-weight: bold">Kelas</td>
        <td>: <?= $j['kelasnya'] ?></td>
      </tr>
      <tr class="hiding">
        <td style="padding-left: 50px;font-weight: bold">Jenis Kelamin</td>
        <td>: <?= $j['jk'] ?></td>
      </tr>
      <tr class="hiding">
        <td style="padding-left: 50px;font-weight: bold">TTL</td>
        <td>: <?= $j['tempat_lahir'].', '.ht($j['tanggal_lahir']) ?></td>
      </tr>
    </thead>
  </table>Demikian surat keterangan pindah sekolah ini kami sampaikan, atas perhatian Bapak/Ibu Kami ucapkan terima kasih.
</div><br><br>
<div class="container text-center">
    <div id="kanan">
        KEPALA SEKOLAH<br><br><br><br>
        <b id="suhu">H. M. Yuseran Yacub</b><br>
        <small>NIP. 19720713200604 2 886</small>
    </div>
</div>
</body>
</html>
<script>window.print()</script>