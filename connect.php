<?php
	$host = "localhost"; 
	$user = "root";
	$pass = "iemam1429";
	$db   = "halal_tourism_join_5_modul";

	$conn = mysqli_connect($host, $user, $pass) or die ("GAGAL");
	mysqli_select_db($conn, $db); 
?>