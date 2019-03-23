<?php 
include '../koneksi.php';

$id = $_POST['id'];
$item_code = $_POST['item_code'];
$section = $_POST['section'];
$loc_code = $_POST['loc_code'];
$process_code = $_POST['process_code'];
$qty_theory = $_POST['qty_theory'];
$qty_actual = $_POST['qty_actual'];
$date = $_POST['date'];
$idouhyo_no = $_POST['idouhyo_no'];

if($qty_actual == 0){
	$variant = 0;
}else{
	$variant = $qty_actual - $qty_theory;
}

mysqli_query($koneksi, "UPDATE stock SET stock_item_code='$item_code', stock_section='$section', stock_loc_code='$loc_code', stock_process_code='$process_code', stock_qty_theory='$qty_theory', stock_qty_actual='$qty_actual', stock_qty_variant='$variant', stock_date='$date', stock_idouhyo_no='$idouhyo_no' WHERE stock_id='$id'")or die(mysqli_errno());

$tgl = date('d/m/Y',strtotime($date));

header("location:stock.php?tanggal=$tgl&section=$section");