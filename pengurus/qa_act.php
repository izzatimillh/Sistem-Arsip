<?php 
include '../koneksi.php';

$pertanyaan = $_POST['pertanyaan'];
$jawaban = $_POST['jawaban'];
$status = $_POST['status'];

mysqli_query($koneksi,"INSERT INTO qa VALUES (NULL,'$pertanyaan','$jawaban','$status')");

header("location:qa.php");
?>