<?php

	//MENGITUNG RATA-RATA RATING OBJEK WISATA

	require '../connect.php';
	$id = $_GET["id"];

	$querysearch ="SELECT id_ow AS id, count(*) as review, AVG(rating) AS rating FROM review where id_ow='$id'";
				   
	$result=mysqli_query($conn, $querysearch);

	while($row = mysqli_fetch_array($result))
	{
		$id_ow=$row['id'];
		$rating=$row['rating'];
		$review=$row['review'];

		$dataarray[]=array('id'=>$id_ow, 'rating'=>$rating,'review'=>$review);
	}
	echo json_encode ($dataarray);
?>