<?php 
include '../koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM stock WHERE stock_id='$id'")or die("s");

header("location:stock.php");