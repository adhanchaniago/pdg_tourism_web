<?php

  //MENAMPILKAN SELURUH LIST OBJEK WISATA

  include("../connect.php");

  $querysearch = "SELECT id, name, ST_X(ST_Centroid(geom)) AS lng, ST_Y(ST_CENTROID(geom)) As lat FROM tourism ORDER BY id ASC";

  $result = mysqli_query($conn, $querysearch);
  // echo "test";
  while($baris = mysqli_fetch_array($result))
  {
      $id = $baris['id'];
      $nama = $baris['name'];
      $lng = $baris['lng'];
	    $lat = $baris['lat'];
	    
      $dataarray[]=array('id'=>$id,'name'=>$nama,'lng'=>$lng,'lat'=>$lat);
	// echo "test";
  }
  echo json_encode ($dataarray);

?>

