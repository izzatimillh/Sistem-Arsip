<?php 
include '../koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi,"DELETE FROM artikel WHERE artikel_id='$id'");
header("location:artikel.php");
?>