function getProperties(url) 
{
    $.ajax({
        url: url,
        type: "GET",
        success: function(resp){
            $("#propertyContent").html(resp);
        },
        error: function(resp){
            console.log('something went wrong.');
        }
    });
}

getProperties($("#propertyContent").data('url'));

$("select[name='filter']").on("change", function(){
    var $this = $(this);
    if($this.val() !== ''){
        let url = `/user/properties/listings/filter/${$this.val()}`;
        getProperties(url);
    }
    return false;
});

$("input[name='search']").on("keyup", function(){
    var $this = $(this);
    let url = `/user/properties/listings/search/${$this.val()}`;
    getProperties(url);
    return false;
});

// toggle between listed property invisible and visible
$(".btnVisibility").on("click", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    swal({
        title: "Are you sure?",
        text: "You are about "+$this.text().toLowerCase()+" "+$this.data("title")+" listing.",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: ((jQuery.trim($this.text().toLowerCase())=="hide")? "btn-danger":"btn-success")+" btn-sm",
        cancelButtonClass: "btn-sm",
        confirmButtonText: "Yes, "+$this.text(),
        closeOnConfirm: false
        },
    function(){
        $.ajax({
            url: $this.data('href'),
            type: "POST",
            success: function(resp){
                if(resp=='success'){
                    swal(((jQuery.trim($this.text().toLowerCase())=="hide")? "Hidden":"Published"), "Property "+((jQuery.trim($this.text().toLowerCase())=="hide")? "hidden":"published")+" successful", "success");
                    $this.parents(".myParent").find(".blog-card .publishStatus").html(((jQuery.trim($this.text().toLowerCase())=="hide")? 'Hidden':'Published'));
                    $this.html(((jQuery.trim($this.text().toLowerCase())=="hide")? '<i class="fa fa-check"></i> Publish':'<i class="fa fa-eye-slash"></i> Hide'));
                    if(jQuery.trim($this.text().toLowerCase())=="hide"){
                        $this.removeClass('text-success').addClass('text-pink');
                    }else{
                        $this.removeClass('text-pink').addClass('text-success');
                    }
                }
                else{
                    alert("Something went wrong");
                }
            },
            error: function(resp){
                alert("Something went wrong with request");
            }
        });
    });
    return false;
});


// from new listing //

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

