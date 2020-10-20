<?php

	require '../connect.php';

	$rate = $_GET["rate"];
	date_default_timezone_set('Asia/Jakarta');

	$day = date("w");

	// PENCARIAN BERDASARKAN RATING OBJEK WISATA //

	if ($rate==1)
	{
		$querysearch = "SELECT tourism.id, tourism.name, geom, address, open, close, ticket,id_type, ST_X(ST_Centroid(geom)) AS lng, ST_Y(ST_CENTROID(geom)) As lat FROM review right join tourism on review.id_ow=tourism.id  group by tourism.id having avg(rating) <= $rate and avg(rating) > $rate-1 order by tourism.name";
	}else
	{
		$querysearch = "SELECT tourism.id, tourism.name, geom, address, open, close, ticket,id_type, ST_X(ST_Centroid(geom)) AS lng, ST_Y(ST_CENTROID(geom)) As lat FROM review right join tourism on review.id_ow=tourism.id  group by tourism.id having avg(rating) <= $rate and avg(rating) > $rate-1 order by tourism.name";
	}

	$result=mysqli_query($conn, $querysearch);
	while($row = mysqli_fetch_array($result))
		{
			$id = $row['id'];
			$name = $row['name'];
			$address = $row['address'];
			$open = $row['open'];
			$close = $row['close'];
			$ticket = $row['ticket'];
			$id_type = $row['id_type'];
			$lng = $row['lng'];
			$lat = $row['lat'];

			$dataarray[]=array('id'=>$id,'name'=>$name,'address'=>$address,'open'=>$open,'close'=>$close,'ticket'=>$ticket,'id_type'=>$id_type,'lng'=>$lng,'lat'=>$lat);
		}
	echo json_encode ($dataarray);
?>