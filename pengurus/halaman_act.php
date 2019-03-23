<?php 
include '../koneksi.php';

$judul = $_POST['judul'];
$konten = $_POST['konten'];
$tanggal = date('Y-m-d');

$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
$nama_file = $_FILES['sampul']['name'];
$x = explode('.', $nama_file);
$ekstensi = strtolower(end($x));
$file_tmp = $_FILES['sampul']['tmp_name'];

if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
	$nm = rand().$nama_file;
	move_uploaded_file($file_tmp, '../gambar/halaman/'.$nm);
	$query = mysqli_query($koneksi, "INSERT INTO halaman VALUES(NULL, '$judul', '$nm', '$konten',)");
	header("location:halaman.php");
}else{
	header("location:halaman_tambah.php?alert=gagal");
}



?>