<?php

  //PENCARIAN OBJEK WISATA BERDASARKAN POSISI USER

	include('../connect.php');
    
  $latit = $_GET['lat'];
  $longi = $_GET['lng'];
	$rad=$_GET['rad']/1000;

  $querysearch = "SELECT
                        id, (
                          6371 * acos (
                            cos ( radians($latit) )
                            * cos( radians( ST_Y(ST_CENTROID(geom)) ) )
                            * cos( radians( ST_X(ST_CENTROID(geom)) ) - radians($longi) )
                            + sin ( radians($latit) )
                            * sin( radians( ST_Y(ST_CENTROID(geom)) ) )
                          )
                        ) AS jarak, name, ST_Y(ST_CENTROID(geom)) AS lat, ST_X(ST_CENTROID(geom)) AS lng
                      FROM tourism
                      HAVING jarak <= $rad";

	$hasil=mysqli_query($conn, $querysearch);

  while($baris = mysqli_fetch_array($hasil))
  {
      $id=$baris['id'];
      $name=$baris['name'];
      $jarak=$baris['jarak'];
      $lat=$baris['lat'];
      $lng=$baris['lng'];
      $dataarray[]=array('id'=>$id,'name'=>$name,'jarak'=>$jarak, "lat"=>$lat,"lng"=>$lng);
  }
  echo json_encode ($dataarray);
  
?>