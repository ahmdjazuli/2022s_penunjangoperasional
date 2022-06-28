<?php 
	session_start();
	error_reporting(1);
	require("../kon.php"); 
	require('config.php');
	//surat_thadir
	if (isset($_GET['idSuratThadir'])) {
		mysqli_query($kon, "DELETE FROM surat_thadir WHERE idSuratThadir='$_REQUEST[idSuratThadir]'"); 
		bebeb('hapus','surat_thadir');
	//guru
	}else if(isset($_GET['idGuru'])) {
		$query = mysqli_query($kon, "SELECT * FROM guru WHERE idGuru='$_REQUEST[idGuru]'"); 
		$row = mysqli_fetch_array($query);
		mysqli_query($kon, "DELETE FROM user WHERE id='$row[id]'"); 
		bebeb('hapus','guru');
	//siswa
	}else if(isset($_GET['idSiswa'])) {
		$query = mysqli_query($kon, "SELECT * FROM siswa WHERE idSiswa='$_REQUEST[idSiswa]'"); 
		$row = mysqli_fetch_array($query);
		mysqli_query($kon, "DELETE FROM user WHERE id='$row[id]'"); 
		bebeb('hapus','siswa');
	//kelas
	}else if(isset($_GET['idKelas'])) {
		mysqli_query($kon, "DELETE FROM kelas WHERE idKelas='$_REQUEST[idKelas]'"); 
		bebeb('hapus','kelas');
	//kegiatan
	}else if(isset($_GET['idKegiatan'])) {
		mysqli_query($kon, "DELETE FROM kegiatan WHERE idKegiatan='$_REQUEST[idKegiatan]'"); 
		bebeb('hapus','kegiatan');
	//artikel
	}else if(isset($_GET['idArtikel'])) {
		$query = mysqli_query($kon, "SELECT * FROM artikel WHERE idArtikel='$_REQUEST[idArtikel]'"); 
		$row = mysqli_fetch_array($query); unlink('../'.$row['thumb']); unlink('../'.$row['file']);
		mysqli_query($kon, "DELETE FROM artikel WHERE idArtikel='$_REQUEST[idArtikel]'"); 
		bebeb('hapus','artikel');
	//surat_panggilan
	}else if(isset($_GET['idSuratPanggilan'])) {
		mysqli_query($kon, "DELETE FROM surat_panggilan WHERE idSuratPanggilan='$_REQUEST[idSuratPanggilan]'"); 
		bebeb('hapus','surat_panggilan');
	//surat_pindah
	}else if(isset($_GET['idSuratPindah'])) {
		mysqli_query($kon, "DELETE FROM surat_pindah WHERE idSuratPindah='$_REQUEST[idSuratPindah]'"); 
		bebeb('hapus','surat_pindah');
	//alumnus
	}else if(isset($_GET['idAlumnus'])) {
		mysqli_query($kon, "DELETE FROM alumnus WHERE idAlumnus='$_REQUEST[idAlumnus]'"); 
		bebeb('hapus','alumnus');
	//alumnus_detail
	}else if(isset($_GET['idAlumnusDetail'])) {
		mysqli_query($kon, "DELETE FROM alumnus_detail WHERE idAlumnusDetail='$_REQUEST[idAlumnusDetail]'"); 
		bebeb('hapus','alumni');
	}
?>