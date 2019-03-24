<?php 
include '../koneksi.php';
$kegiatan = $_POST['kegiatan'];
$mahasiswa = $_POST['mahasiswa'];


$data = mysqli_query($koneksi, "select * from kegiatan where kegiatan_id='$kegiatan'");
$d = mysqli_fetch_assoc($data);
$tanggal = $d['kegiatan_tanggal'];
mysqli_query($koneksi, "delete from absen_kegiatan where absen_kegiatan='$kegiatan'");

if($mahasiswa==""){
	header("location:setting_absen.php?gagal");
}else{
	for($i=0;$i<count($mahasiswa);$i++){					
		mysqli_query($koneksi, "insert into absen_kegiatan values('','$tanggal','$mahasiswa[$i]','$kegiatan','alpa')");
		header("location:setting_absen.php");
	}

}

