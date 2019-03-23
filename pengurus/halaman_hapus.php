<?php 
include '../koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi,"DELETE FROM halaman WHERE halaman_id='$id'");
header("location:halaman.php");
?>