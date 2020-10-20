<?php
session_start();

include ('../../../connect.php');

$id_info = $_GET['id_informasi'];
$tourism_id = $_GET['tourism_id'];

//echo "$id_info --> id_info";

	$sql1   = "DELETE FROM information_admin WHERE id_informasi = $id_info";

	$delete1 = mysqli_query($conn, $sql1);

	if($delete1)
	{
		echo "<script>alert ('Data Successfully Delete');</script>";
	}
	else
	{
		echo "<script>alert ('Error');</script>";
	}

	// echo "<script>
	// eval(\"parent.location='../?page=home'\");
	// </script>";
	
	if($_SESSION['A']===true)
	{
		//echo "<script>eval(\"location:../?page=hotel_detail&id=$tourism_id\");</script>";
		echo '<meta http-equiv="REFRESH" content="0.1;url=../?page=tourism_detail&id='.$tourism_id.'">';
	}
	else
	{
		//echo "<script>eval(\"location:../indexu.php?page=hotel_detail&id=$tourism_id\");</script>";
		echo '<meta http-equiv="REFRESH" content="0.1;url=../indexu.php?page=tourism_detail&id='.$tourism_id.'">';
	}
?>