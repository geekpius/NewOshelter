var openVisitorBtn = document.getElementById('openVisitor');
var openOwnerBtn = document.getElementById('openOwner');
function clickOpenVisitorForm(e){
    e.preventDefault();
    $("#formSignupOwner").hide("slow");
    openOwnerBtn.classList.remove("active");
    $("#formSignupVisitor").show("slow");
    openVisitorBtn.classList.add("active");
}


function clickOpenOwnerForm(e){
    e.preventDefault();
    $("#formSignupVisitor").hide("slow");
    openVisitorBtn.classList.remove("active");
    $("#formSignupOwner").show("slow");
    openOwnerBtn.classList.add("active");
}

$(".showPassword").on("click", function(){
    var $this = $(this);
    var password = $(".password");
    var showPassword = $(".password").attr("type");
    if(showPassword == "password"){
        $this.removeClass("fa fa-eye-slash");
        $this.addClass("fa fa-eye");
        password.attr("type", "text");
    }else {
        $this.removeClass("fa fa-eye");
        $this.addClass("fa fa-eye-slash");
        password.attr("type", "password");
    }
});

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
        $('.btn_sign_in').html('<i class="fa fa-spinner fa-spin"></i> Logging In...').attr('disabled', true);
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
$("#formSignupOwner").on("submit", function(e){
    e.stopPropagation();
    var valid = true;
    $('#formSignupOwner input').each(function() {
        var $this = $(this);
        
        if(!$this.val()) {
            valid = false;
            $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
        }
        if($this.attr('name')=='agreement'){
            if(!$('#agreement').is(":checked")){
                valid = false;
                $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
            }
        }
    });
    if(valid) {
        $('.btn_sign_up').html('<i class="fa fa-spinner fa-spin"></i> Signing Up...').attr('disabled', true);
        return true;
    }
    return false;
});


// verify email
$("#formVerify").on("submit", function(e){
    e.stopPropagation();
    var valid = true;
    $('#formVerify input').each(function() {
        var $this = $(this);
        
        if(!$this.val()) {
            valid = false;
            $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
        }
    });
    if(valid) {
        $('.btn_verify_code').html('<i class="fa fa-spinner fa-spin"></i> Verifying Code...').attr('disabled', true);
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

$("#formSignupOwner input").on('input', function(){
    if($(this).val()!=''){
        $(this).parents('.validate').find('.mySpan').text('');
    }else{ $(this).parents('.validate').find('.mySpan').text('The '+$(this).attr('name').replace(/[\_]+/g, ' ')+' field is required'); }
});

$("#type").on("change", function(){
    if($("#type").val() == 'normal'){
        $("#typeDescription").html("");
    }else{
        $("#typeDescription").html('You will have full access to management rights which will cost you <span class="font-13 font-weight-800">GHC 20.00/month.</span>');
    }
});

$("#formSignupOwner input[name='phone']").on("keypress", function(e){
    let $this = $(this);
    if($this.val().length == 10){
        e.preventDefault();
    }
});

