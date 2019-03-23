<?php 
include '../koneksi.php';

$nama = $_POST['nama'];
$username = $_POST['username'];
$section = $_POST['section'];
$password = md5($_POST['password']);

mysqli_query($koneksi, "INSERT INTO admin VALUES(NULL,'$nama','$username','$password', '$section')")or die(mysqli_errno());

header("location:admin.php");