<?php 
include '../koneksi.php';

$kategori = $_POST['kategori'];
echo $kategori;
mysqli_query($koneksi,"INSERT INTO kategori VALUES (NULL,'$kategori')");

header("location:kategori.php");
?>