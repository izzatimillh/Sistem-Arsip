<?php 
// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = md5($_POST['password']);
$sebagai = $_POST['sebagai'];


if($sebagai == "pengurus"){

	$login = mysqli_query($koneksi, "SELECT * FROM pengurus WHERE pengurus_username='$username' AND pengurus_password='$password'");
	$cek = mysqli_num_rows($login);

	if($cek > 0){
		session_start();
		$data = mysqli_fetch_assoc($login);
		$_SESSION['id'] = $data['pengurus_id'];
		$_SESSION['nama'] = $data['pengurus_nama'];
		$_SESSION['username'] = $data['pengurus_username'];
		$_SESSION['login'] = "pengurus";
		header("location:pengurus/");
	}else{
		header("location:login.php?alert=gagal");
	}

}else if($sebagai == "pembina"){

	$login = mysqli_query($koneksi, "SELECT * FROM pembina WHERE pembina_username='$username' AND pembina_password='$password'");
	$cek = mysqli_num_rows($login);

	if($cek > 0){
		session_start();
		$data = mysqli_fetch_assoc($login);
		$_SESSION['id'] = $data['pembina_id'];
		$_SESSION['nama'] = $data['pembina_nama'];
		$_SESSION['username'] = $data['pembina_username'];
		$_SESSION['login'] = "pembina";
		header("location:pembina/");
	}else{
		header("location:login.php?alert=gagal");
	}

}
