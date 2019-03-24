<?php 
include '../koneksi.php';
$id = $_GET['id'];

mysqli_query($koneksi, "delete from absen_kegiatan where absen_kegiatan='$id'");
header("location:setting_absen.php");

 ?>