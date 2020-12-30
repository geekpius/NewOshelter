// submit form
$("#formPropertyType").on("submit", function(e){
    e.stopPropagation();
    var valid = true;
    $('#formPropertyType input, #formPropertyType select').each(function() {
        var $this = $(this);
        
        if(!$this.val()) {
            valid = false;
            $this.parents('.validate').find('span').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
        }
    });

    if(valid){
        $(".btnMove").html('<i class="fa fa-spin fa-spinner"></i> Edit Your Listing Portfolio').attr('disabled',true);
        return true;
    }
    return false;
});


//remove error message if inputs are filled
$("input").on('input', function(){
    if($(this).val()!=''){
        $(this).parents('.validate').find('span').text('');
    }else{ $(this).parents('.validate').find('span').text('The '+$(this).attr('name').replace(/[\_]+/g, ' ')+' field is required'); }
});

$("select").on('change', function(){
    if($(this).val()!=''){
        $(this).parents('.validate').find('span').text('');
    }else{ 
        $(this).parents('.validate').find('span').text('The '+$(this).attr('name').replace(/[\_]+/g, ' ')+' field is required');
    }
});


// check if property type is hostel on document load
if($("#formPropertyType select[name='property_type']").val()=='hostel'){
    $('#property_type_status option:first').nextAll().hide();
    $("#myGuests").hide();
}

// check if property type status is short stay on document load
if($("#formPropertyType select[name='property_type_status']").val()=='short_stay'){
    $("#myGuests").fadeIn();
}

$("#formPropertyType select[name='property_type']").on("change", function(){
    var $this = $(this);
    if($this.val()=='hostel'){
        $('#property_type_status option:first').nextAll().hide();
        $("#myGuests").hide();
    }else{
        $('#property_type_status option:first').nextAll().show();
        $("#myGuests").fadeIn('fast');
    }
    return false;
});

// show guest if it is short stay
$("#formPropertyType  select[name='property_type_status']").on("change", function(){
    var $this = $(this);
    if($this.val()=='short_stay'){
        $("#myGuests").fadeIn("fast");
    }else{
        $("#myGuests").hide();
    }
    return false;
});

///calculating guests
var totalGuests = parseFloat($("#adult").val()) + parseFloat($("#children").val());
$("#guest").val(totalGuests);

$("#adult").on("change", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this= $(this);
    var childrenGuests = parseFloat($("#children").val());
    var totalGuests = parseFloat($this.val()) + childrenGuests;
    $("#guest").val(totalGuests);
    return false;
});

$("#children").on("change", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this= $(this);
    var adultGuests = parseFloat($("#adult").val());
    var totalGuests = parseFloat($this.val()) + adultGuests;
    $("#guest").val(totalGuests);
    return false;
});