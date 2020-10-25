<?php
  
  //MENAMPILKAN DETAIL INFORMASI OBJEK WISATA (DIDALAM gallery.php)

  require '../connect.php';

  $cari = $_GET["cari"];

      //DATA INFORMASI DETAIL
      $querysearch = "SELECT tourism.id, tourism.name, tourism.address, tourism.open, tourism.close, tourism.ticket, tourism_type.name as tourism_type, st_x(st_centroid(tourism.geom)) as lon, st_y(st_centroid(tourism.geom)) as lat from tourism left join tourism_type on tourism_type.id=tourism.id_type where tourism.id ='$cari'";              

      $hasil=mysqli_query($conn, $querysearch);

      while($baris = mysqli_fetch_array($hasil)){
            $id = $baris['id'];
            $name = $baris['name'];
            $address = $baris['address'];
            $open = $baris['open'];
            $close = $baris['close'];
            $ticket = $baris['ticket'];
            $tourism_type = $baris['tourism_type'];
            $longitude = $baris['lon'];
            $latitude = $baris['lat'];
            
            $dataarray[] = array('id'=>$id,'name'=>$name,'address'=>$address,'open'=>$open, 'close'=>$close,'ticket'=>$ticket,'tourism_type'=>$tourism_type,'longitude'=>$longitude,'latitude'=>$latitude);
      }

      //DATA GALLERY
      $query_gallery = "SELECT serial_number, gallery_tourism FROM tourism_gallery where id = '".$cari."' "; 
      
      $hasil2 = mysqli_query($conn, $query_gallery);
      
      while($baris = mysqli_fetch_array($hasil2)){
          $serial_number = $baris['serial_number'];
          $gallery_tourism = $baris['gallery_tourism'];
          $data_gallery[] = array('serial_number'=>$serial_number,'gallery_tourism'=>$gallery_tourism);
      }

      //DATA FASILITAS
      $query_fasilitas = 
                  "SELECT facility_tourism.id, facility_tourism.name 
                  FROM facility_tourism 
                  left join detail_facility_tourism on detail_facility_tourism.id_facility = facility_tourism.id 
                  left join tourism on tourism.id = detail_facility_tourism.id_tourism 
                  where tourism.id = '".$cari."' "; 
      
      $hasil3=mysqli_query($conn, $query_fasilitas);
      
      while($baris = mysqli_fetch_array($hasil3)){
          $id = $baris['id'];
          $name = $baris['name'];
          $data_fasilitas[] = array('id'=>$id,'name'=>$name);
      }

      //DATA EVENT
      $query_event = "SELECT event_tourism.id_event, event_tourism.tourism_id, event_tourism.nama_event, 
                              event_tourism.date_start, event_tourism.date_end, event_tourism.description, 
                              event_tourism.contact_person, tourism.name AS tourism_name From event_tourism 
                              LEFT JOIN tourism ON tourism.id = event_tourism.tourism_id WHERE tourism_id = '".$cari."'";
      $hasil4=mysqli_query($conn, $query_event);

      while($baris = mysqli_fetch_array($hasil4)){
          $date = $baris['date_start'];
          $name_event = $baris['nama_event'];
          $data_event[] = array('date_start'=>$date,'nama_event'=>$name_event);
      }         

      //DATA RATING
      $query_rating = "SELECT * from review where id_ow = '".$cari."' ORDER BY tanggal DESC";
      $hasil5 = mysqli_query($conn, $query_rating);

      while($baris = mysqli_fetch_array($hasil5)){
          $rating = $baris['rating'];
          $date_rate  = $baris['tanggal'];
          $name_user = $baris['name'];
          $comment = $baris['comment'];
          $data_rating[] = array('rating'=>$rating, 'tanggal'=>$date_rate,'name'=>$name_user, 'comment'=>$comment);
      }         

      //DATA INFO
      $query_info = "SELECT * from information_admin where id_ow = '".$cari."'";
      $hasil6 = mysqli_query($conn, $query_info);

      while($baris = mysqli_fetch_array($hasil6)){
          $date_info = $baris['tanggal'];
          $informasi = $baris['informasi'];
          $data_info[] = array('tanggal'=>$date_info,'informasi'=>$informasi);
      }                

      $arr=array("data"=>$dataarray, "gallery"=>$data_gallery, "fasilitas"=>$data_fasilitas, "Event"=>$data_event, "rating"=>$data_rating, "info"=>$data_info);
      echo json_encode($arr);

?>