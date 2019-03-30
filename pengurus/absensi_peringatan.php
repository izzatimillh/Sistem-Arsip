<?php 
include '../koneksi.php';
session_start();
$pengurus = $_SESSION['id'];
$mahasiswa = $_GET['id'];

$cek = mysqli_query($koneksi, "select * from peringatan where peringatan_mahasiswa='$mahasiswa'");
if(mysqli_num_rows($cek)>0){
	header("location:absensi.php?pesan=gagal");
}else{
	mysqli_query($koneksi, "insert into peringatan values('','$mahasiswa','$pengurus')");
	header("location:absensi.php");

}


?>