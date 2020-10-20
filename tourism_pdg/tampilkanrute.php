<?php
	require '../connect.php';
	// $id_angkot=$_GET['id_angkot'];
	// $querysearch="	SELECT row_to_json(fc) 
	// 				FROM ( SELECT 'FeatureCollection' As type, array_to_json(array_agg(f)) As features 
	// 				FROM (SELECT 'Feature' As type , ST_AsGeoJSON(a.geom)::json As geometry , row_to_json((SELECT l 
	// 				FROM (SELECT a.id, a.destination,  a.track, a.cost, b.color, a.route_color, ST_X(ST_Centroid(a.geom)) AS longitude, ST_Y(ST_CENTROID(a.geom)) As latitude) As l )) As properties 
	// 				FROM angkot As a left join angkot_color as b on b.id=a.id_color
	// 				where a.id='$id_angkot'
	// 				) As f ) As fc 
	// 			  ";

	// $hasil=mysqli_query($conn, $querysearch);
	// while($data=mysqli_fetch_array($hasil))
	// 	{
	// 		$load=$data['row_to_json'];
	// 	}
	// 	echo $load;

	$querysearch = "SELECT St_AsGeoJSON(geom) AS geom ,id, destination,  ST_X(ST_Centroid(geom)) AS lng, ST_Y(ST_CENTROID(geom)) AS lat from angkot ORDER BY id ASC";

	$result = mysqli_query($conn, $querysearch);
	$hasil = array(
		'type'	=> 'FeatureCollection',
		'features' => array()
		);

	while ($isinya = mysqli_fetch_assoc($result)) 
	{
		$features = array(
			'type' => 'Feature',
			'geometry' => json_decode($isinya['geom']),
			
			'properties' => array(
				'id' => $isinya['id'],
				'destination' => $isinya['destination'],
	        
	            'lat' => $isinya['lat'],
				'lng' => $isinya['lng']
				)
			);
		array_push($hasil['features'], $features);
	}
	echo json_encode($hasil);


?>

