<?php

        // PENCARIAN OBJEK WISATA YANG MEMILIKI MESJID DAN RESTAURANT DI DALAM AREANYA //

        include("../connect.php");

        $p = "SELECT id_tourism FROM detail_facility_tourism WHERE id_facility='p'";
        $q = "SELECT id_tourism FROM detail_facility_tourism WHERE id_facility='q'";

        $result_p = mysqli_query($conn, $p);
        $result_q = mysqli_query($conn, $q);

        // $rsltp = mysqli_fetch_array($result_p);
        $rsltq = mysqli_fetch_array($result_q);

        // echo var_dump(array_diff($rsltp, $rsltq)); exit();
        // var_dump($rsltp[0]['id_tourism'], $rsltq[0]['id_tourism']); exit();
        while($baris_p = mysqli_fetch_array($result_p))
        {
          if(in_array($baris_p['id_tourism'], $rsltq));
          {
            $id_tourism = $baris_p['id_tourism'];
            
            $querysearch = "SELECT id, name, ST_Y(ST_Centroid(geom)) AS lat, ST_X(ST_Centroid(geom)) AS lng  FROM tourism WHERE id = '$id_tourism'";

            $result=mysqli_query($conn, $querysearch);

            while($baris = mysqli_fetch_array($result))
            {
                $id=$baris['id'];
                $nama=$baris['name'];
                $lng=$baris['lng'];
        		    $lat=$baris['lat'];
        		    
                $dataarray[]=array('id'=>$id,'name'=>$nama,'lng'=>$lng,'lat'=>$lat);
        		    // echo "test";
            }
          }
        }
        echo json_encode ($dataarray);

// $querysearch="select tourism.name, ST_X(ST_Centroid(geom)) AS lng, ST_Y(ST_CENTROID(geom)) As lat, 
//               detail_facility_tourism.id_tourism, detail_facility_tourism.id_facility FROM tourism 
//               left join detail_facility_tourism on tourism.id = detail_facility_tourism.id_tourism 
//               where detail_facility_tourism.id_facility = 'p' or detail_facility_tourism.id_facility= 'q'";

// $querysearch = "select distinct(t.name), t.id, ST_Y(ST_Centroid(geom)) as lat, ST_X(ST_Centroid(geom)) as lng  from tourism as t left join detail_facility_tourism as dft on t.id=dft.id_tourism inner join
// facility_tourism as ft on dft.id_facility=ft.id where ft.id = 'p' || ft.id = 'q'";


?>


