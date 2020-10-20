var latLng = new google.maps.LatLng(-0.9478796428309669,100.41658474111512);

let initCurrent = ()=>{

           
   map = new google.maps.Map(document.getElementById('map'), 
        {
            zoom: 11,
            center: new google.maps.LatLng(-0.9478796428309669,100.41658474111512),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

    marker = new google.maps.Marker({
      position: latLng,
      title: 'Your Position',
      map: map,
      draggable: false
    });

    infowindow = new google.maps.InfoWindow({
      position: latLng,
      disableAutoPan: true,
      content: "<a style='color:black;'>You Are Here</a> "
    });
    infowindow.open(map, marker);

    kecamatanTampil(); 
}

 let initManualPosition = () => {
    console.log("adasf");

    map = new google.maps.Map(document.getElementById('map'), 
          {
              zoom: 11,
              center: new google.maps.LatLng(-0.9478796428309669,100.41658474111512),
              mapTypeId: google.maps.MapTypeId.ROADMAP
          }); 
    
     marker = new google.maps.Marker({
        position: latLng,
        title: 'Your Position',
        map: map,
        draggable: true
      });

      infowindow = new google.maps.InfoWindow({
        position: latLng,
        disableAutoPan: true,
        content: "<a style='color:black;'>You Are Here</a> "
      });
      infowindow.open(map, marker);
     // marker.draggable = true;
     console.log("ini jalan nggak?");

    DraggerListener();
  }





function geocodePosition(pos,infoWindow) {
  var geocoder = new google.maps.Geocoder();
  geocoder.geocode({
    latLng: pos
  }, function(responses) {
    if (responses && responses.length > 0) {
      //console.log(marker);
      console.log(infowindow);
      infowindow.setContent(responses[0].formatted_address);
      updateMarkerAddress(responses[0].formatted_address);

    } else {
      updateMarkerAddress('Cannot determine address at this location.');
    }
  });
}

function updateMarkerStatus(str) {
  //infowindow.setContent(str);
  // B4A.CallSub('Marker_Dragging', true, str);
}

function updatemarker(latLng) {
  // document.getElementById('info').innerHTML = [
  //  latLng.lat(),
  //  latLng.lng()
  // ].join(', ');
}

function updateMarkerAddress(str) {
  // document.getElementById('address').innerHTML = str;
  //B4A.CallSub('Marker_Address', true, str);
  //marker.info.setContent(str);

}

function DraggerListener(){
  google.maps.event.addListener(marker, 'dragstart', function() {
    updateMarkerAddress('Dragging...');
  });

  google.maps.event.addListener(marker, 'drag', function() {
    updateMarkerStatus('Dragging...');
    updatemarker(marker.getPosition());
    infowindow.setContent('Dragging...');
    infowindow.open(map,marker);
  });

  google.maps.event.addListener(marker, 'dragend', function() {
    updateMarkerStatus('Drag ended');
    geocodePosition(marker.getPosition(),infowindow);
    console.log( marker.getPosition().lat()+" | "+marker.getPosition().lng());
    var latnow = marker.getPosition().lat().toString();
    var lngnow = marker.getPosition().lng().toString();
    console.log(latnow+"|"+lngnow);
    //  call the B4A Sub Marker_DragEnd passing the Marker's new position
    // B4A.CallSub('Marker_DragEnd', true, latnow, lngnow);
    //B4A.CallSub('Marker_DragEnd', true, marker.getPosition().lat(), marker.getPosition().lng());
  });
}