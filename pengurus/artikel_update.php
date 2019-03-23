<?php 
include '../koneksi.php';

$id = $_POST['id'];
$judul = $_POST['judul'];
$kategori = $_POST['kategori'];
$konten = $_POST['konten'];
$sampul = $_FILES['sampul'];
$tanggal = date('Y-m-d');

if($_FILES['sampul']['name'] == ""){

	mysqli_query($koneksi, "UPDATE artikel SET artikel_judul='$judul', artikel_kategori='$kategori', artikel_konten='$konten' WHERE artikel_id='$id'");
	header("location:artikel.php");

}else{

	$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
	$nama_file = $_FILES['sampul']['name'];
	$x = explode('.', $nama_file);
	$ekstensi = strtolower(end($x));
	$file_tmp = $_FILES['sampul']['tmp_name'];

	if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
		$nm = rand().$nama_file;
		move_uploaded_file($file_tmp, '../gambar/artikel/'.$nm);
		$query = mysqli_query($koneksi, "UPDATE artikel SET artikel_judul='$judul', artikel_kategori='$kategori', artikel_konten='$konten', artikel_sampul='$nm' WHERE artikel_id='$id'");
		header("location:artikel.php");
	}else{
		header("location:artikel_edit.php?id=$id&alert=gagal");
	}
}

?>