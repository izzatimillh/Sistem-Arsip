<?php 
include '../koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi, "select * from proposal where proposal_id='$id'");
$d = mysqli_fetch_assoc($data);
$file = $d['proposal_file'];
unlink("../file/proposal/$file");
mysqli_query($koneksi, "delete from proposal where proposal_id='$id'");
header("location:proposal.php");
