<?php 
include 'koneksi.php';

$pertanyaan = $_POST['pertanyaan'];

mysqli_query($koneksi,"INSERT INTO qa VALUES(NULL, '$pertanyaan', '-', 'pending')");

header("location:index.php?alert=pertanyaan#pertanyaan");

?>