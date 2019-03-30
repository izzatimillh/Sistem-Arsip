<?php 
include '../koneksi.php';
session_start();

$waktu = date('Y-m-d H:i:s');
$jenis_pengirim = $_SESSION['login'];
$id_pengirim = $_SESSION['id'];
$jenis_tujuan = $_POST['jenis_tujuan'];
$id_tujuan = $_POST['id_tujuan'];
$pesan = $_POST['pesan'];
$file = $_FILES['file'];
$read = 0;

// cek gambar
if($_FILES['file']['name'] != ""){
	$nama_file = $_FILES['file']['name'];
	$x = explode('.', $nama_file);
	$ekstensi = strtolower(end($x));
	$file_tmp = $_FILES['file']['tmp_name'];

	if($ekstensi != "php"){
		$nm = rand().$nama_file;
		move_uploaded_file($file_tmp, '../dokumen_pesan/'.$nm);
		mysqli_query($koneksi,"INSERT INTO pesan VALUES(NULL,'$waktu','$jenis_pengirim','$id_pengirim','$jenis_tujuan','$id_tujuan','$pesan','$nm','$read')");
		header("location:pesan_terkirim.php?alert=terkirim");
	}else{
		mysqli_query($koneksi,"INSERT INTO pesan VALUES(NULL,'$waktu','$jenis_pengirim','$id_pengirim','$jenis_tujuan','$id_tujuan','$pesan',NULL,'$read')");
		header("location:pesan_terkirim.php?alert=terkirim");
	}
}else{
	mysqli_query($koneksi,"INSERT INTO pesan VALUES(NULL,'$waktu','$jenis_pengirim','$id_pengirim','$jenis_tujuan','$id_tujuan','$pesan',NULL,'$read')");
	header("location:pesan_terkirim.php?alert=terkirim");
}
?>