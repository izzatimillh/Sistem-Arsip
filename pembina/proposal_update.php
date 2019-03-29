<?php 
include '../koneksi.php';
session_start();
$pembina = $_SESSION['id'];
$id = $_POST['id'];
$keterangan = $_POST['keterangan'];
$ttd = $_POST['ttd'];


mysqli_query($koneksi, "update proposal set proposal_pembina='$pembina', proposal_keterangan='$keterangan', proposal_tgl_ttd='$ttd' where proposal_id='$id'");
header("location:proposal.php");

?>