<?php 
include '../koneksi.php';
$id = $_POST['id'];
$judul = $_POST['judul'];
$tanggal = $_POST['tanggal'];
$keterangan = $_POST['keterangan'];

mysqli_query($koneksi, "UPDATE kegiatan SET kegiatan_judul='$judul',kegiatan_tanggal='$tanggal',kegiatan_keterangan='$keterangan' WHERE kegiatan_id='$id'");
header("location:kegiatan.php?pesan=edit");

