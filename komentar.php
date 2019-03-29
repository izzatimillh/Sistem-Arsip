<?php 
include 'koneksi.php';
session_start();

$id = $_POST['id'];
$tanggal = date('Y-m-d');
$komentar = $_POST['komentar'];
$id_pengguna = $_SESSION['id'];
$jenis_pengguna = $_SESSION['login'];

mysqli_query($koneksi,"INSERT INTO komentar VALUES(NULL,'$tanggal','$jenis_pengguna','$id_pengguna','$id','$komentar')");

header("location:single.php?id=$id#komentar");
?>