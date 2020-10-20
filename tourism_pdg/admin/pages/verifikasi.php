<?php

	include ('../../../connect.php');

	$edit = mysqli_query($conn, "UPDATE admin SET role = 'C' WHERE username = '$_GET[user]'");

	if($edit)
	{
		header('location:http://gissurya.org/index.php');
	}

?>
