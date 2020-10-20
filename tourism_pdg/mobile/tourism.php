<?php
require '../../connect.php';
// $querysearch="	SELECT row_to_json(fc) 
// 				FROM ( SELECT 'FeatureCollection' As type, array_to_json(array_agg(f)) As features 
// 				FROM (SELECT 'Feature' As type , ST_AsGeoJSON(a.geom)::json As geometry , row_to_json((SELECT l 
// 				FROM (SELECT a.name,ST_X(ST_Centroid(a.geom)) AS lon, ST_Y(ST_CENTROID(a.geom)) As lat) As l )) As properties 
// 				FROM tourism As a  
// 				) As f ) As fc
// 			  ";

// $hasil=mysqli_query($conn, $querysearch);
// while($data=mysqli_fetch_array($hasil))
// 	{
// 		$load=$data['row_to_json'];
// 	}
// 	echo $load;


$querysearch = "select St_AsGeoJSON(geom) as geom ,id, name,  ST_X(ST_Centroid(geom)) AS lng, ST_Y(ST_CENTROID(geom)) As lat from district order by id ASC";
$result = mysqli_query($conn, $querysearch);
$hasil = array(
	'type'	=> 'FeatureCollection',
	'features' => array()
	);
while ($isinya = mysqli_fetch_assoc($result)) {
	$features = array(
		'type' => 'Feature',
		'geometry' => json_decode($isinya['geom']),
		
		'properties' => array(
			'id' => $isinya['id'],
			'name' => $isinya['name'],
        
            'lat' => $isinya['lat'],
			'lng' => $isinya['lng']
			)
		);
	array_push($hasil['features'], $features);
}
echo json_encode($hasil);

?>