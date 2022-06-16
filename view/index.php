<?php 
  require('head.php'); hel('Halaman Utama');
  $guru            = mysqli_num_rows(mysqli_query($kon, "SELECT * FROM guru"));
  $siswa           = mysqli_num_rows(mysqli_query($kon, "SELECT * FROM siswa"));
  $kelas           = mysqli_num_rows(mysqli_query($kon, "SELECT * FROM kelas"));
  $kegiatan        = mysqli_num_rows(mysqli_query($kon, "SELECT * FROM kegiatan"));
  $artikel         = mysqli_num_rows(mysqli_query($kon, "SELECT * FROM artikel"));
  $surat_panggilan = mysqli_num_rows(mysqli_query($kon, "SELECT * FROM surat_panggilan"));
  $surat_pindah    = mysqli_num_rows(mysqli_query($kon, "SELECT * FROM surat_pindah"));
  $surat_thadir    = mysqli_num_rows(mysqli_query($kon, "SELECT * FROM surat_thadir"));
  $alumnus         = mysqli_num_rows(mysqli_query($kon, "SELECT * FROM alumnus"));
?>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-tie"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Guru</span>
              <span class="info-box-number"><?= $guru ?></span>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Siswa</span>
              <span class="info-box-number"><?= $siswa ?></span>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-hotel"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Kelas</span>
              <span class="info-box-number"><?= $kelas ?></span>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-map"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Artikel</span>
              <span class="info-box-number"><?= $artikel ?></span>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-envelope"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Kegiatan</span>
              <span class="info-box-number"><?= $kegiatan ?></span>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-envelope"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Surat Pemanggilan Orang Tua</span>
              <span class="info-box-number"><?= $surat_panggilan ?></span>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-envelope"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Surat Pindah Sekolah</span>
              <span class="info-box-number"><?= $surat_pindah ?></span>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-envelope"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Surat Izin Tidak Hadir (Guru)</span>
              <span class="info-box-number"><?= $surat_thadir ?></span>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-id-card"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Alumnus</span>
              <span class="info-box-number"><?= $alumnus ?></span>
            </div>
          </div>
        </div>
        <div class="clearfix hidden-md-up"></div>
      </div>
    </div><!--/. container-fluid -->
  </section>
  </div>
  <!-- /.content-wrapper -->
<?php require('foot.php') ?>