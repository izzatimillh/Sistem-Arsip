<?php 
include '../koneksi.php';
$tanggal = $_POST['tanggal'];
$keterangan = $_POST['keterangan'];
$jenis = $_POST['jenis'];
$jumlah = $_POST['jumlah'];

if($jenis=="Pemasukan"){
	mysqli_query($koneksi,"insert into keuangan values('','$tanggal','$keterangan','$jenis','$jumlah','0')");
	header("location:keuangan.php");	
}else if($jenis=="Pengeluaran"){
	mysqli_query($koneksi,"insert into keuangan values('','$tanggal','$keterangan','$jenis','0','$jumlah')");
	header("location:keuangan.php");
}



?>