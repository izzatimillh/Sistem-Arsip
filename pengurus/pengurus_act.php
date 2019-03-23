<?php 
include '../koneksi.php';
$nama  = $_POST['nama'];
$username = $_POST['username'];
$password = md5($_POST['password']);

$rand = rand();
$allowed =  array('gif','png','jpg');
$filename = $_FILES['foto']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
if(!in_array($ext,$allowed) ) {
	header("location:pengurus.php?alert=gagal");
}else{
	move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/pengurus/'.$rand.'_'.$filename);
	$x = $rand.'_'.$filename;
	mysqli_query($koneksi, "insert into pengurus values (NULL,'$nama','$username','$password','$x')");
	header("location:pengurus.php");
}





// mysqli_query($koneksi, "UPDATE admin SET password='$password' WHERE id='$id'")or die(mysqli_errno());

// header("location:gantipassword.php?alert=sukses");