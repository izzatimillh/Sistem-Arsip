<?php 
include '../koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi,"delete from mahasiswa where mahasiswa_id='$id'");
header("location:mahasiswa.php");