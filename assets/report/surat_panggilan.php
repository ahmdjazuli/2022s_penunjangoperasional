<?php require "../../kon.php"; require "../../view/config.php";
	$idSuratPanggilan = $_GET['idSuratPanggilan'];
  $query = mysqli_query($kon, "SELECT * FROM surat_panggilan JOIN siswa ON surat_panggilan.idSiswa = siswa.idSiswa JOIN user ON siswa.id = user.id JOIN kelas ON kelas.idKelas = siswa.idKelas WHERE idSuratPanggilan = '$idSuratPanggilan'");
  $j = mysqli_fetch_array($query); reportOne(); ?>
  <div class="container"><br>
    <div id="left">
        <table class="table table-sm text-left">
          <thead >
            <tr class="hiding">
              <td width="10%" style="font-weight: bold">Nomor</td>
              <td>: <?= $idSuratPanggilan ?>/<?= $j['nosurat'] ?>-ACDC-SMK1DRSLM/DISDIKBUD/2022</td>
            </tr>
            <tr class="hiding">
              <td style="font-weight: bold">Lampiran</td>
              <td>: - 1 Lembar</td>
            </tr>
            <tr class="hiding">
              <td style="font-weight: bold">Hal</td>
              <td>: Surat Pemanggilan Orang Tua</td>
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
              <td>: Yth. Bapak /Ibu Wali murid dari <b><?= $j['nama'] ?></b> kelas <?= $j['kelasnya'] ?> jurusan <?= $j['jurusan'] ?></td>
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
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sehubungan dengan adanya permasalahan yang harus diselesaikan bersama, maka dengan ini kami mengharapkan kehadiran Bapak/Ibu Wali siswa/i pada :
  <table class="table table-sm">
    <thead >
      <tr class="hiding">
        <td width="10%" style="padding-left: 50px;font-weight: bold">Di</td>
        <td>: <?= $j['tempat'] ?></td>
      </tr>
      <tr class="hiding">
        <td style="padding-left: 50px;font-weight: bold">Waktu</td>
        <td>: <?= htw($j['waktu']); ?> WITA</td>
      </tr>
    </thead>
  </table>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mengingat pentingnya hal tersebut maka kami mengharapkan Bapak/Ibu Wali untuk bisa datang tepat pada waktu yang telah di tentukan.
  <br>Demikian surat panggilan ini kami sampaikan, atas perhatian Bapak/Ibu Kami ucapkan terima kasih.
</div><br><br>
<div class="container text-center">
    <div id="kiri">
        STAFF TU<br><br><br><br>
        <b id="suhu">Coki Pardede</b><br>
        <small>NIP. 19801824210413 7 714</small>
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