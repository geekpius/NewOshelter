
var autocomplete;
autocomplete= new google.maps.places.Autocomplete((document.getElementById("search_input")), {
  types: ['geocode']
});




$("#formSearch").on('submit', function(e){
  e.stopPropagation();
  var valid = true;
  $('#formSearch input').each(function() {
      var $this = $(this);
      
      if(!$this.val()) {
          valid = false;
      }
  });
  if(valid){
      return true;
  }
  return false;
});

$("#formSearch input, #formSearch select").on('keydown', function(e){
  e.stopPropagation();
  if(e.which==13){
      $("#formSearch").trigger("submit");
  }
});