<?php
  $lat = $_GET['lat'];
  $long = $_GET['long'];

  if($lat == "")
  {
    $lat=-0.9478796428309669;
  }
  if($long == "")
  {
    $long=100.41658474111512;
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>    
    <style type="text/css">
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }

      /* Optional: Makes the sample page fill the window. */
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>

    <div id="map"></div>

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script> 
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVE&callback=initMobile"
      defer></script> 
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/jquery-1.8.3.min.js"></script>
    <script src="../_map.js"></script>
    <script type="text/javascript">
      var lat = <?php echo $lat; ?>;
      var long = <?php echo $long; ?>;

     function initMobile()
     {
        map = new google.maps.Map(document.getElementById('map'), 
        {
          zoom: 12,
          center: new google.maps.LatLng(lat,long),
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var marker = new google.maps.Marker({
        position: {lat: lat, lng: long},
        animation: google.maps.Animation.DROP,
        map: map});

        marker.info = new google.maps.InfoWindow({
        content: "<center><a style='color:black;'>You at Here <br> lat : "+lat+"<br> long :"+long+" </a></center>",
        pixelOffset: new google.maps.Size(0, -1)
        });
        
        marker.info.open(map, marker);  
        kecamatanTampil();
      }
    </script>
  </body>
</html>