<?php require('head.php'); hal('Surat Pemanggilan Orang Tua');
$action = isset($_GET['action']) ? $_GET['action'] : ''; 
switch($action){ default:
$query = mysqli_query($kon, "SELECT * FROM surat_panggilan JOIN siswa ON surat_panggilan.idSiswa = siswa.idSiswa JOIN user ON siswa.id = user.id JOIN kelas ON kelas.idKelas = siswa.idKelas ORDER BY waktu DESC"); ?>
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
                  <th>Waktu Pemanggilan (WITA)</th>
                  <th>Nama Siswa</th>
                  <th>Kelas</th>
                  <th>Tempat Pertemuan</th>
                  <th>Keterangan</th>
                  <th>No.Surat</th>
                  <th class="knsdkvbgvr"></th>
                </tr>
              </thead>
              <tbody>
              <?php $no = 1;
                while($j = mysqli_fetch_array($query)){ ?>
                  <tr class="text-center">
                    <td><?= $no++ ?></td>
                    <td><?= htw($j['waktu']); ?></td>      
                    <td><?= $j['nama'] ?></td>
                    <td><?= $j['kelasnya'] ?></td>      
                    <td><?= $j['tempat'] ?></td>           
                    <td><?= $j['ket'] ?></td>           
                    <td><?= $j['nosurat'] ?></td>
                    <td><?php 
                        kick("surat_panggilan","idSuratPanggilan=$j[idSuratPanggilan]");
                        zeroOne("?action=ubah&idSuratPanggilan=$j[idSuratPanggilan]"); 
                        zeroTwo("$j[idSuratPanggilan]","idSuratPanggilan=$j[idSuratPanggilan]");
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
<form action="action.php?tabel=surat_panggilan&action=tambah" method="POST">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
                <label>Waktu</label>
                <input type="datetime-local" name="waktu" value="<?= date('Y-m-d\TH:i') ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Nama Siswa</label>
                <input type="text" name="idSiswa" list="option" class="form-control" required>
                <datalist id="option">
                  <?php $query = mysqli_query($kon, "SELECT * FROM siswa JOIN user ON siswa.id = user.id WHERE status = 'Aktif' ORDER BY nama ASC");
                    while ($j = mysqli_fetch_array($query)) { ?>
                        <option value="<?= $j['idSiswa'] ?>"><?= $j['nama'].' ('.$j['ni'].')' ?></option>
                    <?php } ?>
                </datalist>
            </div>
            <div class="form-group">
                <label>Tempat Pertemuan</label>
                <input type="text" name="tempat" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" name="ket" class="form-control" required>
            </div>
            <div class="form-group">
                <label>No.Surat</label>
                <input type="text" name="nosurat" class="form-control" required>
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
$idSuratPanggilan = $_GET['idSuratPanggilan'];
$query = mysqli_query($kon, "SELECT * FROM surat_panggilan JOIN siswa ON surat_panggilan.idSiswa = siswa.idSiswa JOIN user ON siswa.id = user.id WHERE idSuratPanggilan = '$idSuratPanggilan'");
$j = mysqli_fetch_array($query); ?>
<section class="content">
<form action="action.php?tabel=surat_panggilan&action=ubah&idSuratPanggilan=<?=$idSuratPanggilan?>" method="POST">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
                <label>Waktu</label>
                <input type="datetime-local" name="waktu" value="<?= date('Y-m-d\TH:i',strtotime($j['waktu'])) ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Nama Siswa</label>
                <input type="text" value="<?= $j['nama'] ?>" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>Tempat Pertemuan</label>
                <input type="text" name="tempat" value="<?= $j['tempat'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" name="ket" value="<?= $j['ket'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label>No.Surat</label>
                <input type="text" name="nosurat" value="<?= $j['nosurat'] ?>" class="form-control" required>
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