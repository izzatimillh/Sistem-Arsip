<?php 
include '../koneksi.php';

$judul = $_POST['judul'];
$kategori = $_POST['kategori'];
$konten = $_POST['konten'];
$tanggal = date('Y-m-d');

$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
$nama_file = $_FILES['sampul']['name'];
$x = explode('.', $nama_file);
$ekstensi = strtolower(end($x));
$file_tmp = $_FILES['sampul']['tmp_name'];

if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
	$nm = rand().$nama_file;
	move_uploaded_file($file_tmp, '../gambar/artikel/'.$nm);
	$query = mysqli_query($koneksi, "INSERT INTO artikel VALUES(NULL, '$tanggal', '$judul', '$kategori', '$konten', '$nm')");
	header("location:artikel.php");
}else{
	header("location:artikel_tambah.php?alert=gagal");
}



?>