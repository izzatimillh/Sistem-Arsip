<?php 
include '../koneksi.php';
$nim  = $_POST['nim'];
$data = mysqli_query($koneksi,"select * from mahasiswa where mahasiswa_nim='$nim'");
if(mysqli_num_rows($data)>0){
	header("location:mahasiswa.php?pesan=gagal");
}else{
	mysqli_query($koneksi, "insert into mahasiswa (mahasiswa_id,mahasiswa_nim) values(null,'$nim')");
	header("location:mahasiswa.php");
}
