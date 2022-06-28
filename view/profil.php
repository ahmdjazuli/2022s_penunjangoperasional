<?php require('head.php'); hel('Profil Pengguna'); error_reporting(0);
$action = isset($_GET['action']) ? $_GET['action'] : ''; 
switch($action){ default:
$query = mysqli_query($kon, "SELECT * FROM user WHERE id = '$_SESSION[id]'");
$j = mysqli_fetch_array($query); ?>
<section class="content">
<form action="action.php?tabel=profil&action=ubah&id=<?=$id?>" method="POST" enctype="multipart/form-data">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" value="<?= $j['username'] ?>" class="form-control" required>
                <input type="hidden" name="usernameOLD" value="<?= $j['username'] ?>">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" value="<?= $j['password'] ?>" class="form-control" required>
                <input type="hidden" name="passwordOLD" value="<?= $j['password'] ?>">
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" value="<?= $j['nama'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="exampleInputFile">Foto</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="foto" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
                <div class="input-group-append">
                  <input type="hidden" name="fileLama" value="<?= $j['foto'] ?>">
                  <span class="input-group-text" id="">Upload</span>
                </div>
              </div>
            </div>
          </div>
        <?php akuSukaDia(); ?>
        </div>
      </div> <div class="col-sm-12 col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
                <label>Foto</label><br>
                <?= $j['foto'] != '' ? "<img src='../$j[foto]' width='100'>": 'Tidak ada'; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
</section>
<?php break; } require('foot.php'); ?>            