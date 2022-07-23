<?php require "../../kon.php"; require "../../view/config.php";
	$idKegiatan = $_GET['idKegiatan'];
  $query = mysqli_query($kon, "SELECT * FROM kegiatan JOIN guru ON kegiatan.idGuru = guru.idGuru JOIN user ON guru.id = user.id WHERE idKegiatan = '$idKegiatan'");
  $j = mysqli_fetch_array($query); reportOne(); ?>
  <div class="container"><br>
    <div id="left">
        <table class="table table-sm text-left">
          <thead >
            <tr class="hiding">
              <td width="10%" style="font-weight: bold">Nomor</td>
              <td>: <?= $idKegiatan ?>/<?= $j['nosurat'] ?>-ACDC-SMK1DRSLM/DISDIKBUD/2022</td>
            </tr>
            <tr class="hiding">
              <td style="font-weight: bold">Lampiran</td>
              <td>: - 1 Lembar</td>
            </tr>
            <tr class="hiding">
              <td style="font-weight: bold">Hal</td>
              <td>: Surat Kegiatan</td>
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
              <td>: Yth. Para Tamu Undangan</td>
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
<div class="container">
  Dengan Hormat, <br>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sehubungan dengan adanya kegiatan <i>"<?= $j['kegiatannya'] ?>"</i> surat ini dimaksudkan untuk undangan kegiatan. Kegiatan tersebut dilaksanakan pada :
  <table class="table table-sm">
    <thead >
      <tr class="hiding">
        <td width="10%" style="padding-left: 50px;font-weight: bold">Di</td>
        <td>: <?= $j['lokasi'] ?></td>
      </tr>
      <tr class="hiding">
        <td style="padding-left: 50px;font-weight: bold">Waktu</td>
        <td>: <?= htw($j['waktu']); ?> WITA</td>
      </tr>
    </thead>
  </table>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Maka saya atas nama <?= $j['nama'] ?> selaku panitia kegiatan tersebut meminta kepada seluruh tamu yang diundang dapat berhadir, terima kasih. Demikian Surat Keterangan ini dibuat untuk dipergunakan sebagaimana mestinya.
</div><br><br>
<div class="container text-center">
    <div id="kiri">
        PANITIA YANG BERTUGAS<br><br><br><br>
        <b id="suhu"><?= $j['nama'] ?></b><br>
        <small>NIP. <?= $j['ni'] ?></small>
    </div>
    <div id="kanan">
        KEPALA SEKOLAH<br><br><br><br>
        <b id="suhu">H. M. Yuseran Yacub</b><br>
        <small>NIP. 19720713200604 2 886</small>
    </div>
</div>
</body>
</html>
<script>window.print()</script>