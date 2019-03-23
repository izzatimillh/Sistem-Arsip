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
	mysqli_query($koneksi, "update pembina set pembina_nama='$nama', pembina_username='$username' where pembina_id='$id'");
	header("location:pembina.php");
}elseif($pwd==""){
	if(!in_array($ext,$allowed) ) {
		header("location:pembina.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/pembina/'.$rand.'_'.$filename);
		$x = $rand.'_'.$filename;
		mysqli_query($koneksi, "update pembina set pembina_nama='$nama', pembina_username='$username', pembina_foto='$x' where pembina_id='$id'");		
		header("location:pembina.php?alert=berhasil");
	}
}elseif($filename==""){
	mysqli_query($koneksi, "update pembina set pembina_nama='$nama', pembina_username='$username', pembina_password='$password' where pembina_id='$id'");
	header("location:pembina.php");
}

