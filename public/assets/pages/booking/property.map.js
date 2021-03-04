
let marker;
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

$("#datatable tbody").on('click', '.btnViewLocation', function(){
  var $this = $(this);
  $("#locationModal .modal-title").text($this.data('title'));
  let latitude = $this.data('lat');
  let longitude = $this.data('lng');
  initMap(Number(latitude), Number(longitude));
  $("#locationModal").modal('show');
  return false;
});

$("#datatable1 tbody").on('click', '.btnViewLocation', function(){
  var $this = $(this);
  $("#locationModal .modal-title").text($this.data('title'));
  let latitude = $this.data('lat');
  let longitude = $this.data('lng');
  initMap(Number(latitude), Number(longitude));
  $("#locationModal").modal('show');
  return false;
});
