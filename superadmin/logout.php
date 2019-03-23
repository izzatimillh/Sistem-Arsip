<?php 
session_start();
session_destroy();

header("location:../superadmin.php?alert=logout");
?>