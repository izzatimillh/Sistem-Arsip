<?php 
// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$nim = $_POST['nim'];
$password = md5($_POST['password']);

$login = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE mahasiswa_nim='$nim' AND mahasiswa_password='$password'");
$cek = mysqli_num_rows($login);

if($cek > 0){
	session_start();
	$data = mysqli_fetch_assoc($login);
	$_SESSION['id'] = $data['mahasiswa_id'];
	$_SESSION['nama'] = $data['mahasiswa_nama'];
	$_SESSION['nim'] = $data['mahasiswa_nim'];
	$_SESSION['login'] = "mahasiswa";
	header("location:mahasiswa/");
}else{
	header("location:login_mahasiswa.php?alert=gagal");
}