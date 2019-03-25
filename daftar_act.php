<?php 

include 'koneksi.php';

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$fakultas = $_POST['fakultas'];
$jurusan = $_POST['jurusan'];
$alamat = $_POST['alamat'];
$alamat_sekarang = $_POST['alamat_sekarang'];
$no_telpon = $_POST['no_telpon'];
$no_wa = $_POST['no_wa'];
$no_ortu = $_POST['no_ortu'];
$agama = $_POST['agama'];
$foto = $_FILES['foto'];
$username = $_POST['username'];
$password = md5($_POST['password']);


// cek apakah nim tersedia?
$cek_nim = mysqli_query($koneksi,"SELECT * FROM mahasiswa WHERE mahasiswa_nim='$nim'");
if(mysqli_num_rows($cek_nim) > 0){

  $cek_mahasiswa = mysqli_query($koneksi,"SELECT * FROM mahasiswa WHERE mahasiswa_nim='$nim' AND mahasiswa_username!='' AND mahasiswa_password!=''");
  if(mysqli_num_rows($cek_mahasiswa) > 0){
    // sudah pernah mendaftar
    header("location:daftar.php?alert=sudahdaftar");
  }else{

    // cek gambar
    $ekstensi_diperbolehkan = array('png','jpg','jpeg');
    $nama_file = $_FILES['foto']['name'];
    $x = explode('.', $nama_file);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['foto']['tmp_name'];

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
      $nm = rand().$nama_file;
      move_uploaded_file($file_tmp, 'gambar/mahasiswa/'.$nm);
      mysqli_query($koneksi,"UPDATE mahasiswa SET mahasiswa_nama='$nama', mahasiswa_fakultas='$fakultas', mahasiswa_jurusan='$jurusan', mahasiswa_alamat='$alamat', mahasiswa_alamat_sekarang='$alamat_sekarang', mahasiswa_no_telpon='$no_telpon', mahasiswa_no_wa='$no_wa', mahasiswa_no_ortu='$no_ortu', mahasiswa_agama='$agama', mahasiswa_foto='$nm', mahasiswa_username='$username', mahasiswa_password='$password' WHERE mahasiswa_nim='$nim'");
      //mysqli_query($koneksi,"INSERT INTO mahasiswa VALUES(NULL,'$nim','$nama','$fakultas','$jurusan','$alamat','$alamat_sekarang','$no_telpon','$no_wa','$no_ortu','$agama','$nm','$username','$password')");
      header("location:daftar.php?alert=terdaftar");
    }else{
      header("location:daftar.php?alert=foto");
    }

  }
}else{
// tidak terdaftar
  header("location:daftar.php?alert=tidakterdaftar");
}

?>