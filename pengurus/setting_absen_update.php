<?php 
include '../koneksi.php';
$id = $_POST['id'];
$mahasiswa = $_POST['mahasiswa'];
$keterangan = $_POST['keterangan'];

for($i=0;$i<count($mahasiswa);$i++){
	mysqli_query($koneksi, "update absen_kegiatan set absen_keterangan='$keterangan[$i]' where absen_kegiatan='$id' and absen_mahasiswa='$mahasiswa[$i]'");
	header("location:setting_absen.php");
}


?>