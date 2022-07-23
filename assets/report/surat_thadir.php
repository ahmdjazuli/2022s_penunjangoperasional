<?php require "../../kon.php"; require "../../view/config.php";
	$idSuratThadir = $_GET['idSuratThadir'];
  $query = mysqli_query($kon, "SELECT * FROM surat_thadir JOIN guru ON surat_thadir.idGuru = guru.idGuru JOIN user ON guru.id = user.id WHERE idSuratThadir = '$idSuratThadir'");
  $j = mysqli_fetch_array($query); reportOne(); ?>
  <div class="container"><br>
    <div id="left">
        <table class="table table-sm text-left">
          <thead >
            <tr class="hiding">
              <td width="10%" style="font-weight: bold">Nomor</td>
              <td>: <?= $idSuratThadir ?>-ACDC-SMK1DRSLM/DISDIKBUD/2022</td>
            </tr>
            <tr class="hiding">
              <td style="font-weight: bold">Lampiran</td>
              <td>: - 1 Lembar</td>
            </tr>
            <tr class="hiding">
              <td style="font-weight: bold">Hal</td>
              <td>: Surat Izin Tidak Hadir (Guru)</td>
            </tr>
          </thead>
        </table>
    </div>
    <div id="right">
        <table class="table table-sm text-left">
          <thead>
            <tr class="hiding">
              <td>Tanggal</td>
              <td>: Martapura, <?= ht(date('Y-m-d')) ?> </td>
            </tr>
            <tr class="hiding">
              <td>Kepada </td>
              <td>: Yth. Bapak Kepala Sekolah SMK Darrussalam Martapura</td>
            </tr>
             <tr class="hiding">
              <td>Di </td>
              <td>: - Tempat</td>
            </tr>
          </thead>
        </table>
    </div>
  </div>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container">
  Dengan Hormat, <br>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Saya yang bertanda tangan di bawah ini :
  <table class="table table-sm">
    <thead >
      <tr class="hiding">
        <td width="10%" style="padding-left: 50px;font-weight: bold">NIP</td>
        <td>: <?= $j['ni'] ?></td>
      </tr>
      <tr class="hiding">
        <td style="padding-left: 50px;font-weight: bold">Nama</td>
        <td>: <?= $j['nama'] ?></td>
      </tr>
      <tr class="hiding">
        <td style="padding-left: 50px;font-weight: bold">Jabatan</td>
        <td>: <?= $j['jabatan'] ?></td>
      </tr>
      <tr class="hiding">
        <td style="padding-left: 50px;font-weight: bold">Golongan</td>
        <td>: <?= $j['golongan'] ?></td>
      </tr>
    </thead>
  </table>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Surat ini ditujukan dikarenakan <i>"<?= $j['ket'] ?>"</i>.Demikian surat izin yang saya ajukan. Atas Perhatian dan diberikannya permohonan izin aya ini, saya mengucapkan banyak terima kasih.
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