
// submit form
$("#formPropertyType").on("submit", function(e){
    e.stopPropagation();
    var valid = true;
    $('#formPropertyType input, #formPropertyType select').each(function() {
        var $this = $(this);

        if(!$this.val()) {
            valid = false;
            $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
        }
    });

    if(valid){
        $(".btnMove").html('<i class="fa fa-spin fa-spinner"></i> Lets build a property portfolio').attr('disabled',true);
        return true;
    }
    return false;
});


//remove error message if inputs are filled
$("input").on('input', function(){
    if($(this).val()!=''){
        $(this).parents('.validate').find('.mySpan').text('');
    }else{ $(this).parents('.validate').find('.mySpan').text('The '+$(this).attr('name').replace(/[\_]+/g, ' ')+' field is required'); }
});

$("select").on('change', function(){
    if($(this).val()!=''){
        $(this).parents('.validate').find('.mySpan').text('');
    }else{
        $(this).parents('.validate').find('.mySpan').text('The '+$(this).attr('name').replace(/[\_]+/g, ' ')+' field is required');
    }
});


$("#formPropertyType select[name='base_property']").on("change", function(){
    var $this = $(this);
   if($this.val() == 'land'){
       $("#formPropertyType select[name='property_type']").val('land').attr('disabled', true);
       $("#formPropertyType select[name='property_type_status']").val('sale').attr('disabled', true);
   }else{
       $("#formPropertyType select[name='property_type']").val('').attr('disabled', false);
       $("#formPropertyType select[name='property_type_status']").val('').attr('disabled', false);
   }
    return false;
});

// check if it is hostel
$("#formPropertyType select[name='property_type']").on("change", function(){
    var $this = $(this);
    $("#property_type_status").val('');
    $("#myGuests").hide('fast');
    $("#formPropertyType input[name='guest']").val("1");
    $("#formPropertyType select[name='adult']").val("1");
    $("#formPropertyType select[name='children']").val("0");
    if($this.val()=='hostel'){
        $('#property_type_status option:first').next().nextAll().hide();
    }else{
        $('#property_type_status option:first').next().nextAll().show();
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
        $("#formPropertyType input[name='guest']").val("1");
        $("#formPropertyType select[name='adult']").val("1");
        $("#formPropertyType select[name='children']").val("0");
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



//**** delete property ****//

// submit form
$("#formConfirm").on("submit", function(e){
    e.stopPropagation();
    var valid = true;
    $('#formConfirm input').each(function() {
        var $this = $(this);

        if(!$this.val()) {
            valid = false;
            $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
        }
    });

    if(valid){
        $(".btnConfirm").html('<i class="fa fa-spin fa-spinner"></i> Deleting...').attr('disabled',true);
        return true;
    }
    return false;
});

