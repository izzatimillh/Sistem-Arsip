<?php 
include '../koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$section = $_POST['section'];
$password = $_POST['password'];


if($password == ""){
	mysqli_query($koneksi, "UPDATE admin SET nama='$nama', username='$username', section='$section' WHERE id='$id'")or die(mysqli_errno());
}else{
	$password = md5($_POST['password']);
	mysqli_query($koneksi, "UPDATE admin SET nama='$nama', username='$username', section='$section', password='$password' WHERE id='$id'")or die(mysqli_errno());
}

header("location:admin.php");