<?php 

include '../koneksi.php';
$id = $_POST['id'];
$tanggal = $_POST['tanggal'];
$keterangan = $_POST['keterangan'];
$jenis = $_POST['jenis'];
$jumlah = $_POST['jumlah'];

if($jenis=="Pemasukan"){
	mysqli_query($koneksi,"UPDATE keuangan SET keuangan_tanggal='$tanggal', keuangan_keterangan='$keterangan',keuangan_jenis='$jenis',keuangan_debit='$jumlah', keuangan_kredit='0' WHERE keuangan_id='$id'");
	header("location:keuangan.php");
}elseif($jenis=="Pengeluaran"){
	mysqli_query($koneksi,"UPDATE keuangan SET keuangan_tanggal='$tanggal', keuangan_keterangan='$keterangan',keuangan_jenis='$jenis',keuangan_debit='0', keuangan_kredit='$jumlah' WHERE keuangan_id='$id'");
	header("location:keuangan.php");
}
