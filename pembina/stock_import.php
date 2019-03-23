<?php
session_start();

include '../koneksi.php';


$allowedExts = array("xls", "xlsx", "csv");
$nama_file = $_FILES["filestock"]["name"];
$pecahkan = explode(".", $nama_file);
$extension = end($pecahkan);
$tanggal = $_POST['tanggal'];
// echo $extension;
$t = explode("/", $tanggal);
$tanggal_fix = $t[2].'-'.$t[1].'-'.$t[0];

if(in_array($extension, $allowedExts)){

	$target = basename($_FILES['filestock']['name']) ;
	move_uploaded_file($_FILES['filestock']['tmp_name'], $target);

	/** Include path **/
	set_include_path(get_include_path() . PATH_SEPARATOR . '../../../Classes/');

	/** PHPExcel_IOFactory */
	include '../library/PHPExcel/IOFactory.php';


		// $inputFileName = './example2.csv';
	$inputFileName = $_FILES['filestock']['name'];


		// echo 'Loading file ',pathinfo($inputFileName,PATHINFO_BASENAME),' using IOFactory to identify the format<br />';
	$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);

		// echo '<hr />';

	$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

	if($sheetData[1]['A'] == "ITM_CD" && $sheetData[1]['B'] == "MAIN_INP_CD" && $sheetData[1]['C'] == "LOT_NO" && $sheetData[1]['D'] == "QTY" && $sheetData[1]['E'] == "LOC_CD"){

		// cek format
		// cek apakah admin section sudah pernah import hari ini
		$tanggal = $tanggal_fix;
		$section_admin = $_SESSION['section'];
		$cek_upload_hariini = mysqli_query($koneksi,"SELECT * FROM stock WHERE stock_section='$section_admin' AND stock_date='$tanggal'");
		if(mysqli_num_rows($cek_upload_hariini) > 0){

			header("location:stock.php?alert=sudahimport");

		}else{

			$kosong=0;
			$berhasil=0;
			for($a=2;$a<=count($sheetData);$a++){
				$item_code = $sheetData[$a]['A'];
				$section = $_POST['section'];
				$loc_code = $sheetData[$a]['E'];
				$process_code = $sheetData[$a]['B'];
				$qty_theory = $sheetData[$a]['D'];
				$qty_actual = 0;
				$qty_variant = 0;
				$date = $tanggal;
				$idouhyo_no = $sheetData[$a]['C'];

				mysqli_query($koneksi,"INSERT INTO stock VALUES(NULL, '$item_code', '$section', '$loc_code', '$process_code', '$qty_theory', '$qty_actual', '$qty_variant', '$date', '$idouhyo_no')")or die(mysqli_error($koneksi));
				$berhasil++;

			}
			header("location:stock.php?alert=import&berhasil=$berhasil&kosong=$kosong");

		}
	}else{
		header("location:stock.php?alert=salahformat");
	}

	unlink($inputFileName);


}else{

	header("location:stock.php?alert=gagal");

}



?>