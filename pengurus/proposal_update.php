<?php 
include '../koneksi.php';
$id = $_POST['id'];
$judul = $_POST['judul'];

$rand = rand();
$allowed =  array('docx','xlsx','pptx','pdf');
$filename = $_FILES['proposal']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if($filename==""){
	mysqli_query($koneksi,"UPDATE proposal SET proposal_judul='$judul' where proposal_id='$id'");
	header("location:proposal.php");
}else{
	if(!in_array($ext,$allowed) ) {
		header("location:proposal.php?alert=gagal");
	}else{
		$cek = mysqli_query($koneksi,"select * from proposal where proposal_id='$id'");
		$c = mysqli_fetch_assoc($cek);
		$file_hapus = $c['proposal_file'];
		unlink("../file/proposal/$file_hapus");

		move_uploaded_file($_FILES['proposal']['tmp_name'], '../file/proposal/'.$rand.'_'.$filename);
		$x = $rand.'_'.$filename;
		mysqli_query($koneksi, "UPDATE proposal SET proposal_judul='$judul', proposal_file='$x' WHERE proposal_id='$id'");
		header("location:proposal.php");		
	}
}



?>