<?php require('head.php'); hel('Data Siswa');
$action = isset($_GET['action']) ? $_GET['action'] : ''; 
switch($action){ default:
$query = mysqli_query($kon, "SELECT *,user.id AS idku FROM siswa JOIN user ON siswa.id = user.id JOIN kelas ON siswa.idKelas = kelas.idKelas JOIN guru ON guru.idGuru = kelas.idGuru ORDER BY idSiswa DESC"); ?>
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
                  <th>NIS</th>
                  <th>Nama</th>
                  <th>Kelas</th>
                  <th>Jurusan</th>
                  <th>Tahun Ke</th>
                  <th>Status</th>
                  <th class="knsdkvbgvr"></th>
                </tr>
              </thead>
              <tbody>
              <?php $no = 1;
                while($j = mysqli_fetch_array($query)){ ?>
                  <tr class="text-center">
                    <td><?= $no++ ?></td>
                    <td><?= $j['ni'] ?></td>           
                    <td><?= $j['nama'] ?></td>
                    <td><?= $j['kelasnya'] ?></td>
                    <td><?= $j['jurusan'] ?></td>         
                    <td><?= $j['tahun'] ?></td>         
                    <td><?= $j['status'] ?></td>     
                    <td><?php 
                        jump("?action=detail&idSiswa=$j[idSiswa]"); 
                        zeroOne("?action=ubah&idSiswa=$j[idSiswa]&id=$j[idku]"); 
                        zeroTwo("$j[idSiswa]","idSiswa=$j[idSiswa]");
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
<form action="action.php?tabel=siswa&action=tambah" method="POST">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
                <label>NIS</label>
                <input type="text" name="ni" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Tempat dan Tanggal Lahir</label>
                <div class="input-group input-group-mb">
                  <div class="input-group-prepend" style="width: 50%">
                      <input type="text" class="form-control" name="tempat_lahir" required>
                  </div>
                  <div class="input-group-prepend" style="width: 50%">
                      <input type="date" class="form-control" name="tanggal_lahir" value="<?= date('Y-m-d') ?>" required>
                  </div>
                </div>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin dan Agama</label>
                <div class="input-group input-group-mb">
                  <div class="input-group-prepend" style="width: 50%">
                      <select name="jk" class="form-control" required>
                        <option selected disabled>-</option>
                        <option value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                      </select>
                  </div>
                  <div class="input-group-prepend" style="width: 50%">
                      <input type="text" name="agama" list="option" class="form-control" required>
                      <datalist id="option">
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Kong Hu Chu">Kong Hu Chu</option>
                      </datalist>
                  </div>
                </div>
            </div>
            <div class="form-group">
                <label>Kelas</label>
                <select class="form-control" name="idKelas">
                    <option selected disabled>Pilih</option>
                    <?php $query = mysqli_query($kon, "SELECT * FROM kelas ORDER BY kelasnya ASC");
                    while ($j = mysqli_fetch_array($query)) { ?>
                        <option value="<?= $j['idKelas'] ?>"><?= $j['kelasnya'].' - '.$j['jurusan'].' ('.$j['tahun'].')' ?></option>
                    <?php } ?>
                </select>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Telp</label>
                <input type="tel" name="telp" value="08" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Nama, Agama dan Pekerjaan Ayah</label>
                <div class="input-group input-group-mb">
                  <div class="input-group-prepend" style="width: 50%">
                      <input type="text" class="form-control" name="namaAyah" required>
                      <input type="text" name="agamaAyah" list="option" class="form-control" required>
                      <datalist id="option">
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Kong Hu Chu">Kong Hu Chu</option>
                      </datalist>
                  </div>
                  <div class="input-group-prepend" style="width: 50%">
                      <input type="text" class="form-control" name="kerjaAyah" required>
                  </div>
                </div>
            </div>
            <div class="form-group">
                <label>Nama, Agama dan Pekerjaan Ibu</label>
                <div class="input-group input-group-mb">
                  <div class="input-group-prepend" style="width: 50%">
                      <input type="text" class="form-control" name="namaIbu" required>
                      <input type="text" name="agamaIbu" list="option" class="form-control" required>
                      <datalist id="option">
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Kong Hu Chu">Kong Hu Chu</option>
                      </datalist>
                  </div>
                  <div class="input-group-prepend" style="width: 50%">
                      <input type="text" class="form-control" name="kerjaIbu" required>
                  </div>
                </div>
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
$idSiswa = $_GET['idSiswa'];
$id      = $_GET['id'];
$query = mysqli_query($kon, "SELECT * FROM siswa JOIN user ON siswa.id = user.id JOIN kelas ON siswa.idKelas = kelas.idKelas JOIN guru ON guru.idGuru = kelas.idGuru WHERE idSiswa = '$idSiswa'");
$j = mysqli_fetch_array($query); ?>
<section class="content">
<form action="action.php?tabel=siswa&action=ubah&idSiswa=<?=$idSiswa?>&id=<?=$id?>" method="POST">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
                  <label>NIS</label>
                  <input type="text" name="ni" value="<?= $j['ni'] ?>" class="form-control">
              </div>
              <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama" value="<?= $j['nama'] ?>" class="form-control" required>
              </div>
              <div class="form-group">
                  <label>Tempat dan Tanggal Lahir</label>
                  <div class="input-group input-group-mb">
                    <div class="input-group-prepend" style="width: 50%">
                        <input type="text" class="form-control" name="tempat_lahir" value="<?= $j['tempat_lahir'] ?>" required>
                    </div>
                    <div class="input-group-prepend" style="width: 50%">
                        <input type="date" class="form-control" name="tanggal_lahir" value="<?= $j['tanggal_lahir'] ?>" required>
                    </div>
                  </div>
              </div>
              <div class="form-group">
                <label>Jenis Kelamin dan Agama</label>
                <div class="input-group input-group-mb">
                  <div class="input-group-prepend" style="width: 50%">
                      <select name="jk" class="form-control" required>
                        <option value="<?= $j['jk'] ?>"><?= $j['jk'] ?></option>
                        <option value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                      </select>
                  </div>
                  <div class="input-group-prepend" style="width: 50%">
                      <input type="text" name="agama" list="option" value="<?= $j['agama'] ?>" class="form-control" required>
                      <datalist id="option">
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Kong Hu Chu">Kong Hu Chu</option>
                      </datalist>
                  </div>
                </div>
            </div>
            <div class="form-group">
                <label>Kelas</label>
                <select class="form-control" name="idKelas">
                    <option value="<?= $j['idKelas'] ?>"><?= $j['kelasnya'].' - '.$j['jurusan'].' ('.$j['tahun'].')' ?></option>
                    <?php $query = mysqli_query($kon, "SELECT * FROM kelas ORDER BY kelasnya ASC");
                    while ($ju = mysqli_fetch_array($query)) { ?>
                        <option value="<?= $ju['idKelas'] ?>"><?= $ju['kelasnya'].' - '.$ju['jurusan'].' ('.$ju['tahun'].')' ?></option>
                    <?php } ?>
                </select>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" value="<?= $j['alamat'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Telp</label>
                <input type="tel" name="telp" value="<?= $j['telp'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Nama, Agama dan Pekerjaan Ayah</label>
                <div class="input-group input-group-mb">
                  <div class="input-group-prepend" style="width: 50%">
                      <input type="text" class="form-control" value="<?= $j['namaAyah'] ?>" name="namaAyah" required>
                      <input type="text" name="agamaAyah" value="<?= $j['agamaAyah'] ?>" list="option" class="form-control" required>
                      <datalist id="option">
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Kong Hu Chu">Kong Hu Chu</option>
                      </datalist>
                  </div>
                  <div class="input-group-prepend" style="width: 50%">
                      <input type="text" class="form-control" value="<?= $j['kerjaAyah'] ?>" name="kerjaAyah" required>
                  </div>
                </div>
            </div>
            <div class="form-group">
                <label>Nama, Agama dan Pekerjaan Ibu</label>
                <div class="input-group input-group-mb">
                  <div class="input-group-prepend" style="width: 50%">
                      <input type="text" class="form-control" name="namaIbu" value="<?= $j['namaIbu'] ?>" required>
                      <input type="text" name="agamaIbu" value="<?= $j['agamaIbu'] ?>" list="option" class="form-control" required>
                      <datalist id="option">
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Kong Hu Chu">Kong Hu Chu</option>
                      </datalist>
                  </div>
                  <div class="input-group-prepend" style="width: 50%">
                      <input type="text" class="form-control" value="<?= $j['kerjaIbu'] ?>" name="kerjaIbu" required>
                  </div>
                </div>
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control" required>
                  <option value="<?= $j['status'] ?>"><?= $j['status'] ?></option>
                  <option value="Aktif">Aktif</option>
                  <option value="Ditolak">Ditolak</option>
                  <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
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
case "detail":
$idSiswa = $_GET['idSiswa'];
$query = mysqli_query($kon, "SELECT * FROM siswa JOIN user ON siswa.id = user.id WHERE idSiswa = '$idSiswa'");
$j = mysqli_fetch_array($query); ?>
<section class="content">
 <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-success card-outline">
          <h3 class="card-header">Biodata Diri</h3>
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane active">
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Nama</label>
                  <div class="col-sm-8">
                    <input type="text"  value="<?= $j['nama'] ?>" class="form-control" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Agama</label>
                  <div class="col-sm-8">
                    <input type="text"  value="<?= $j['agama']; ?>" class="form-control" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Tanggal Daftar</label>
                  <div class="col-sm-8">
                    <input type="date"  value="<?= $j['tgldaftar']; ?>" class="form-control" readonly>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card card-success card-outline">
          <h3 class="card-header">Ayah</h3>
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane active">
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Nama</label>
                  <div class="col-sm-8">
                    <input type="text"  value="<?= $j['namaAyah'] ?>" class="form-control" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Agama</label>
                  <div class="col-sm-8">
                    <input type="text"  value="<?= $j['agamaAyah']; ?>" class="form-control" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Pekerjaan</label>
                  <div class="col-sm-8">
                    <input type="text"  value="<?= $j['kerjaAyah'] ?>" class="form-control" readonly>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card card-success card-outline">
          <h3 class="card-header">Ibu</h3>
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane active">
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Nama</label>
                  <div class="col-sm-8">
                    <input type="text"  value="<?= $j['namaIbu'] ?>" class="form-control" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Agama</label>
                  <div class="col-sm-8">
                    <input type="text"  value="<?= $j['agamaIbu']; ?>" class="form-control" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Pekerjaan</label>
                  <div class="col-sm-8">
                    <input type="text"  value="<?= $j['kerjaIbu'] ?>" class="form-control" readonly>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card card-success card-outline">
          <h3 class="card-header">Foto</h3>
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane active">
                <div class="form-group row">
                  <div class="col-sm-8">
                    <?= $j['foto'] != '' ? "<img src='../$j[foto]' width='100'>": 'Tidak ada'; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php akuSukaDia(); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php break; } require('foot.php'); ?>            