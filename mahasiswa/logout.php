<?php 
session_start();
session_destroy();

header("location:../login_mahasiswa.php?alert=logout");
?>