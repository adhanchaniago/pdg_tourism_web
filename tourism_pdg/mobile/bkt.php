<!DOCTYPE html>
<html>
<head>
<meta name='viewport' content='initial-scale=1.0, user-scalable=no' /><style type='text/css'> 
html { height: 100%;width: 100% } 
body { height: 100%; width: 100%; margin: 0px; padding: 0px }
#map { height: 100%; width: 100% }
</style>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVE&sensor=true"></script>  
<script src='http://code.jquery.com/jquery-1.11.0.min.js' type='text/javascript'>
</script> 
<?php

$lat = -0.9478796428309669; 
$lng = 100.41658474111512; 

?> 

<script type='text/javascript'> 

 function init(){

    var latlng = new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $lng; ?>); 
    var myOptions = { zoom:13, center: latlng, mapTypeId: google.maps.MapTypeId.ROADMAP }; 
    var map = new google.maps.Map(document.getElementById('map'), myOptions);   
}

 function kecamatanTampil(){   // PENAMPILAN PEMBAGIAN KECAMATAN DI BUKITTINGGI
          kecamatan = new google.maps.Data();
          kecamatan.loadGeoJson(server+'kecamatan.php');
          kecamatan.setStyle(function(feature)
          {
            var gid = feature.getProperty('id');
            if (gid == 'K01'){ 
              return({
                fillColor:'#ff3300',
                strokeWeight:0.1,
                strokeColor:'#ff3300',
                fillOpacity: 0.3,
                clickable: false
              }); 
          }
            else if(gid == 'K02'){
              return({
                fillColor:'#ffd777',
                strokeWeight:0.1,
                strokeColor:'#ffd777',
                fillOpacity: 0.5,
                clickable: false
              });
          }
            else if(gid == 'K03'){
              return({
                fillColor:'#00b300' ,
                strokeWeight:0.1,
                strokeColor:'#00b300' ,
                fillOpacity:0.3,
                clickable: false
              });
          }
            else if(gid == 'K04'){
              return({
                fillColor:'#618685' ,
                strokeWeight:0.1,
                strokeColor:'#618685' ,
                fillOpacity: 0.5,
                clickable: false
              });
          }
            else if(gid == 'K05'){
              return({
                fillColor:'#337AFF' ,
                strokeWeight:0.1,
                strokeColor:'#337AFF' ,
                fillOpacity:0.3,
                clickable: false
              });
          }
            else if(gid == 'K06'){
              return({
                fillColor:'#FF9300' ,
                strokeWeight:0.1,
                strokeColor:'#FF9300' ,
                fillOpacity:0.3,
                clickable: false
              });
          }
            else if(gid == 'K07'){
              return({
                fillColor:'#FF00C1' ,
                strokeWeight:0.1,
                strokeColor:'#FF00C1' ,
                fillOpacity:0.3,
                clickable: false
              });
          }
            else if(gid == 'K08'){
              return({
                fillColor:'#FF0000' ,
                strokeWeight:0.1,
                strokeColor:'#FF0000' ,
                fillOpacity:0.3,
                clickable: false
              });
          }
            else if(gid == 'K09'){
              return({
                fillColor:'#04FF00' ,
                strokeWeight:0.1,
                strokeColor:'#04FF00' ,
                fillOpacity:0.3,
                clickable: false
              });
          }
            else if(gid == 'K10'){
              return({
                fillColor:'#EC00FF' ,
                strokeWeight:0.1,
                strokeColor:'#EC00FF' ,
                fillOpacity:0.3,
                clickable: false
              });
          }
            else if(gid == 'K11'){
              return({
                fillColor:'#0A0D85' ,
                strokeWeight:0.1,
                strokeColor:'#0A0D85' ,
                fillOpacity:0.3,
                clickable: false
              });         
          }
          });
          kecamatan.setMap(map);
        }
  
</script>

</head>
<body onload='init(); kecamatanTampil()'> 
<div id='map'></div>
</body>
</html>

