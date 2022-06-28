<?php require('head.php'); hal('Detail Alumnus'); error_reporting(0);
$action = isset($_GET['action']) ? $_GET['action'] : ''; 
switch($action){ default:
$query = mysqli_query($kon, "SELECT * FROM alumnus_detail JOIN alumnus ON alumnus_detail.idAlumnus = alumnus.idAlumnus ORDER BY idAlumnusDetail DESC"); ?>
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
                  <th>Kategori</th>
                  <th>Tahun Mulai Dari</th>
                  <th>Sampai Dengan</th>
                  <th>Keterangan</th>
                  <th class="knsdkvbgvr"></th>
                </tr>
              </thead>
              <tbody>
              <?php $no = 1;
                while($j = mysqli_fetch_array($query)){ ?>
                  <tr class="text-center">
                    <td><?= $no++ ?></td>
                    <td><?= $j['nama'].'<br>('.$j['jabatan'].')' ?></td>
                    <td><?= $j['kategori'] ?></td>
                    <td><?= $j['tahun1'] ?></td>           
                    <td><?= $j['tahun2'] ?></td>
                    <td><?= $j['ket'] ?></td>    
                    <td><?php
                        zeroOne("?action=ubah&idAlumnusDetail=$j[idAlumnusDetail]"); 
                        zeroTwo("$j[idAlumnusDetail]","idAlumnusDetail=$j[idAlumnusDetail]");
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
<form action="action.php?tabel=alumni&action=tambah" method="POST">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
                <label>Nama Alumnus</label>
                <input type="text" name="idAlumnus" list="option" class="form-control" required>
                <datalist id="option">
                  <?php $query = mysqli_query($kon, "SELECT * FROM alumnus ORDER BY nama ASC");
                    while ($ju = mysqli_fetch_array($query)) { ?>
                        <option value="<?= $ju['idAlumnus'] ?>"><?= $ju['nama'].' ('.$ju['jabatan'].')' ?></option>
                    <?php } ?>
                </datalist>
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <select name="kategori" class="form-control" required>
                  <option value="Pendidikan">Pendidikan</option>
                  <option value="Pekerjaan">Pekerjaan</option>
                </select>
            </div>
            <div class="form-group">
                <label>Tahun Mulai Dari</label>
                <input type="text" name="tahun1" class="form-control" placeholder="Ex: 2003" required>
            </div>
            <div class="form-group">
                <label>Sampai Dengan</label>
                <input type="text" name="tahun2" class="form-control" placeholder="Ex: 2006" required>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" name="ket" placeholder="Ex: Lulus SD di SMP NEGERI 1 MARTAPURA" class="form-control" required>
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
$idAlumnusDetail = $_GET['idAlumnusDetail'];
$query = mysqli_query($kon, "SELECT * FROM alumnus_detail JOIN alumnus ON alumnus_detail.idAlumnus = alumnus.idAlumnus WHERE idAlumnusDetail = '$idAlumnusDetail'");
$j = mysqli_fetch_array($query); ?>
<section class="content">
<form action="action.php?tabel=alumni&action=ubah&idAlumnusDetail=<?=$idAlumnusDetail?>" method="POST">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
              <div class="form-group">
                  <label>Nama</label>
                  <input type="text" value="<?= $j['nama'] ?>" class="form-control" readonly>
              </div>
              <div class="form-group">
                  <label>Kategori</label>
                  <select name="kategori" class="form-control" required>
                    <option value="<?= $j['kategori'] ?>"><?= $j['kategori'] ?></option>
                    <option value="Pendidikan">Pendidikan</option>
                    <option value="Pekerjaan">Pekerjaan</option>
                  </select>
              </div>
              <div class="form-group">
                  <label>Tahun Mulai Dari</label>
                  <input type="text" value="<?= $j['tahun1'] ?>" name="tahun1" class="form-control" placeholder="Ex: 2003" required>
              </div>
              <div class="form-group">
                  <label>Sampai Dengan</label>
                  <input type="text" value="<?= $j['tahun2'] ?>" name="tahun2" class="form-control" placeholder="Ex: 2006" required>
              </div>
              <div class="form-group">
                  <label>Keterangan</label>
                  <input type="text" name="ket" value="<?= $j['ket'] ?>" placeholder="Ex: Lulus SD di SMP NEGERI 1 MARTAPURA" class="form-control" required>
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