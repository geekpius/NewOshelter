
let marker;


function initMap(latitude, longitude) {        
  const myLatLng = { lat: latitude, lng: longitude };
  const map = new google.maps.Map(document.getElementById("gmaps-markers"), {
    zoom: 17,
    center: myLatLng,
  });

  marker = new google.maps.Marker({
    position: myLatLng,
    map,
    animation: google.maps.Animation.DROP,
    title: $("#propertyTitle").text(),
    icon: $("#propertyTitle").data('image'),
  });

  google.maps.event.addListener(marker, 'dragend', function(){
      var near_place = marker.getPosition();
      document.getElementById('latitude_input').value = near_place.lat();
      document.getElementById('longitude_input').value = near_place.lng();
      
      initMap(near_place.lat(), near_place.lng());
  });

}


initMap(parseFloat($("#gmaps-markers").data('latitude')), parseFloat($("#gmaps-markers").data('longitude')));
