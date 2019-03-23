<?php 
include '../koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi,"DELETE FROM kategori WHERE kategori_id='$id'");
header("location:kategori.php");
?>