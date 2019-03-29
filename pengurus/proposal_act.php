<?php 
include '../koneksi.php';

$judul  = $_POST['judul'];
$tgl_upload  = date('Y-m-d');
session_start();
$pengurus = $_SESSION['id'];

$rand = rand();
$allowed =  array('docx','xlsx','pptx','pdf');
$filename = $_FILES['proposal']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
if(!in_array($ext,$allowed) ) {
	header("location:proposal.php?alert=gagal");
}else{
	move_uploaded_file($_FILES['proposal']['tmp_name'], '../file/proposal/'.$rand.'_'.$filename);
	$x = $rand.'_'.$filename;
	mysqli_query($koneksi, "insert into proposal (proposal_id, proposal_judul, proposal_pengurus, proposal_file, proposal_tgl_upload) values (NULL,'$judul','$pengurus','$x','$tgl_upload')");
	header("location:proposal.php");
}





// mysqli_query($koneksi, "UPDATE admin SET password='$password' WHERE id='$id'")or die(mysqli_errno());

// header("location:gantipassword.php?alert=sukses");