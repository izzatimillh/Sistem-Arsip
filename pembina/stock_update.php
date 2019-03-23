<?php 
include '../koneksi.php';

$id = $_POST['id'];
$qty_actual = $_POST['qty_actual'];

mysqli_query($koneksi, "UPDATE stock SET stock_qty_actual='$qty_actual' WHERE stock_id='$id'")or die(mysqli_errno());

header("location:stock.php");