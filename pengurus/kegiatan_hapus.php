<?php 
include '../koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM kegiatan WHERE kegiatan_id='$id'");
header("location:kegiatan.php?pesan=hapus");

