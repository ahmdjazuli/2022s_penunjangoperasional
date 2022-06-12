<?php require('head.php'); hal('Alumnus'); error_reporting(0);
$action = isset($_GET['action']) ? $_GET['action'] : ''; 
switch($action){ default:
$query = mysqli_query($kon, "SELECT * FROM alumnus ORDER BY idAlumnus DESC");
$idAlumnus = $_GET['idAlumnus'];
$alumnus_detail = mysqli_query($kon, "SELECT * FROM alumnus_detail WHERE idAlumnus = '$idAlumnus' ORDER BY kategori ASC");
$alumnus = mysqli_query($kon, "SELECT * FROM alumnus WHERE idAlumnus = '$idAlumnus'");
$jul = mysqli_fetch_array($alumnus); ?>
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
                  <th>Nama</th>
                  <th>TTL</th>
                  <th>Jabatan</th>
                  <th>Status Pekerjaan</th>
                  <th>Alamat Pekerjaan</th>
                  <th>Email</th>
                  <th>Sosial Media</th>
                  <th class="knsdkvbgvr"></th>
                </tr>
              </thead>
              <tbody>
              <?php $no = 1;
                while($j = mysqli_fetch_array($query)){ ?>
                  <tr class="text-center">
                    <td><?= $no++ ?></td>
                    <td><?= $j['nama'] ?></td>
                    <td><?= $j['ttl1'].', '.$j['ttl2'] ?></td>           
                    <td><?= $j['jabatan'] ?></td>
                    <td><?= $j['statusPekerjaan'] ?></td>      
                    <td><?= substr(strip_tags($j['alamat']),0,15).'...'; ?></td>     
                    <td><?= substr(strip_tags($j['email']),0,15).'...'; ?></td>    
                    <td><?= substr(strip_tags($j['sosmed']),0,15).'...'; ?></td>    
                    <td><?php 
                        jump("alumnus?idAlumnus=$j[idAlumnus]");
                        zeroOne("?action=ubah&idAlumnus=$j[idAlumnus]"); 
                        zeroTwo("$j[idAlumnus]","idAlumnus=$j[idAlumnus]");
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
<?php 
if(mysqli_num_rows($alumnus_detail)> 0){ ?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3>Detail dari : <?= $jul['nama'] ?></h3>
          </div>
          <div class="card-body">
          <form name="table" method="POST">
            <table id="table" class="table table-bordered table-hover">
              <thead class="bg-black">
                <tr class="text-center">
                  <th>No</th>
                  <th>Kategori</th>
                  <th>Tahun Mulai Dari</th>
                  <th>Sampai Dengan</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>
              <?php $no = 1;
                while($ju = mysqli_fetch_array($alumnus_detail)){ ?>
                  <tr class="text-center">
                    <td><?= $no++ ?></td>
                    <td><?= $ju['kategori'] ?></td>
                    <td><?= $ju['tahun1'] ?></td>           
                    <td><?= $ju['tahun2'] ?></td>
                    <td><?= $ju['ket'] ?></td>
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
<?php } ?>
<?php break;
case "tambah": ?>
<section class="content">
<form action="action.php?tabel=alumnus&action=tambah" method="POST">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Tempat dan Tanggal Lahir</label>
                <div class="input-group input-group-mb">
                  <div class="input-group-prepend" style="width: 50%">
                      <input type="text" class="form-control" name="ttl1" required>
                  </div>
                  <div class="input-group-prepend" style="width: 50%">
                      <input type="date" class="form-control" name="ttl2" value="<?= date('Y-m-d') ?>" required>
                  </div>
                </div>
            </div>
            <div class="form-group">
                <label>Jabatan</label>
                <input type="text" name="jabatan" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Status Pekerjaan</label>
                <select name="statusPekerjaan" class="form-control" required>
                  <option value="-">-</option>
                  <option value="Tetap">Tetap</option>
                  <option value="Honorer">Honorer</option>
                </select>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
                <label>Alamat Pekerjaan</label>
                <input type="text" name="alamat" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Email yang Aktif" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Social Media</label>
                <input type="text" name="sosmed" placeholder="Cantumkan Social Media yang sering digunakan" class="form-control" required>
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
$idAlumnus = $_GET['idAlumnus'];
$query = mysqli_query($kon, "SELECT * FROM alumnus WHERE idAlumnus = '$idAlumnus'");
$j = mysqli_fetch_array($query); ?>
<section class="content">
<form action="action.php?tabel=alumnus&action=ubah&idAlumnus=<?=$idAlumnus?>" method="POST">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
              <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama" value="<?= $j['nama'] ?>" class="form-control" required>
              </div>
              <div class="form-group">
                  <label>Tempat dan Tanggal Lahir</label>
                  <div class="input-group input-group-mb">
                    <div class="input-group-prepend" style="width: 50%">
                        <input type="text" class="form-control" name="ttl1" value="<?= $j['ttl1'] ?>" required>
                    </div>
                    <div class="input-group-prepend" style="width: 50%">
                        <input type="date" class="form-control" name="ttl2" value="<?= $j['ttl2'] ?>" required>
                    </div>
                  </div>
              </div>
              <div class="form-group">
                  <label>Jabatan</label>
                  <input type="text" name="jabatan" class="form-control" value="<?= $j['jabatan'] ?>" required>
              </div>
              <div class="form-group">
                  <label>Status Pekerjaan</label>
                  <select name="statusPekerjaan" class="form-control" required>
                    <option value="<?= $j['statusPekerjaan'] ?>"><?= $j['statusPekerjaan'] ?></option>
                    <option value="Tetap">Tetap</option>
                    <option value="Honorer">Honorer</option>
                  </select>
              </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
                <label>Alamat Pekerjaan</label>
                <input type="text" name="alamat" class="form-control" value="<?= $j['alamat'] ?>" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Email yang Aktif" value="<?= $j['email'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Social Media</label>
                <input type="text" name="sosmed" value="<?= $j['sosmed'] ?>" placeholder="Cantumkan Social Media yang sering digunakan" class="form-control" required>
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