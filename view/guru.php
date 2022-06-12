<?php require('head.php'); hal('Data Guru');
$action = isset($_GET['action']) ? $_GET['action'] : ''; 
switch($action){ default:
$query = mysqli_query($kon, "SELECT * FROM guru JOIN user ON guru.id = user.id ORDER BY idGuru DESC"); ?>
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
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>Jabatan</th>
                  <th>Ijazah & Tahun</th>
                  <th>Golongan</th>
                  <th>Tipe</th>
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
                    <td><?= $j['jabatan'] ?></td>
                    <td><?= $j['idt'] ?></td>      
                    <td><?= $j['golongan'] ?></td>    
                    <td><?= $j['tipe'] ?></td>      
                    <td><?php 
                        jump("?action=detail&idGuru=$j[idGuru]"); 
                        zeroOne("?action=ubah&idGuru=$j[idGuru]&id=$j[id]"); 
                        zeroTwo("$j[idGuru]","idGuru=$j[idGuru]");
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
<form action="action.php?tabel=guru&action=tambah" method="POST">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
                <label>NIP</label>
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
                <label>Jabatan</label>
                <input type="text" name="jabatan" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Ijazah dan Tahun</label>
                <input type="text" name="idt" placeholder="Ex : S1 1990" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Golongan dan Jenis Kelamin</label>
                <div class="input-group input-group-mb">
                  <div class="input-group-prepend" style="width: 50%">
                      <input type="text" class="form-control" name="golongan" placeholder="Ex : III/b" required>
                  </div>
                  <div class="input-group-prepend" style="width: 50%">
                    <select name="jk" class="form-control" required>
                      <option selected disabled>-</option>
                      <option value="Pria">Pria</option>
                      <option value="Wanita">Wanita</option>
                    </select>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
                <label>Program Studi</label>
                <input type="text" name="prodi" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Agama</label>
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
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Telp</label>
                <input type="tel" name="telp" value="08" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Tipe</label>
                <select name="tipe" class="form-control" required>
                  <option selected disabled>-</option>
                  <option value="Tetap">Tetap</option>
                  <option value="Honorer">Honorer</option>
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
case "ubah":
$idGuru = $_GET['idGuru'];
$id     = $_GET['id'];
$query = mysqli_query($kon, "SELECT * FROM guru JOIN user ON guru.id = user.id WHERE idGuru = '$idGuru'");
$j = mysqli_fetch_array($query); ?>
<section class="content">
<form action="action.php?tabel=guru&action=ubah&idGuru=<?=$idGuru?>&id=<?=$id?>" method="POST">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
                  <label>NIP</label>
                  <input type="text" name="ni" value="<?= $j['ni'] ?>" class="form-control" required>
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
                  <label>Jabatan</label>
                  <input type="text" name="jabatan" class="form-control" value="<?= $j['jabatan'] ?>" required>
              </div>
              <div class="form-group">
                  <label>Ijazah dan Tahun</label>
                  <input type="text" name="idt" placeholder="Ex : S1 1990" value="<?= $j['idt'] ?>" class="form-control" required>
              </div>
              <div class="form-group">
                  <label>Golongan dan Jenis Kelamin</label>
                  <div class="input-group input-group-mb">
                    <div class="input-group-prepend" style="width: 50%">
                        <input type="text" class="form-control" name="golongan" placeholder="Ex : III/b" value="<?= $j['golongan'] ?>" required>
                    </div>
                    <div class="input-group-prepend" style="width: 50%">
                      <select name="jk" class="form-control" required>
                        <option value="<?= $j['jk'] ?>"><?= $j['jk'] ?></option>
                        <option value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                      </select>
                    </div>
                  </div>
              </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
                <label>Program Studi</label>
                <input type="text" name="prodi" value="<?= $j['prodi'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Agama</label>
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
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" value="<?= $j['alamat'] ?>" required>
            </div>
            <div class="form-group">
                <label>Telp</label>
                <input type="tel" name="telp" class="form-control" value="<?= $j['telp'] ?>" required>
            </div>
            <div class="form-group">
                <label>Tipe</label>
                <select name="tipe" class="form-control" required>
                  <option value="<?= $j['tipe'] ?>"><?= $j['tipe'] ?></option>
                  <option value="Tetap">Tetap</option>
                  <option value="Honorer">Honorer</option>
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
$idGuru = $_GET['idGuru'];
$query = mysqli_query($kon, "SELECT * FROM guru JOIN user ON guru.id = user.id  WHERE idGuru = '$idGuru'");
$j = mysqli_fetch_array($query); ?>
<section class="content">
 <div class="container-fluid">
    <div class="row">
      <div class="col-md-7">
        <div class="card card-success card-outline">
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
                  <label class="col-sm-4 col-form-label">Tempat, Tanggal Lahir</label>
                  <div class="col-sm-8">
                    <input type="text"  value="<?= $j['tempat_lahir'].', '.strftime("%d %B %Y", strtotime($j['tanggal_lahir'])); ?>" class="form-control" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                  <div class="col-sm-8">
                    <input type="text"  value="<?= $j['jk'] ?>" class="form-control" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Program Studi</label>
                  <div class="col-sm-8">
                    <input type="text"  value="<?= $j['prodi'] ?>" class="form-control" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Agama</label>
                  <div class="col-sm-8">
                    <input type="text"  value="<?= $j['agama'] ?>" class="form-control" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Alamat</label>
                  <div class="col-sm-8">
                    <textarea class="form-control" readonly><?= $j['alamat'] ?></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">No. Telepon</label>
                  <div class="col-sm-8">
                    <input type="text" value="<?= $j['telp'] ?>" class="form-control" readonly>
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