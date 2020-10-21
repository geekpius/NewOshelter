
let marker;

var autocomplete;
autocomplete= new google.maps.places.Autocomplete((document.getElementById("search_input")), {
  types: ['geocode']
});




$('#min_price, #max_price').keypress(function(event) {
  if (((event.which != 46 || (event.which == 46 && $(this).val() == '')) ||
          $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
      event.preventDefault();
  }
}).on('paste', function(event) {
  event.preventDefault();
});

$("#formSearch").on('submit', function(e){
  e.stopPropagation();
  if($("#location").val()==''){
      return false;
  }else{
      return true;
  }
  return false;
});

$("#formSearch #location, #formSearch status").on('keydown', function(e){
  e.stopPropagation();
  if(e.which==13){
      $("#formSearch").trigger("submit");
  }
});