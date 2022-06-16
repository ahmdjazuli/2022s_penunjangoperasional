<?php require('head.php'); 
$query = mysqli_query($kon, "SELECT * FROM siswa WHERE id = '$_SESSION[id]'");
$ju = mysqli_fetch_array($query);
$siswa = mysqli_query($kon, "SELECT * FROM siswa JOIN user ON siswa.id = user.id JOIN kelas ON siswa.idKelas = kelas.idKelas JOIN guru ON guru.idGuru = kelas.idGuru WHERE idSiswa = '$ju[idSiswa]'");
$j = mysqli_fetch_array($siswa); 
?>
 <section id="mu-page-breadcrumb">
   <div class="container">
     <div class="row">
        <div class="col-md-1">
            <img src="<?= $j['foto'] ?>" width="150px">
        </div>
       <div class="col-md-10" style="padding-top: 30px;">
         <div class="mu-page-breadcrumb-area">
           <h2>Profil Akun</h2>
           <ol class="breadcrumb">
            <li><a href="./">Beranda</a></li>            
            <li class="active">Profil Akun</li>
          </ol>
         </div>
       </div>
     </div>
   </div>
 </section>
 <section id="mu-course-content" style="padding-top: 0;">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">
              <div class="col-md-9">
                <div class="mu-course-container mu-blog-single">
                  <div class="row">
<form action="view/action.php?tabel=ppdb&action=ubah" method="POST" autocomplete="off" enctype="multipart/form-data">
  <div class="col-md-6">
    <h1><u>Data Siswa</u></h1>
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" value="<?= $j['nama'] ?>" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" value="<?= $j['username'] ?>" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" value="<?= $j['password'] ?>" class="form-control" required>
    </div>
    <div class="form-group">
        <label>NIS</label>
        <input type="text" readonly class="form-control" value="<?= $j['ni'] ?>">
    </div>
    <div class="form-group">
      <label>Foto</label>
      <input type="file" name="foto" class="form-control">
      <input type="hidden" name="fotoLama" value="<?= $j['foto'] ?>" class="form-control">
    </div>
    <div class="form-group">
        <label>Tempat Lahir</label>
        <input type="text" class="form-control" name="tempat_lahir" value="<?= $j['tempat_lahir'] ?>" required>
    </div>
    <div class="form-group">
        <label>Tanggal Lahir</label>
        <input type="date" class="form-control" name="tanggal_lahir" value="<?= $j['tanggal_lahir'] ?>" required>
    </div>
    <div class="form-group">
        <label>Jenis Kelamin</label>
        <select name="jk" class="form-control" required>
          <option value="<?= $j['jk'] ?>"><?= $j['jk'] ?></option>
          <option value="Pria">Pria</option>
          <option value="Wanita">Wanita</option>
        </select>
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
        <label>Jurusan</label>
        <input type="text" readonly class="form-control" value="<?= $j['jurusan'] ?>">
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control" value="<?= $j['alamat'] ?>" required>
    </div>
    <div class="form-group">
        <label>Telp</label>
        <input type="tel" name="telp" value="<?= $j['telp'] ?>" class="form-control" required>
    </div>
  </div>  
  <div class="col-md-6">
    <h1><u>Data Orang Tua</u></h1>
    <div class="form-group">
        <label>Nama Ayah</label>
        <input type="text" class="form-control" name="namaAyah" value="<?= $j['namaAyah'] ?>" required>
    </div>
    <div class="form-group">
        <label>Agama Ayah</label>
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
    <div class="form-group">
        <label>Pekerjaan Ayah</label>
        <input type="text" class="form-control" value="<?= $j['kerjaAyah'] ?>" name="kerjaAyah" required>
    </div>
    <div class="form-group">
        <label>Nama Ibu</label>
        <input type="text" class="form-control" name="namaIbu" value="<?= $j['namaIbu'] ?>" required>
    </div>
    <div class="form-group">
        <label>Agama Ibu</label>
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
    <div class="form-group">
        <label>Pilih Pekerjaan Ibu</label>
        <input type="text" class="form-control" value="<?= $j['kerjaIbu'] ?>" name="kerjaIbu" required>
    </div>
    <div class="card-footer">
        <button type="submit" name="kirim" class="btn btn-success">Ubah</button>
        <button type="reset" class="btn btn-danger float-right" onclick="history.back()">Reset</button>
    </div>
  </div>                                 
</form>
                  </div>
                </div>
<?php require('sidebar.php') ?>
<?php require('foot.php') ?>