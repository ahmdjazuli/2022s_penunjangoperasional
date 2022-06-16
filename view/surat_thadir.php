<?php require('head.php'); $_SESSION['level']!='Admin' && $_SESSION['jabatan']!='Kepala Sekolah' ? hal('Surat Izin Tidak Hadir (Guru)') : hel('Surat Izin Tidak Hadir (Guru)'); 
$action = isset($_GET['action']) ? $_GET['action'] : ''; 
switch($action){ default:
$query = mysqli_query($kon, "SELECT * FROM surat_thadir JOIN guru ON surat_thadir.idGuru = guru.idGuru JOIN user ON guru.id = user.id ORDER BY tgl DESC"); ?>
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
                  <th>NIP</th>
                  <th>Nama Guru</th>
                  <th>Keterangan</th>
                  <th>Status</th>
                  <th class="knsdkvbgvr"></th>
                </tr>
              </thead>
              <tbody>
              <?php $no = 1;
                while($j = mysqli_fetch_array($query)){ ?>
                  <tr class="text-center">
                    <td><?= $no++ ?></td>
                    <td><?= ht($j['tgl']); ?></td>      
                    <td><?= $j['ni'] ?></td>      
                    <td><?= $j['nama'] ?></td>
                    <td><?= $j['ket'] ?></td>
                    <td><?php if($j['status'] == 0){ echo 'Menunggu Persetujuan Kepsek';
                    }else if($j['status'] == 1){ echo 'Ditolak, Data Tidak Lengkap'; 
                    }else if($j['status'] == 2){ echo 'Diterima Kepsek'; 
                    } ?></td>            
                    <td><?php 
                      if($_SESSION['id'] == $j['id']){  
                        zeroOne("?action=ubah&idSuratThadir=$j[idSuratThadir]"); 
                      }else if($_SESSION['level'] == 'Admin' OR $_SESSION['jabatan'] == 'Kepala Sekolah'){ 
                        zeroOne("?action=ubah&idSuratThadir=$j[idSuratThadir]");
                        zeroTwo("$j[idSuratThadir]","idSuratThadir=$j[idSuratThadir]");
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
<form action="action.php?tabel=surat_thadir&action=tambah" method="POST">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tgl" value="<?= date('Y-m-d') ?>" class="form-control" required>
            </div>
            <?php 
            if($_SESSION['level'] == 'Admin'){ ?>            
            <div class="form-group">
                <label>Nama Guru</label>
                <input type="text" name="idGuru" list="option" class="form-control" required>
                <datalist id="option">
                  <?php $query = mysqli_query($kon, "SELECT * FROM guru JOIN user ON guru.id = user.id ORDER BY nama ASC");
                    while ($j = mysqli_fetch_array($query)) { ?>
                        <option value="<?= $j['idGuru'] ?>"><?= $j['nama'].' ('.$j['ni'].')' ?></option>
                    <?php } ?>
                </datalist>
            </div>
            <?php }else{ ?>
              <input type="hidden" name="idGuru" value="<?= $_SESSION['idGuru'] ?>" required>
            <?php } ?>
            <div class="form-group">
                <label>Keterangan</label>
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
$idSuratThadir = $_GET['idSuratThadir'];
$query = mysqli_query($kon, "SELECT * FROM surat_thadir JOIN guru ON surat_thadir.idGuru = guru.idGuru JOIN user ON guru.id = user.id WHERE idSuratThadir = '$idSuratThadir'");
$j = mysqli_fetch_array($query); ?>
<section class="content">
<form action="action.php?tabel=surat_thadir&action=ubah&idSuratThadir=<?=$idSuratThadir?>" method="POST">
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
                <label>Nama Guru</label>
                <input type="text" value="<?= $j['nama'] ?>" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
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