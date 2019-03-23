<?php 
include '../koneksi.php';

$id = $_POST['id'];
$judul = $_POST['judul'];
$konten = $_POST['konten'];
$sampul = $_FILES['sampul'];

if($_FILES['sampul']['name'] == ""){

	mysqli_query($koneksi, "UPDATE halaman SET halaman_judul='$judul', halaman_konten='$konten' WHERE halaman_id='$id'");
	header("location:halaman.php");

}else{

	$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
	$nama_file = $_FILES['sampul']['name'];
	$x = explode('.', $nama_file);
	$ekstensi = strtolower(end($x));
	$file_tmp = $_FILES['sampul']['tmp_name'];

	if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
		$nm = rand().$nama_file;
		move_uploaded_file($file_tmp, '../gambar/halaman/'.$nm);
		$query = mysqli_query($koneksi, "UPDATE halaman SET halaman_judul='$judul', halaman_konten='$konten', halaman_sampul='$nm' WHERE halaman_id='$id'");
		header("location:halaman.php");
	}else{
		header("location:halaman_edit.php?id=$id&alert=gagal");
	}
}

?>