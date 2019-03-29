<?php 
session_start();
include '../koneksi.php';
$id = $_SESSION['id'];
$nim = $_POST['mahasiswa_nim'];
$nama = $_POST['mahasiswa_nama'];
$fakultas = $_POST['mahasiswa_fakultas'];
$jurusan = $_POST['mahasiswa_jurusan'];
$alamat = $_POST['mahasiswa_alamat'];
$alamat_sekarang = $_POST['mahasiswa_alamat_sekarang'];
$no_telpon = $_POST['mahasiswa_no_telpon'];
$no_wa = $_POST['mahasiswa_no_wa'];
$no_ortu = $_POST['mahasiswa_no_ortu'];
$agama = $_POST['mahasiswa_agama'];
$foto = $_FILES['mahasiswa_foto'];
$password = md5($_POST['mahasiswa_password']);

// cek gambar
if($_FILES['mahasiswa_foto']['name'] != ""){

  $ekstensi_diperbolehkan = array('png','jpg','jpeg');
  $nama_file = $_FILES['mahasiswa_foto']['name'];
  $x = explode('.', $nama_file);
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['mahasiswa_foto']['tmp_name'];

  if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
    $nm = rand().$nama_file;
    move_uploaded_file($file_tmp, '../gambar/mahasiswa/'.$nm);

    if($_POST['password'] == ""){
      mysqli_query($koneksi,"UPDATE mahasiswa SET mahasiswa_nama='$nama', mahasiswa_fakultas='$fakultas', mahasiswa_jurusan='$jurusan', mahasiswa_alamat='$alamat', mahasiswa_alamat_sekarang='$alamat_sekarang', mahasiswa_no_telpon='$no_telpon', mahasiswa_no_wa='$no_wa', mahasiswa_no_ortu='$no_ortu', mahasiswa_agama='$agama', mahasiswa_foto='$nm', WHERE mahasiswa_id='$id'");
    }else{
      mysqli_query($koneksi,"UPDATE mahasiswa SET mahasiswa_nama='$nama', mahasiswa_fakultas='$fakultas', mahasiswa_jurusan='$jurusan', mahasiswa_alamat='$alamat', mahasiswa_alamat_sekarang='$alamat_sekarang', mahasiswa_no_telpon='$no_telpon', mahasiswa_no_wa='$no_wa', mahasiswa_no_ortu='$no_ortu', mahasiswa_agama='$agama', mahasiswa_foto='$nm', mahasiswa_password='$password' WHERE mahasiswa_id='$id'");
    }
    header("location:index.php?alert=update");
  }else{
    header("location:profil_edit.php?alert=foto");
  }

}else{

  if($_POST['password'] == ""){
    mysqli_query($koneksi,"UPDATE mahasiswa SET mahasiswa_nama='$nama', mahasiswa_fakultas='$fakultas', mahasiswa_jurusan='$jurusan', mahasiswa_alamat='$alamat', mahasiswa_alamat_sekarang='$alamat_sekarang', mahasiswa_no_telpon='$no_telpon', mahasiswa_no_wa='$no_wa', mahasiswa_no_ortu='$no_ortu', mahasiswa_agama='$agama' WHERE mahasiswa_id='$id'");
  }else{
    mysqli_query($koneksi,"UPDATE mahasiswa SET mahasiswa_nama='$nama', mahasiswa_fakultas='$fakultas', mahasiswa_jurusan='$jurusan', mahasiswa_alamat='$alamat', mahasiswa_alamat_sekarang='$alamat_sekarang', mahasiswa_no_telpon='$no_telpon', mahasiswa_no_wa='$no_wa', mahasiswa_no_ortu='$no_ortu', mahasiswa_agama='$agama', mahasiswa_password='$password' WHERE mahasiswa_id='$id'");
  }
  header("location:index.php?alert=update");

}

?>