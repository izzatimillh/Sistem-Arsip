<?php 
include '../koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi,"DELETE FROM qa WHERE qa_id='$id'");
header("location:qa.php");
?>