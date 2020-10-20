<?php   
      
      require '../connect.php';

      $cari = $_GET["cari"];

      $querysearch = "SELECT event_tourism.id_event, event_tourism.tourism_id, event_tourism.nama_event, event_tourism.date_start, event_tourism.date_end, event_tourism.description, event_tourism.contact_person, tourism.name AS tourism_name From event_tourism LEFT JOIN tourism ON tourism.id = event_tourism.tourism_id WHERE id_event = '$cari'";              

      $hasil = mysqli_query($conn, $querysearch);

      while($baris = mysqli_fetch_array($hasil))
      {
            $id_event = $baris['id_event'];
            $tourism_id = $baris['tourism_id'];
            $nama_event = $baris['nama_event'];
            $date_start = $baris['date_start'];
            $date_end = $baris['date_end'];
            $desc = $baris['description'];
            $cp = $baris['contact_person'];
            $tourism_name = $baris['tourism_name'];

            $dataarray[] = array('id_event'=>$id_event,'tourism_id'=>$tourism_id,'nama_event'=>$nama_event,'date_start'=>$date_start, 'date_end'=>$date_end,'description'=>$desc,'contact_person'=>$cp,'tourism_name'=>$tourism_name);
      }

      //GALLERY EVENT POP UP

      $query_gallery = "SELECT serial_number, gallery_event FROM event_gallery where id_event = '".$cari."' "; 

      $hasil2 = mysqli_query($conn, $query_gallery);

      while($baris = mysqli_fetch_array($hasil2))
      {
          $serial_number = $baris['serial_number'];
          $gallery_event = $baris['gallery_event'];
          $data_gallery[] = array('serial_number'=>$serial_number,'gallery_event'=>$gallery_event);
      }
      $arr=array("data"=>$dataarray, "gallery"=>$data_gallery);
      echo json_encode($arr);
?>