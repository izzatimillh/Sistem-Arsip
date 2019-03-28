<?php 
include 'koneksi.php';

$pertanyaan = $_POST['pertanyaan'];

mysqli_query($koneksi,"INSERT INTO qa VALUES(NULL, '$pertanyaan', '-', 'pending')");

header("location:qa.php?alert=pertanyaan#pertanyaan");

?>