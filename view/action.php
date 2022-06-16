<?php
require('../kon.php'); require('config.php'); SESSION_START(); error_reporting(0);
$tabel  = $_REQUEST['tabel'];
$action = $_REQUEST['action'];
if($tabel=='guru'){
    $id            = htmlspecialchars($_REQUEST['id'], ENT_QUOTES);
    $ni            = htmlspecialchars($_REQUEST['ni'], ENT_QUOTES);
    $nama          = htmlspecialchars($_REQUEST['nama'], ENT_QUOTES);
    $prodi         = htmlspecialchars($_REQUEST['prodi'], ENT_QUOTES);
    $jk            = htmlspecialchars($_REQUEST['jk'], ENT_QUOTES);
    $agama         = htmlspecialchars($_REQUEST['agama'], ENT_QUOTES);
    $tempat_lahir  = htmlspecialchars($_REQUEST['tempat_lahir'], ENT_QUOTES);
    $tanggal_lahir = htmlspecialchars($_REQUEST['tanggal_lahir'], ENT_QUOTES);
    $alamat        = htmlspecialchars($_REQUEST['alamat'], ENT_QUOTES);
    $telp          = htmlspecialchars($_REQUEST['telp'], ENT_QUOTES);
    $jabatan       = htmlspecialchars($_REQUEST['jabatan'], ENT_QUOTES);
    $golongan      = htmlspecialchars($_REQUEST['golongan'], ENT_QUOTES);
    $tipe          = htmlspecialchars($_REQUEST['tipe'], ENT_QUOTES);
    $idt           = htmlspecialchars($_REQUEST['idt'], ENT_QUOTES);
    $idGuru        = htmlspecialchars($_REQUEST['idGuru'], ENT_QUOTES);

    if ($action=='tambah'){
        mysqli_query($kon, "INSERT INTO user (nama,ni,jk,agama,tempat_lahir,tanggal_lahir,alamat,telp,username,password,level) VALUES ('$nama','$ni','$jk','$agama','$tempat_lahir','$tanggal_lahir','$alamat','$telp','$ni','$ni','Guru')"); $id = $kon->insert_id;
        mysqli_query($kon, "INSERT INTO guru (id,jabatan,golongan,tipe,idt,prodi) VALUES ('$id','$jabatan','$golongan','$tipe','$idt','$prodi')");
        bebeb('simpan','guru');
    }elseif ($action=='ubah'){
        mysqli_query($kon, "UPDATE user SET nama='$nama', ni='$ni', jk = '$jk', agama='$agama', tempat_lahir='$tempat_lahir', tanggal_lahir = '$tanggal_lahir', alamat = '$alamat', telp = '$telp' WHERE id = '$id'");
        mysqli_query($kon, "UPDATE guru SET jabatan='$jabatan', golongan='$golongan', tipe = '$tipe', idt = '$idt', prodi = '$prodi' WHERE idGuru = '$idGuru'");
        bebeb('ubah','guru');
    }
}else if($tabel=='kelas'){
    $idKelas  = htmlspecialchars($_REQUEST['idKelas'], ENT_QUOTES);
    $idGuru   = htmlspecialchars($_REQUEST['idGuru'], ENT_QUOTES);
    $kelasnya = htmlspecialchars($_REQUEST['kelasnya'], ENT_QUOTES);
    $jurusan  = htmlspecialchars($_REQUEST['jurusan'], ENT_QUOTES);
    $tahun    = htmlspecialchars($_REQUEST['tahun'], ENT_QUOTES);

    if ($action=='tambah'){
        mysqli_query($kon, "INSERT INTO kelas (idGuru,kelasnya,jurusan,tahun) VALUES ('$idGuru','$kelasnya','$jurusan','$tahun')");
        bebeb('simpan','kelas');
    }elseif ($action=='ubah'){
        mysqli_query($kon, "UPDATE kelas SET idGuru='$idGuru', kelasnya='$kelasnya', jurusan = '$jurusan', tahun = '$tahun' WHERE idKelas = '$idKelas'");
        bebeb('ubah','kelas');
    }
}else if($tabel=='kegiatan'){
    $idKegiatan  = htmlspecialchars($_REQUEST['idKegiatan'], ENT_QUOTES);
    $idGuru      = htmlspecialchars($_REQUEST['idGuru'], ENT_QUOTES);
    $kegiatannya = htmlspecialchars($_REQUEST['kegiatannya'], ENT_QUOTES);
    $lokasi      = htmlspecialchars($_REQUEST['lokasi'], ENT_QUOTES);
    $waktu       = htmlspecialchars($_REQUEST['waktu'], ENT_QUOTES);
    $nosurat     = htmlspecialchars($_REQUEST['nosurat'], ENT_QUOTES);
    $status      = htmlspecialchars($_REQUEST['status'], ENT_QUOTES);

    if ($action=='tambah'){
        mysqli_query($kon, "INSERT INTO kegiatan (idGuru,kegiatannya,lokasi,waktu,nosurat,status) VALUES ('$idGuru','$kegiatannya','$lokasi','$waktu','$nosurat',0)");
        bebeb('simpan','kegiatan');
    }elseif ($action=='ubah'){
        mysqli_query($kon, "UPDATE kegiatan SET kegiatannya='$kegiatannya', lokasi = '$lokasi', waktu = '$waktu', nosurat = '$nosurat', status = '$status' WHERE idKegiatan = '$idKegiatan'");
        bebeb('ubah','kegiatan');
    }
}else if($tabel=='artikel'){
    $idArtikel = htmlspecialchars($_REQUEST['idArtikel'], ENT_QUOTES);
    $judul     = htmlspecialchars($_REQUEST['judul'], ENT_QUOTES);
    $kategori  = htmlspecialchars($_REQUEST['kategori'], ENT_QUOTES);
    $konten    = $_REQUEST['konten'];
    $waktu     = htmlspecialchars($_REQUEST['waktu'], ENT_QUOTES);
    $view      = htmlspecialchars($_REQUEST['view'], ENT_QUOTES);

    $namafile  = $_FILES['file']['tmp_name'];
    $namafoto  = $_FILES['file']['name'];
    $checkin   = $_FILES['file']['error'];
    $fileLama  = $_REQUEST['fileLama'];
    $lokasi    = "assets/img/".$_FILES['file']['name'];
    $cekformat = array('png','jpg','jpeg');
    $x         = explode('.', $namafoto);
    $ekstensi  = strtolower(end($x));

    $namafile2  = $_FILES['file2']['tmp_name'];
    $namafoto2  = $_FILES['file2']['name'];
    $checkin2   = $_FILES['file2']['error'];
    $fileLama2  = $_REQUEST['fileLama2'];
    $lokasi2    = "assets/img/".$_FILES['file2']['name'];
    $cekformat2 = array('pdf');
    $x2         = explode('.', $namafoto2);
    $ekstensi2  = strtolower(end($x2));

    if ($action=='tambah'){
        if($checkin2){
            if(in_array($ekstensi, $cekformat) === true){
                move_uploaded_file($namafile, '../'.$lokasi);
                mysqli_query($kon, "INSERT INTO artikel (id,judul,kategori,konten,waktu,view,thumb) 
                    VALUES ('$_SESSION[id]','$judul','$kategori','$konten','$waktu',0,'$lokasi')");
                bebeb('simpan','artikel');
            }else{ 
                bebeb('ekstensi','artikel');
            }
        }else{
            if(in_array($ekstensi, $cekformat) === true){
                if(in_array($ekstensi2, $cekformat2) === true){
                    move_uploaded_file($namafile, '../'.$lokasi);
                    move_uploaded_file($namafile2, '../'.$lokasi2);
                mysqli_query($kon, "INSERT INTO artikel (id,judul,kategori,konten,waktu,view,thumb,file) VALUES ('$_SESSION[id]','$judul','$kategori','$konten','$waktu',0,'$lokasi','$lokasi2')");
                    bebeb('simpan','artikel');
                }else{
                    ?><script>alert('Gagal, Format File Haruf PDF'); window.location='artikel?action=tambah'</script><?php
                }
            }else{ 
                bebeb('ekstensi','artikel');
            }
        }
    }elseif ($action=='ubah'){
        if($checkin){
            mysqli_query($kon, "UPDATE artikel SET kategori='$kategori', judul='$judul', waktu = '$waktu', konten = '$konten', thumb = '$fileLama' WHERE idArtikel = '$idArtikel'"); bebeb('info','artikel');
        }else{
          unlink('../'.$fileLama);
          move_uploaded_file($namafile, '../'.$lokasi);
          mysqli_query($kon, "UPDATE artikel SET kategori='$kategori', judul='$judul', waktu = '$waktu', konten = '$konten', thumb = '$lokasi' WHERE idArtikel = '$idArtikel'"); bebeb('ubah','artikel');
        }        
    }
}else if($tabel=='siswa'){
    $id            = htmlspecialchars($_REQUEST['id'], ENT_QUOTES);
    $ni            = htmlspecialchars($_REQUEST['ni'], ENT_QUOTES);
    $nama          = htmlspecialchars($_REQUEST['nama'], ENT_QUOTES);
    $namaAyah      = htmlspecialchars($_REQUEST['namaAyah'], ENT_QUOTES);
    $jk            = htmlspecialchars($_REQUEST['jk'], ENT_QUOTES);
    $agama         = htmlspecialchars($_REQUEST['agama'], ENT_QUOTES);
    $tempat_lahir  = htmlspecialchars($_REQUEST['tempat_lahir'], ENT_QUOTES);
    $tanggal_lahir = htmlspecialchars($_REQUEST['tanggal_lahir'], ENT_QUOTES);
    $alamat        = htmlspecialchars($_REQUEST['alamat'], ENT_QUOTES);
    $telp          = htmlspecialchars($_REQUEST['telp'], ENT_QUOTES);
    $agamaAyah     = htmlspecialchars($_REQUEST['agamaAyah'], ENT_QUOTES);
    $kerjaAyah     = htmlspecialchars($_REQUEST['kerjaAyah'], ENT_QUOTES);
    $namaIbu       = htmlspecialchars($_REQUEST['namaIbu'], ENT_QUOTES);
    $agamaIbu      = htmlspecialchars($_REQUEST['agamaIbu'], ENT_QUOTES);
    $kerjaIbu      = htmlspecialchars($_REQUEST['kerjaIbu'], ENT_QUOTES);
    $idSiswa       = htmlspecialchars($_REQUEST['idSiswa'], ENT_QUOTES);
    $idKelas       = htmlspecialchars($_REQUEST['idKelas'], ENT_QUOTES);
    $status        = htmlspecialchars($_REQUEST['status'], ENT_QUOTES);

    if ($action=='ubah'){
        mysqli_query($kon, "UPDATE user SET nama='$nama', ni='$ni', jk = '$jk', agama='$agama', tempat_lahir='$tempat_lahir', tanggal_lahir = '$tanggal_lahir', alamat = '$alamat', telp = '$telp' WHERE id = '$id'");
        mysqli_query($kon, "UPDATE siswa SET namaAyah='$namaAyah', kerjaAyah='$kerjaAyah', agamaAyah = '$agamaAyah', namaIbu = '$namaIbu', kerjaIbu = '$kerjaIbu', agamaIbu = '$agamaIbu', idKelas = '$idKelas', status = '$status' WHERE idSiswa = '$idSiswa'"); 
        bebeb('ubah','siswa');
    }
}else if($tabel=='surat_panggilan'){
    $idSuratPanggilan = htmlspecialchars($_REQUEST['idSuratPanggilan'], ENT_QUOTES);
    $idSiswa          = htmlspecialchars($_REQUEST['idSiswa'], ENT_QUOTES);
    $ket              = htmlspecialchars($_REQUEST['ket'], ENT_QUOTES);
    $tempat           = htmlspecialchars($_REQUEST['tempat'], ENT_QUOTES);
    $waktu            = htmlspecialchars($_REQUEST['waktu'], ENT_QUOTES);
    $nosurat          = htmlspecialchars($_REQUEST['nosurat'], ENT_QUOTES);

    if ($action=='tambah'){
        mysqli_query($kon, "INSERT INTO surat_panggilan (idSiswa,ket,tempat,waktu,nosurat) VALUES ('$idSiswa','$ket','$tempat','$waktu','$nosurat')");
        bebeb('simpan','surat_panggilan');
    }elseif ($action=='ubah'){
        mysqli_query($kon, "UPDATE surat_panggilan SET ket='$ket', tempat = '$tempat', waktu = '$waktu', nosurat = '$nosurat' WHERE idSuratPanggilan = '$idSuratPanggilan'");
        bebeb('ubah','surat_panggilan');
    }
}else if($tabel=='surat_pindah'){
    $idSuratPindah = htmlspecialchars($_REQUEST['idSuratPindah'], ENT_QUOTES);
    $idSiswa       = htmlspecialchars($_REQUEST['idSiswa'], ENT_QUOTES);
    $ket           = htmlspecialchars($_REQUEST['ket'], ENT_QUOTES);
    $sekolahTujuan = htmlspecialchars($_REQUEST['sekolahTujuan'], ENT_QUOTES);
    $tgl           = htmlspecialchars($_REQUEST['tgl'], ENT_QUOTES);
    $nosurat       = htmlspecialchars($_REQUEST['nosurat'], ENT_QUOTES);

    if ($action=='tambah'){
        mysqli_query($kon, "INSERT INTO surat_pindah (idSiswa,ket,sekolahTujuan,tgl,nosurat) VALUES ('$idSiswa','$ket','$sekolahTujuan','$tgl','$nosurat')"); 
        bebeb('simpan','surat_pindah');
    }elseif ($action=='ubah'){
        mysqli_query($kon, "UPDATE surat_pindah SET ket='$ket', sekolahTujuan = '$sekolahTujuan', tgl = '$tgl', nosurat = '$nosurat' WHERE idSuratPindah = '$idSuratPindah'"); 
        bebeb('ubah','surat_pindah');
    }
}else if($tabel=='alumnus'){
    $idAlumnus       = htmlspecialchars($_REQUEST['idAlumnus'], ENT_QUOTES);
    $ttl1            = htmlspecialchars($_REQUEST['ttl1'], ENT_QUOTES);
    $ttl2            = htmlspecialchars($_REQUEST['ttl2'], ENT_QUOTES);
    $jabatan         = htmlspecialchars($_REQUEST['jabatan'], ENT_QUOTES);
    $statusPekerjaan = htmlspecialchars($_REQUEST['statusPekerjaan'], ENT_QUOTES);
    $alamat          = htmlspecialchars($_REQUEST['alamat'], ENT_QUOTES);
    $email           = htmlspecialchars($_REQUEST['email'], ENT_QUOTES);
    $sosmed          = htmlspecialchars($_REQUEST['sosmed'], ENT_QUOTES);
    $nama            = htmlspecialchars($_REQUEST['nama'], ENT_QUOTES);

    if ($action=='tambah'){
        mysqli_query($kon, "INSERT INTO alumnus (ttl1,ttl2,jabatan,statusPekerjaan,alamat,email,sosmed,nama) VALUES
            ('$ttl1','$ttl2','$jabatan','$statusPekerjaan','$alamat','$email','$sosmed','$nama')");
        bebeb('simpan','alumnus');
    }elseif ($action=='ubah'){
        mysqli_query($kon, "UPDATE alumnus SET ttl1='$ttl1', ttl2 = '$ttl2', jabatan = '$jabatan', statusPekerjaan = '$statusPekerjaan', alamat = '$alamat', email = '$email', sosmed = '$sosmed', nama = '$nama' WHERE idAlumnus = '$idAlumnus'");
        bebeb('ubah','alumnus');
    }
}else if($tabel=='alumni'){
    $idAlumnusDetail = htmlspecialchars($_REQUEST['idAlumnusDetail'], ENT_QUOTES);
    $idAlumnus       = htmlspecialchars($_REQUEST['idAlumnus'], ENT_QUOTES);
    $kategori        = htmlspecialchars($_REQUEST['kategori'], ENT_QUOTES);
    $tahun1          = htmlspecialchars($_REQUEST['tahun1'], ENT_QUOTES);
    $tahun2          = htmlspecialchars($_REQUEST['tahun2'], ENT_QUOTES);
    $ket             = htmlspecialchars($_REQUEST['ket'], ENT_QUOTES);

    if ($action=='tambah'){
        mysqli_query($kon, "INSERT INTO alumnus_detail (idAlumnus,kategori,tahun1,tahun2,ket) VALUES ('$idAlumnus','$kategori','$tahun1','$tahun2','$ket')");
        bebeb('simpan','alumni');
    }elseif ($action=='ubah'){
        mysqli_query($kon, "UPDATE alumnus_detail SET kategori = '$kategori', tahun1 = '$tahun1', tahun2 = '$tahun2', ket = '$ket' WHERE idAlumnusDetail = '$idAlumnusDetail'"); bebeb('ubah','alumni');
    }
}else if($tabel=='ppdb'){
    $id            = htmlspecialchars($_REQUEST['id'], ENT_QUOTES);
    $nama          = htmlspecialchars($_REQUEST['nama'], ENT_QUOTES);
    $namaAyah      = htmlspecialchars($_REQUEST['namaAyah'], ENT_QUOTES);
    $jk            = htmlspecialchars($_REQUEST['jk'], ENT_QUOTES);
    $agama         = htmlspecialchars($_REQUEST['agama'], ENT_QUOTES);
    $tempat_lahir  = htmlspecialchars($_REQUEST['tempat_lahir'], ENT_QUOTES);
    $tanggal_lahir = htmlspecialchars($_REQUEST['tanggal_lahir'], ENT_QUOTES);
    $alamat        = htmlspecialchars($_REQUEST['alamat'], ENT_QUOTES);
    $telp          = htmlspecialchars($_REQUEST['telp'], ENT_QUOTES);
    $agamaAyah     = htmlspecialchars($_REQUEST['agamaAyah'], ENT_QUOTES);
    $kerjaAyah     = htmlspecialchars($_REQUEST['kerjaAyah'], ENT_QUOTES);
    $namaIbu       = htmlspecialchars($_REQUEST['namaIbu'], ENT_QUOTES);
    $agamaIbu      = htmlspecialchars($_REQUEST['agamaIbu'], ENT_QUOTES);
    $kerjaIbu      = htmlspecialchars($_REQUEST['kerjaIbu'], ENT_QUOTES);
    $idSiswa       = htmlspecialchars($_REQUEST['idSiswa'], ENT_QUOTES);
    $idKelas       = htmlspecialchars($_REQUEST['idKelas'], ENT_QUOTES);
    $username      = htmlspecialchars($_REQUEST['username'], ENT_QUOTES);
    $password      = htmlspecialchars($_REQUEST['password'], ENT_QUOTES);
    $tgldaftar     = date('Y-m-d');

    $namafile  = $_FILES['foto']['tmp_name'];
    $namafoto  = $_FILES['foto']['name'];
    $checkin   = $_FILES['foto']['error'];
    $fotoLama  = $_REQUEST['fotoLama'];
    $lokasi    = "assets/img/".$_FILES['foto']['name'];
    $cekformat = array('png','jpg','jpeg');
    $x         = explode('.', $namafoto);
    $ekstensi  = strtolower(end($x));

    if ($action=='tambah'){
        mysqli_query($kon, "INSERT INTO user (nama,jk,agama,tempat_lahir,tanggal_lahir,alamat,telp,username,password,level) VALUES ('$nama','$jk','$agama','$tempat_lahir','$tanggal_lahir','$alamat','$telp','$telp','$telp','Siswa')");
        $id = $kon->insert_id;
        mysqli_query($kon, "INSERT INTO siswa (id,agamaAyah,kerjaAyah,namaIbu,agamaIbu,namaAyah,kerjaIbu,idKelas,status,tgldaftar) VALUES ('$id','$agamaAyah','$kerjaAyah','$namaIbu','$agamaIbu','$namaAyah','$kerjaIbu','$idKelas','Menunggu','$tgldaftar')");
        ?><script>alert('Berhasil Dikirim, Tunggu Pengumuman di Daftar Artikel');window.location='../daftar-artikel'</script><?php
    }elseif ($action=='ubah'){
        mysqli_query($kon, "UPDATE siswa SET agamaAyah='$agamaAyah', kerjaAyah='$kerjaAyah', namaIbu = '$namaIbu', agamaIbu = '$agamaIbu', namaAyah='$namaAyah', kerjaIbu='$kerjaIbu' WHERE id = '$_SESSION[id]'"); 
        if($checkin){
            mysqli_query($kon, "UPDATE user SET nama='$nama', jk='$jk', agama = '$agama', tempat_lahir = '$tempat_lahir', tanggal_lahir='$tanggal_lahir', alamat='$alamat', telp = '$telp', username = '$username', password = '$password', foto = '$fotoLama' WHERE id = '$_SESSION[id]'");
            ?><script>alert('Berhasil Diubah Data tanpa Mengubah Foto!');window.location='../profil'</script><?php
        }else{
            unlink('../'.$fotoLama);
            move_uploaded_file($namafile, '../'.$lokasi);
            mysqli_query($kon, "UPDATE user SET nama='$nama', jk='$jk', agama = '$agama', tempat_lahir = '$tempat_lahir', tanggal_lahir='$tanggal_lahir', alamat='$alamat', telp = '$telp', username = '$username', password = '$password', foto = '$lokasi' WHERE id = '$_SESSION[id]'"); 
            ?><script>alert('Berhasil Diubah termasuk Foto');window.location='../profil'</script><?php  
        }        
    }
}else if($tabel=='surat_thadir'){
    $idSuratThadir = htmlspecialchars($_REQUEST['idSuratThadir'], ENT_QUOTES);
    $idGuru        = htmlspecialchars($_REQUEST['idGuru'], ENT_QUOTES);
    $ket           = htmlspecialchars($_REQUEST['ket'], ENT_QUOTES);
    $status        = htmlspecialchars($_REQUEST['status'], ENT_QUOTES);
    $tgl           = htmlspecialchars($_REQUEST['tgl'], ENT_QUOTES);

    if ($action=='tambah'){
        mysqli_query($kon, "INSERT INTO surat_thadir (idGuru,ket,tgl,status) VALUES ('$idGuru','$ket','$tgl',0)"); 
        bebeb('simpan','surat_thadir');
    }elseif ($action=='ubah'){
        mysqli_query($kon, "UPDATE surat_thadir SET ket='$ket', tgl = '$tgl', status = '$status' WHERE idSuratThadir = '$idSuratThadir'"); 
        bebeb('ubah','surat_thadir');
    }
}else if($tabel=='profil'){
    $username    = htmlspecialchars($_REQUEST['username'], ENT_QUOTES);
    $usernameOLD = htmlspecialchars($_REQUEST['usernameOLD'], ENT_QUOTES);
    $password    = htmlspecialchars($_REQUEST['password'], ENT_QUOTES);
    $passwordOLD = htmlspecialchars($_REQUEST['passwordOLD'], ENT_QUOTES);
    $nama        = htmlspecialchars($_REQUEST['nama'], ENT_QUOTES);

    $namafile  = $_FILES['foto']['tmp_name'];
    $namafoto  = $_FILES['foto']['name'];
    $checkin   = $_FILES['foto']['error'];
    $fotoLama  = $_REQUEST['fotoLama'];
    $lokasi    = "assets/img/".$_FILES['foto']['name'];
    $cekformat = array('png','jpg','jpeg');
    $x         = explode('.', $namafoto);
    $ekstensi  = strtolower(end($x));

    if ($action=='ubah'){
        if($checkin){
            if($usernameOLD == $username OR $passwordOLD == $password){
            mysqli_query($kon, "UPDATE user SET username='$username', nama = '$nama', password = '$password', foto = '$fotoLama' WHERE id = '$_SESSION[id]'"); 
            bebeb('info','profil');
            }else{
                ?><script>alert('Username/Password Berhasil Diubah, Silahkan Login Ulang'); window.location="../out"; </script><?php
            }
        }else{
            unlink('../'.$fotoLama);
            move_uploaded_file($namafile, '../'.$lokasi);
            if($usernameOLD == $username OR $passwordOLD == $password){
            mysqli_query($kon, "UPDATE user SET username='$username', nama = '$nama', password = '$password', foto = '$lokasi' WHERE id = '$_SESSION[id]'"); 
            bebeb('ubah','profil');
            }else{
                ?><script>alert('Username/Password Berhasil Diubah, Silahkan Login Ulang'); window.location="../out"; </script><?php
            }
        } 
    }
}





?>