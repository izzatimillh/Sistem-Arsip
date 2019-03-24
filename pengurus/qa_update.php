<?php 
include '../koneksi.php';
$id = $_POST['id'];
$pertanyaan = $_POST['pertanyaan'];
$jawaban = $_POST['jawaban'];
$status = $_POST['status'];

mysqli_query($koneksi, "UPDATE qa SET qa_pertanyaan='$pertanyaan',qa_jawaban='$jawaban',qa_status='$status' WHERE qa_id='$id'");
header("location:qa.php?pesan=edit");

