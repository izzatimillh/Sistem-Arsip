<?php 
include '../koneksi.php';

$id = $_POST['id'];
$qty_actual = $_POST['qty_actual'];
$x = mysqli_query($koneksi,"SELECT * from stock WHERE stock_id='$id'");
$xx = mysqli_fetch_assoc($x);

if($qty_actual == 0){
	$variant = 0;
}else{
	$variant = $qty_actual - $xx['stock_qty_theory'];
}


// echo $variant;
mysqli_query($koneksi, "UPDATE stock SET stock_qty_actual='$qty_actual', stock_qty_variant='$variant' WHERE stock_id='$id'")or die(mysqli_errno());

$tgl = date('d/m/Y',strtotime($xx['stock_date']));
$sec = $xx['stock_section'];
header("location:stock.php?tanggal=$tgl&section=$sec");