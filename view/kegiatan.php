<?php require('head.php'); $_SESSION['level']!='Admin' && $_SESSION['jabatan']!='Kepala Sekolah' ? hal('Kegiatan') : hel('Kegiatan');
$action = isset($_GET['action']) ? $_GET['action'] : ''; 
switch($action){ default:
$query = mysqli_query($kon, "SELECT * FROM kegiatan JOIN guru ON kegiatan.idGuru = guru.idGuru JOIN user ON guru.id = user.id ORDER BY idKegiatan DESC"); ?>
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
                  <th>Waktu (WITA)</th>
                  <th>Nama Kegiatan</th>
                  <th>Lokasi</th>
                  <th>No. Surat</th>
                  <th>Nama Petugas</th>
                  <th>Status</th>
                  <th class="knsdkvbgvr"></th>
                </tr>
              </thead>
              <tbody>
              <?php $no = 1;
                while($j = mysqli_fetch_array($query)){ ?>
                  <tr class="text-center">
                    <td><?= $no++ ?></td>
                    <td><?= htw($j['waktu']); ?></td>      
                    <td><?= $j['kegiatannya'] ?></td>
                    <td><?= $j['lokasi'] ?></td>      
                    <td><?= $j['nosurat'] ?></td>
                    <td><?= $j['nama'] ?></td>           
                    <td><?php if($j['status'] == 0){ echo 'Menunggu Persetujuan Kepsek';
                    }else if($j['status'] == 1){ echo 'Ditolak, Data Tidak Lengkap'; 
                    }else if($j['status'] == 2){ echo 'Diterima Kepsek'; 
                    } ?></td>           
                    <td><?php 
                      if($_SESSION['id'] == $j['id']){  
                        zeroOne("?action=ubah&idKegiatan=$j[idKegiatan]"); 
                      }else if($_SESSION['level'] == 'Admin' OR $_SESSION['jabatan'] == 'Kepala Sekolah'){ 
                        zeroOne("?action=ubah&idKegiatan=$j[idKegiatan]"); 
                        zeroTwo("$j[idKegiatan]","idKegiatan=$j[idKegiatan]");
                      }
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
<form action="action.php?tabel=kegiatan&action=tambah" method="POST">
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
                <label>Nama Kegiatan</label>
                <input type="text" name="kegiatannya" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Lokasi</label>
                <input type="text" name="lokasi" class="form-control" required>
            </div>
            <div class="form-group">
                <label>No.Surat</label>
                <input type="text" name="nosurat" class="form-control" required>
                <input type="hidden" name="idGuru" value="<?= $_SESSION['idGuru'] ?>" class="form-control" required>
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
$idKegiatan = $_GET['idKegiatan'];
$query = mysqli_query($kon, "SELECT * FROM kegiatan JOIN guru ON kegiatan.idGuru = guru.idGuru JOIN user ON guru.id = user.id WHERE idKegiatan = '$idKegiatan'");
$j = mysqli_fetch_array($query); ?>
<section class="content">
<form action="action.php?tabel=kegiatan&action=ubah&idKegiatan=<?=$idKegiatan?>" method="POST">
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
                <label>Nama Kegiatan</label>
                <input type="text" name="kegiatannya" value="<?= $j['kegiatannya'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Lokasi</label>
                <input type="text" name="lokasi" value="<?= $j['lokasi'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label>No.Surat</label>
                <input type="text" name="nosurat" value="<?= $j['nosurat'] ?>" class="form-control" required>
            </div>
              <div class="form-group">
                <label>Nama Petugas</label>
                <input type="text" readonly value="<?= $j['nama'] ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control" required>
                  <option value="<?= $j['status'] ?>"><?php 
                  if($j['status'] == 0){ echo 'Menunggu Persetujuan Kepsek';
                  }else if($j['status'] == 1){ echo 'Ditolak, Data Tidak Lengkap'; 
                  }else if($j['status'] == 2){ echo 'Diterima Kepsek'; 
                  } ?></option>
                  <option value="1">Ditolak, Data Tidak Lengkap</option>
                  <option value="2">Diterima Kepsek</option>
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