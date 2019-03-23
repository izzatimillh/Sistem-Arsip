<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$nama  = $_POST['nama'];
$username = $_POST['username'];
$pwd = $_POST['password'];
$password = md5($_POST['password']);

// cek gambar
$rand = rand();
$allowed =  array('gif','png','jpg');
$filename = $_FILES['foto']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if($pwd=="" && $filename==""){
	mysqli_query($koneksi, "update pengurus set pengurus_nama='$nama', pengurus_username='$username' where pengurus_id='$id'");
	header("location:pengurus.php");
}elseif($pwd==""){
	if(!in_array($ext,$allowed) ) {
		header("location:pengurus.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/pengurus/'.$rand.'_'.$filename);
		$x = $rand.'_'.$filename;
		mysqli_query($koneksi, "update pengurus set pengurus_nama='$nama', pengurus_username='$username', pengurus_foto='$x' where pengurus_id='$id'");		
		header("location:pengurus.php?alert=berhasil");
	}
}elseif($filename==""){
	mysqli_query($koneksi, "update pengurus set pengurus_nama='$nama', pengurus_username='$username', pengurus_password='$password' where pengurus_id='$id'");
	header("location:pengurus.php");
}

