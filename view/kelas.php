<?php require('head.php'); hal('Kelas');
$action = isset($_GET['action']) ? $_GET['action'] : ''; 
switch($action){ default:
$query = mysqli_query($kon, "SELECT * FROM kelas JOIN guru ON kelas.idGuru = guru.idGuru JOIN user ON guru.id = user.id ORDER BY idKelas DESC"); ?>
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
                  <th>Nama Kelas</th>
                  <th>Jurusan</th>
                  <th>Tahun Ke</th>
                  <th>Nama Wali Kelas</th>
                  <th class="knsdkvbgvr"></th>
                </tr>
              </thead>
              <tbody>
              <?php $no = 1;
                while($j = mysqli_fetch_array($query)){ ?>
                  <tr class="text-center">
                    <td><?= $no++ ?></td>
                    <td><?= $j['kelasnya'] ?></td>
                    <td><?= $j['jurusan'] ?></td>
                    <td><?= $j['tahun'] ?></td>      
                    <td><?= $j['nama'].' - '.$j['ni'] ?></td>           
                    <td><?php 
                        zeroOne("?action=ubah&idKelas=$j[idKelas]"); 
                        zeroTwo("$j[idKelas]","idKelas=$j[idKelas]");
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
<form action="action.php?tabel=kelas&action=tambah" method="POST">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
                <label>Nama Kelas</label>
                <select name="kelasnya" class="form-control" required>
                  <option selected disabled>-</option>
                  <option disabled>KELAS 1</option>
                  <option value="X / I (Sepuluh 1)">X / I (Sepuluh 1)</option>
                  <option value="X / II (Sepuluh 2)">X / II (Sepuluh 2)</option>
                  <option value="X / III (Sepuluh 3)">X / III (Sepuluh 3)</option>
                  <option disabled>KELAS 2</option>
                  <option value="XI / I (Sebelas 1)">XI / I (Sebelas 1)</option>
                  <option value="XI / II (Sebelas 2)">XI / II (Sebelas 2)</option>
                  <option value="XI / III (Sebelas 3)">XI / III (Sebelas 3)</option>
                  <option disabled>KELAS 3</option>
                  <option value="XII / I (Dua Belas 1)">XII / I (Dua Belas 1)</option>
                  <option value="XII / II (Dua Belas 2)">XII / II (Dua Belas 2)</option>
                  <option value="XII / III (Dua Belas 3)">XII / III (Dua Belas 3)</option>
                </select>
            </div>
            <div class="form-group">
                <label>Jurusan</label>
                <select name="jurusan" class="form-control" required>
                  <option selected disabled>-</option>
                  <option value="Asisten Keperawatan (Khusus Perempuan)">Asisten Keperawatan (Khusus Perempuan)</option>
                  <option value="TSM (Teknik Sepeda Motor)">TSM (Teknik Sepeda Motor)</option>
                  <option value="TMT (Teknik Mekanik Otomotif)">TMT (Teknik Mekanik Otomotif)</option>
                  <option value="TMP (Teknik Mesin Perkakas)">TMP (Teknik Mesin Perkakas)</option>
                </select>
            </div>
            <div class="form-group">
                <label>Tahun Ke</label>
                <select name="tahun" class="form-control" required>
                  <option selected disabled>-</option>
                  <option value="Tahun Ke-1">Tahun Ke-1</option>
                  <option value="Tahun Ke-2">Tahun Ke-2</option>
                  <option value="Tahun Ke-3">Tahun Ke-3</option>
                </select>
            </div>
            <div class="form-group">
                <label>Nama Wali Kelas</label>
                <select class="form-control" name="idGuru">
                    <option selected disabled>Pilih</option>
                    <?php $query = mysqli_query($kon, "SELECT * FROM guru JOIN user ON guru.id = user.id ORDER BY nama ASC");
                    while ($j = mysqli_fetch_array($query)) { ?>
                        <option value="<?= $j['idGuru'] ?>"><?= $j['nama'].' ('.$j['ni'].')' ?></option>
                    <?php } ?>
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
$idKelas = $_GET['idKelas'];
$query = mysqli_query($kon, "SELECT * FROM kelas JOIN guru ON kelas.idGuru = guru.idGuru JOIN user ON guru.id = user.id WHERE idKelas = '$idKelas'");
$j = mysqli_fetch_array($query); ?>
<section class="content">
<form action="action.php?tabel=kelas&action=ubah&idKelas=<?=$idKelas?>" method="POST">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
                <label>Nama Kelas</label>
                  <select name="kelasnya" class="form-control" required>
                  <option value="<?= $j['kelasnya'] ?>"><?= $j['kelasnya'] ?></option>
                  <option disabled>KELAS 1</option>
                  <option value="X / I (Sepuluh 1)">X / I (Sepuluh 1)</option>
                  <option value="X / II (Sepuluh 2)">X / II (Sepuluh 2)</option>
                  <option value="X / III (Sepuluh 3)">X / III (Sepuluh 3)</option>
                  <option disabled>KELAS 2</option>
                  <option value="XI / I (Sebelas 1)">XI / I (Sebelas 1)</option>
                  <option value="XI / II (Sebelas 2)">XI / II (Sebelas 2)</option>
                  <option value="XI / III (Sebelas 3)">XI / III (Sebelas 3)</option>
                  <option disabled>KELAS 3</option>
                  <option value="XII / I (Dua Belas 1)">XII / I (Dua Belas 1)</option>
                  <option value="XII / II (Dua Belas 2)">XII / II (Dua Belas 2)</option>
                  <option value="XII / III (Dua Belas 3)">XII / III (Dua Belas 3)</option>
                </select>
              </div>
              <div class="form-group">
                <label>Jurusan</label>
                <select name="jurusan" class="form-control" required>
                  <option value="<?= $j['jurusan'] ?>"><?= $j['jurusan'] ?></option>
                  <option value="Asisten Keperawatan (Khusus Perempuan)">Asisten Keperawatan (Khusus Perempuan)</option>
                  <option value="TSM (Teknik Sepeda Motor)">TSM (Teknik Sepeda Motor)</option>
                  <option value="TMT (Teknik Mekanik Otomotif)">TMT (Teknik Mekanik Otomotif)</option>
                  <option value="TMP (Teknik Mesin Perkakas)">TMP (Teknik Mesin Perkakas)</option>
                </select>
              </div>
              <div class="form-group">
                <label>Tahun Ke</label>
                <select name="tahun" class="form-control" required>
                  <option value="<?= $j['tahun'] ?>"><?= $j['tahun'] ?></option>
                  <option value="Tahun Ke-1">Tahun Ke-1</option>
                  <option value="Tahun Ke-2">Tahun Ke-2</option>
                  <option value="Tahun Ke-3">Tahun Ke-3</option>
                </select>
              </div>
              <div class="form-group">
                <label>Nama Wali Kelas</label>
                <select class="form-control" name="idGuru">
                    <option value="<?= $j['idGuru'] ?>"><?= $j['nama'].' ('.$j['ni'].')' ?></option>
                    <?php $guru = mysqli_query($kon, "SELECT * FROM guru JOIN user ON guru.id = user.id ORDER BY nama ASC");
                    while ($ju = mysqli_fetch_array($guru)) { ?>
                        <option value="<?= $ju['idGuru'] ?>"><?= $ju['nama'].' ('.$ju['ni'].')' ?></option>
                    <?php } ?>
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
<?php break; } require('foot.php'); ?>