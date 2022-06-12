<?php 
session_start(); require_once("kon.php");
$username 	= $_REQUEST['username'];
$password	= $_REQUEST['password'];

	$query = mysqli_query($kon, "SELECT * FROM user WHERE username='$username' AND password = '$password'");
	$cek  = mysqli_fetch_array($query);

	if($cek > 0){
		if($cek['level'] == 'Guru'){
			$_SESSION['username'] = $username;
			$_SESSION['id'] = $cek['id'];
			$_SESSION['level'] = "Guru";
			header("location:view/index");
		}else if($cek['level'] == 'Siswa'){
			$_SESSION['username'] = $username;
			$_SESSION['id'] = $cek['id'];
			$_SESSION['level'] = "Siswa";
			header("location:view/index");
		}else if($cek['level'] == 'Admin'){
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			$_SESSION['level'] = "Admin";
			header("location:view/index");
		}else if($cek['level'] == 'Karyawan'){
			$_SESSION['username'] = $username;
			$_SESSION['id'] = $cek['id'];
			$_SESSION['level'] = "Karyawan";
			header("location:view/index");
		}
	}else{
		?><script>window.location="index"; </script><?php
	}				
?>