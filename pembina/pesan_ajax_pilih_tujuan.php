<?php 
include '../koneksi.php';

session_start();

$idd = $_SESSION['id'];
$login = $_SESSION['login'];
$tujuan = $_POST['tujuan'];
$where = $tujuan."_id";

if($login == $tujuan){
	$data = mysqli_query($koneksi,"SELECT * FROM $tujuan WHERE $where!='$idd'");
}else{
	$data = mysqli_query($koneksi,"SELECT * FROM $tujuan");
}
?>

<div class="form-group">
	<label>Kepada</label>
	<select name="id_tujuan" class="form-control" required="required">
		<option value=""> - Pilih <?php echo $tujuan ?> - </option>
		<?php 
		while($d = mysqli_fetch_array($data)){
			?>
			<option value="<?php echo $d[0] ?>"><?php if($tujuan=="mahasiswa"){echo $d[2];}else{echo $d[1];} ?></option>
			<?php 
		}
		?>
	</select>
</div>