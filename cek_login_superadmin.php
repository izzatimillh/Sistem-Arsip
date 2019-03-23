<?php 
// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = md5($_POST['password']);

// menyeleksi data admin dengan username dan password yang sesuai
$login = mysqli_query($koneksi, "SELECT * FROM superadmin WHERE username='$username' AND password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// print_r(mysqli_fetch_array($login));
if($cek > 0){
	session_start();
	$data = mysqli_fetch_assoc($login);
	$_SESSION['id'] = $data['id'];
	$_SESSION['username'] = $data['username'];
	$_SESSION['nama'] = $data['nama'];
	$_SESSION['login'] = "superadmin";
	header("location:superadmin/");
}else{
	header("location:superadmin.php?alert=gagal");
}