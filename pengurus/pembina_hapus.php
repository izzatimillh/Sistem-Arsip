<?php 
include '../koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi, "select * from pembina where pembina_id='$id'");
$d = mysqli_fetch_assoc($data);
$foto = $d['pembina_foto'];
unlink("../gambar/pembina/$foto");
mysqli_query($koneksi, "delete from pembina where pembina_id='$id'");
header("location:pembina.php");
