<?php 
include '../koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi, "select * from pengurus where pengurus_id='$id'");
$d = mysqli_fetch_assoc($data);
$foto = $d['pengurus_foto'];
unlink("../gambar/pengurus/$foto");
mysqli_query($koneksi, "delete from pengurus where pengurus_id='$id'");
header("location:pengurus.php");
