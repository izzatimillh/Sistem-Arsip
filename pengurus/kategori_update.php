<?php 
include '../koneksi.php';

$id = $_POST['id'];
$kategori = $_POST['kategori'];

mysqli_query($koneksi,"UPDATE kategori SET kategori_nama='$kategori' WHERE kategori_id='$id'");

header("location:kategori.php");
?>