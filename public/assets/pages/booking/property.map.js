
let marker;
let latitude = document.getElementById("gmaps-markers").getAttribute('data-lat');
let longitude = document.getElementById("gmaps-markers").getAttribute('data-lng');

function initMap(latitude, longitude) {        
  const myLatLng = { lat: latitude, lng: longitude };
  const map = new google.maps.Map(document.getElementById("gmaps-markers"), {
    zoom: 20,
    center: myLatLng,
  });

  marker = new google.maps.Marker({
    position: myLatLng,
    draggable: true,
    map,
  });

}

initMap(Number(latitude), Number(longitude));
