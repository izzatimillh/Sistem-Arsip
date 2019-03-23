<?php 
include '../koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM admin WHERE id='$id'")or die("s");

header("location:admin.php");