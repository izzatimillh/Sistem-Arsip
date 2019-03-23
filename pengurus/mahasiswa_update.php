<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$nama  = $_POST['nama'];
$fakultas  = $_POST['fakultas'];
$jurusan  = $_POST['jurusan'];
$alamat  = $_POST['alamat'];
$alamat_sekarang  = $_POST['alamat_sekarang'];
$no_telpon  = $_POST['no_telpon'];
$no_wa  = $_POST['no_wa'];
$no_ortu  = $_POST['no_ortu'];
$agama  = $_POST['agama'];
$username  = $_POST['username'];
$pwd  = $_POST['password'];
$password  = md5($_POST['password']);



// cek gambar
$rand = rand();
$allowed =  array('gif','png','jpg');
$filename = $_FILES['foto']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if($pwd=="" && $filename==""){
	mysqli_query($koneksi,"update mahasiswa set mahasiswa_nama='$nama',mahasiswa_fakultas='$fakultas',mahasiswa_jurusan='$jurusan',mahasiswa_alamat='$alamat',mahasiswa_alamat_sekarang='$alamat_sekarang',mahasiswa_no_telpon='$no_telpon',mahasiswa_no_wa='$no_wa',mahasiswa_no_ortu='$no_ortu',mahasiswa_agama='$agama',mahasiswa_username='$username' where mahasiswa_id='$id'");
	header("location:mahasiswa.php");

}elseif($pwd==""){
	if(!in_array($ext,$allowed) ) {
		header("location:mahasiswa.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/mahasiswa/'.$rand.'_'.$filename);
		$x = $rand.'_'.$filename;
		mysqli_query($koneksi,"update mahasiswa set mahasiswa_nama='$nama',mahasiswa_fakultas='$fakultas',mahasiswa_jurusan='$jurusan',mahasiswa_alamat='$alamat',mahasiswa_alamat_sekarang='$alamat_sekarang',mahasiswa_no_telpon='$no_telpon',mahasiswa_no_wa='$no_wa',mahasiswa_no_ortu='$no_ortu',mahasiswa_agama='$agama',mahasiswa_foto='$x',mahasiswa_username='$username' where mahasiswa_id='$id'");
	header("location:mahasiswa.php");
	}
}elseif($filename==""){
	mysqli_query($koneksi,"update mahasiswa set mahasiswa_nama='$nama',mahasiswa_fakultas='$fakultas',mahasiswa_jurusan='$jurusan',mahasiswa_alamat='$alamat',mahasiswa_alamat_sekarang='$alamat_sekarang',mahasiswa_no_telpon='$no_telpon',mahasiswa_no_wa='$no_wa',mahasiswa_no_ortu='$no_ortu',mahasiswa_agama='$agama',mahasiswa_username='$username',mahasiswa_password='$password' where mahasiswa_id='$id'");
	header("location:mahasiswa.php");
}else{
	if(!in_array($ext,$allowed) ) {
		header("location:mahasiswa.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/mahasiswa/'.$rand.'_'.$filename);
		$x = $rand.'_'.$filename;
		mysqli_query($koneksi,"update mahasiswa set mahasiswa_nama='$nama',mahasiswa_fakultas='$fakultas',mahasiswa_jurusan='$jurusan',mahasiswa_alamat='$alamat',mahasiswa_alamat_sekarang='$alamat_sekarang',mahasiswa_no_telpon='$no_telpon',mahasiswa_no_wa='$no_wa',mahasiswa_no_ortu='$no_ortu',mahasiswa_agama='$agama',mahasiswa_foto='$x',mahasiswa_username='$username',mahasiswa_password='$password' where mahasiswa_id='$id'");
	header("location:mahasiswa.php");
	}
}
