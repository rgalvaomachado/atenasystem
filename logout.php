<?php
echo "OI";
	session_start();
	$_SESSION['usuario'] =  "";
	$_SESSION['modo'] = "";
	session_destroy();
	header('location:../index.php');
?>
