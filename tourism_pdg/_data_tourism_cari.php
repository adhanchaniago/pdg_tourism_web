<?php

	//UNTUK MENU PENCARIAN YANG ADA DI SIDEBAR 

	require '../connect.php';

	$tipe = $_GET["tipe"];		// Cari berdasarkan apa
	$nilai = $_GET["nilai"];	// Isi yang dicari

	/*
	ISI TIPE:
		1 => Nama
		2 => Alamat
		3 => Type
		4 => Fasilitas
	*/

	if ($tipe == 1) 
	{
		$querysearch = "SELECT id, name, st_x(st_centroid(geom)) as lng ,st_y(st_centroid(geom)) as lat  from tourism WHERE LOWER( name) LIKE  '%".$nilai."%';";
	} 
	elseif ($tipe == 2) 
	{
		$querysearch = "SELECT id, name, st_x(st_centroid(geom)) as lng ,st_y(st_centroid(geom)) as lat  from tourism where  LOWER(address) like '%".$nilai."%'";
	}
	elseif ($tipe == 3) 
	{
		$querysearch = "SELECT tourism.id, tourism.name, st_x(st_centroid(tourism.geom)) as lng ,st_y(st_centroid(tourism.geom)) as lat  from tourism left join tourism_type on tourism_type.id = tourism.id_type where tourism.id_type = '$nilai'";
	} 
	elseif ($tipe == 4) 
	{
		$querysearch = "SELECT tourism.id, tourism.name, st_x(st_centroid(tourism.geom)) as lng ,st_y(st_centroid(tourism.geom)) as lat  from tourism left join detail_facility_tourism on detail_facility_tourism.id_tourism=tourism.id left join facility_tourism on facility_tourism.id = detail_facility_tourism.id_facility where  LOWER(facility_tourism.name) like '%".$nilai."%'  GROUP BY (tourism.id)";
	} 
	elseif ($tipe == 5) 
	{
		$querysearch = "SELECT tourism.id, tourism.name, st_x(st_centroid(tourism.geom)) as lng ,st_y(st_centroid(tourism.geom)) as lat  from tourism left join detail_facility_tourism on detail_facility_tourism.id_tourism = tourism.id left join facility_tourism on facility_tourism.id = detail_facility_tourism.id_facility where facility_tourism.id = '$nilai'";
	}

	$hasil = mysqli_query($conn, $querysearch);
	
	while($baris = mysqli_fetch_array($hasil))
	{
		  $id=$baris['id'];
		  $name=$baris['name'];
		  $lng=$baris['lng'];
		  $lat=$baris['lat'];

		  $dataarray[]=array('id'=>$id,'name'=>$name,'lng'=>$lng,'lat'=>$lat);
	}
	echo json_encode ($dataarray);
?>