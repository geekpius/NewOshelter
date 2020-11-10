$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
})

// select visa
$("#visa").on("change", function(){
    var $this = $(this);
    if($this.prop("checked", true)){
        $("#momoExpand").slideUp('fast');
        $("#visaExpand").slideDown('fast', function(){
            $("#formMobile")[0].reset();
        });
    }
});

// select momo
$("#mobile_money").on("change", function(){
    var $this = $(this);
    if($this.prop("checked", true)){
        $("#visaExpand").slideUp('fast');
        $("#momoExpand").slideDown('fast', function(){
            $("#formVisa")[0].reset();
        });
    }
});

// make payment
$(".makePayment").on('click', function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    if(document.getElementById('mobile_money').checked){
        var valid = true;
        $('#formMobile input, #formMobile select').each(function() {
            var $this = $(this);
            
            if(!$this.val()) {
                valid = false;
                $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
                $this.addClass('is-invalid');
            }
        });
        if(valid){
            $this.attr('disabled', true);
            $('#formMobile').trigger("submit");
        }
    }else if(document.getElementById('visa').checked){
        var valid = true;
        $('#formVisa input, #formVisa select').each(function() {
            var $this = $(this);
            
            if(!$this.val()) {
                valid = false;
                $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
                $this.addClass('is-invalid');
            }
        });
        if(valid){
            return false;
        }
    }else{
        swal("Select", "Select payment option.", "warning");
    }
    return false;
});

// toggle input field error messages
$("input, textarea").on('input', function(){
    if($(this).val()!=''){
        $(this).parents('.validate').find('.mySpan').text('');
        $(this).removeClass('is-invalid');
    }else{ 
        $(this).parents('.validate').find('.mySpan').text('The '+$(this).attr('name').replace(/[\_]+/g, ' ')+' field is required'); 
        $(this).addClass('is-invalid');
    }
});

// toggle select field error messages
$("select").on('change', function(){
    if($(this).val()!=''){
        $(this).parents('.validate').find('.mySpan').text('');
        $(this).removeClass('is-invalid');
    }else{ 
        $(this).parents('.validate').find('.mySpan').text('The '+$(this).attr('name').replace(/[\_]+/g, ' ')+' field is required');
        $(this).addClass('is-invalid');
    }
});


function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

function isMonthAndYear(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode !== 47) 
    {
        return false;
    }
    return true;
}