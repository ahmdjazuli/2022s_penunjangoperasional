<?php require('head.php'); hal('Surat Keterangan Pindah Sekolah');
$action = isset($_GET['action']) ? $_GET['action'] : ''; 
switch($action){ default:
$query = mysqli_query($kon, "SELECT * FROM surat_pindah JOIN siswa ON surat_pindah.idSiswa = siswa.idSiswa JOIN user ON siswa.id = user.id JOIN kelas ON kelas.idKelas = siswa.idKelas ORDER BY tgl DESC"); ?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
          <form name="table" method="POST">
            <table id="table" class="table table-bordered table-hover">
              <thead class="bg-black">
                <tr class="text-center">
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Nama Siswa</th>
                  <th>Kelas</th>
                  <th>No.Surat</th>
                  <th>Sekolah Tujuan</th>
                  <th>Alasan Pindah</th>
                  <th class="knsdkvbgvr"></th>
                </tr>
              </thead>
              <tbody>
              <?php $no = 1;
                while($j = mysqli_fetch_array($query)){ ?>
                  <tr class="text-center">
                    <td><?= $no++ ?></td>
                    <td><?= ht($j['tgl']); ?></td>      
                    <td><?= $j['nama'] ?></td>
                    <td><?= $j['kelasnya'] ?></td>      
                    <td><?= $j['nosurat'] ?></td>
                    <td><?= $j['sekolahTujuan'] ?></td>           
                    <td><?= $j['ket'] ?></td>           
                    <td><?php 
                        kick("surat_pindah","idSuratPindah=$j[idSuratPindah]");
                        zeroOne("?action=ubah&idSuratPindah=$j[idSuratPindah]"); 
                        zeroTwo("$j[idSuratPindah]","idSuratPindah=$j[idSuratPindah]");
                    ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php break;
case "tambah": ?>
<section class="content">
<form action="action.php?tabel=surat_pindah&action=tambah" method="POST">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tgl" value="<?= date('Y-m-d') ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Nama Siswa</label>
                <input type="text" name="idSiswa" list="option" class="form-control" required>
                <datalist id="option">
                  <?php $query = mysqli_query($kon, "SELECT * FROM siswa JOIN user ON siswa.id = user.id ORDER BY nama ASC");
                    while ($j = mysqli_fetch_array($query)) { ?>
                        <option value="<?= $j['idSiswa'] ?>"><?= $j['nama'].' ('.$j['ni'].')' ?></option>
                    <?php } ?>
                </datalist>
            </div>
            <div class="form-group">
                <label>No.Surat</label>
                <input type="text" name="nosurat" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Sekolah Tujuan</label>
                <input type="text" name="sekolahTujuan" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Alasan Pindah</label>
                <input type="text" name="ket" class="form-control" required>
            </div>
          </div>
          <?php akuSukaDia(); ?>
        </div>
      </div>
    </div>
  </div>
</form>
</section>
<?php break;
case "ubah":
$idSuratPindah = $_GET['idSuratPindah'];
$query = mysqli_query($kon, "SELECT * FROM surat_pindah JOIN siswa ON surat_pindah.idSiswa = siswa.idSiswa JOIN user ON siswa.id = user.id WHERE idSuratPindah = '$idSuratPindah'");
$j = mysqli_fetch_array($query); ?>
<section class="content">
<form action="action.php?tabel=surat_pindah&action=ubah&idSuratPindah=<?=$idSuratPindah?>" method="POST">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tgl" value="<?= $j['tgl'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Nama Siswa</label>
                <input type="text" value="<?= $j['nama'] ?>" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>No.Surat</label>
                <input type="text" name="nosurat" value="<?= $j['nosurat'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Sekolah Tujuan</label>
                <input type="text" name="sekolahTujuan" value="<?= $j['sekolahTujuan'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Alasan Pindah</label>
                <input type="text" name="ket" value="<?= $j['ket'] ?>" class="form-control" required>
            </div>
          </div>
          <?php akuSukaDia(); ?>
        </div>
      </div>
    </div>
  </div>
</form>
</section>
<?php break; } require('foot.php'); ?>