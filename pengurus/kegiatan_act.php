<?php 
include '../koneksi.php';
$judul  = $_POST['judul'];
$tanggal = $_POST['tanggal'];
$keterangan = $_POST['keterangan'];

mysqli_query($koneksi,"INSERT INTO kegiatan VALUES('','$judul','$tanggal','$keterangan')");
header("location:kegiatan.php");

