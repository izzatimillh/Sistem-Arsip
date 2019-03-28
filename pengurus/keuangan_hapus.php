<?php 

include '../koneksi.php';
$id = $_GET['id'];

mysqli_query($koneksi,"DELETE FROM keuangan WHERE keuangan_id='$id'");
header("location:keuangan.php");