// sigin
$("#formSignIn").on("submit", function(e){
    e.stopPropagation();
    var valid = true;
    $('#formSignIn input').each(function() {
        var $this = $(this);
        
        if(!$this.val()) {
            valid = false;
            $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
        }
    });
    if(valid) {
        $('.btn_sign_in').html('<i class="fa fa-spinner fa-spin"></i> Signing In...').attr('disabled', true);
        return true;
    }
    return false;
});

$("#formSignIn input").on('input', function(){
    if($(this).val()!=''){
        $(this).parents('.validate').find('.mySpan').text('');
    }else{ $(this).parents('.validate').find('.mySpan').text('The '+$(this).attr('name').replace(/[\_]+/g, ' ')+' field is required'); }
});


// sign up
$("#formSignup").on("submit", function(e){
    e.stopPropagation();
    var valid = true;
    $('#formSignup input').each(function() {
        var $this = $(this);
        
        if(!$this.val()) {
            valid = false;
            $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
        }
    });
    if(valid) {
        $('.btn_sign_up').html('<i class="fa fa-spinner fa-spin"></i> Signing Up...').attr('disabled', true);
        return true;
    }
    return false;
});

function getUpperCase(field){
    var set_field = document.getElementById(field).value;
    document.getElementById(field).value=set_field.toUpperCase();
}

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

$("#formSignup input").on('input', function(){
    if($(this).val()!=''){
        $(this).parents('.validate').find('.mySpan').text('');
    }else{ $(this).parents('.validate').find('.mySpan').text('The '+$(this).attr('name').replace(/[\_]+/g, ' ')+' field is required'); }
});

