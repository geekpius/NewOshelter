
let marker;

getLocation = function(){
  var lati = document.getElementById('latitude_input').value;
  var long = document.getElementById('longitude_input').value;
  if(lati=='' && long==''){
    if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(function(position){
          var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
          };
          let latitude = (pos.lat)? pos.lat:5.5739466;
          let longitude = (pos.lng)? pos.lng:-0.1428917;
          document.getElementById('latitude_input').value = latitude;
          document.getElementById('longitude_input').value = longitude;
          initMap(latitude, longitude);
        });
    }
  }else{
    let latitude = parseFloat(lati);
    let longitude = parseFloat(long);
    initMap(latitude, longitude);
  }
}
getLocation();

var autocomplete;
autocomplete= new google.maps.places.Autocomplete((document.getElementById("search_input")), {
  types: ['geocode']
});

google.maps.event.addListener(autocomplete, 'place_changed', function(){
  var near_place = autocomplete.getPlace();
  document.getElementById('latitude_input').value = near_place.geometry.location.lat();
  document.getElementById('longitude_input').value = near_place.geometry.location.lng();

  initMap(near_place.geometry.location.lat(), near_place.geometry.location.lng());
});

function initMap(latitude, longitude) {        
  const myLatLng = { lat: latitude, lng: longitude };
  const map = new google.maps.Map(document.getElementById("gmaps-markers"), {
    zoom: 17,
    center: myLatLng,
  });

  marker = new google.maps.Marker({
    position: myLatLng,
    draggable: true,
    map,
    title: $(".steps-container").data('name'),
  });

  google.maps.event.addListener(marker, 'dragend', function(){
      var near_place = marker.getPosition();
      document.getElementById('latitude_input').value = near_place.lat();
      document.getElementById('longitude_input').value = near_place.lng();
      
      initMap(near_place.lat(), near_place.lng());
  });

}
