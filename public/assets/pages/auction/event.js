
// continue steps in booking
$(".btnContinue").on("click", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    if($this.data('step')=='1'){
        var data = {
            "step": $this.data('step'),
            "owner_message": $("#owner_message").val(),
        }

        $.ajax({
            url: $this.data('url'),
            type: "POST",
            data: data,
            success: function(resp){
                if(resp=='success'){
                    $("#verifyContact").slideUp('fast', function(){
                        $("#paymentDiv").slideDown('fast');
                    });
                }else{
                    console.log(resp+ '. try again.');
                }
            },
            error: function(resp){
                console.log('something went wrong with request');
            }
        });
    }

    return false;
});

// moving backward step
$(".moveBack").on("click", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this=$(this);
    if($this.data('step')=='2'){
        $("#paymentDiv").slideUp('fast', function(){
            $("#verifyContact").slideDown('fast');
        });
    }
    return false;
});

// verify phone number
$(".btnVerify").on("click", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    if($("#phone_number").val()==''){
        $("#phone_number").addClass('is-invalid').focus();
    }else if($("#phone_number").val().length>9){
        $("#phone_number").addClass('is-invalid').focus();
        $("#phone_number").parents(".validate").find(".mySpan").text("Invalid phone number");
    }else if ($("#phone_number").val().startsWith("0") === true) {
        document.getElementById('phoneSpan').innerText = 'Invalid phone number';
    }else{
        $("#phone_number").removeClass('is-invalid');
        if($this.text() == 'Send Verification'){
            $this.html('<i class="fa fa-spin fa-spinner"></i> Sending....').attr("disabled", true);
        }else{
            $this.html('<i class="fa fa-spin fa-spinner"></i> Resending....').attr("disabled", true);
        }
        let data = {
            phone_number: $("#phone_number").val(),
            phone_prefix: $("#phone_prefix").text()
        }
        $.ajax({
            url: $this.data('url'),
            type: "POST",
            data: data,
            success: function(resp){
                $this.html('Wait for SMS notification');
                if(resp=='success'){
                    $(".phoneNumberField").slideUp('fast', function(){
                        $(".verifyCodeField").slideDown('fast');
                    });
                    let timeOut = setTimeout(function(){
                        $this.attr("disabled", false);
                        $this.text('Resend Verification');
                        clearTimeout(timeOut);
                    }, 10000);
                }else{
                    swal('Warning', `${resp}.`, 'warning');
                    $this.text('Send Verification').attr("disabled", false);
                }
            },
            error: function(resp){
                console.log('something went wrong with request');
            }
        });
    }
    
    return false;
});

// verify phone number with verification code
$("#verify_code").on("keyup blur", function(e){
    e.stopPropagation();
    var $this = $(this);
    if($this.val()!='' && $this.val().length==4){
        var data = $this.serialize();
        $.ajax({
            url: $this.data('url'),
            type: "POST",
            data: data,
            success: function(resp){
                if(resp=='success'){
                    $("#phoneNumberCover").slideUp('fast', function(){
                        $("#verifyNumberCover").slideDown('fast');
                        $(".btnVerify").hide();
                        $(".btnContinue").show();
                    });
                }else if(resp=='fail'){
                    console.log(resp+'. try again.');
                }else{
                    $this.parents('.validate').find('.mySpan').text(resp);
                }
            },
            error: function(resp){
                console.log('something went wrong with request');
            }
        });
    }else{
        $this.parents('.validate').find('.mySpan').text('');
    }
    return false;
});


$("#formConfirmOrder").on("submit", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    swal({
        title: "Confirm",
        text: "You are about to confirm your order",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-primary btn-sm",
        cancelButtonClass: "btn-danger btn-sm",
        confirmButtonText: "Confirm",
        closeOnConfirm: true
        },
    function(){
        let data = $this.serialize();
        $(".confirmOrder").html('<i class="fa fa-spinner fa-spin"></i> CONFIRMING ORDER...').attr('disabled', true);
        $.ajax({
            url: $this.attr('action'),
            type: "POST",
            data: data,
            success: function(resp){
                if(resp == 'success'){
                    swal({
                        title: "Confirmed",
                        text: "You have sent an order request to oshelter\nWait for a call.",
                        type: "success",
                        confirmButtonClass: "btn-primary btn-sm",
                        confirmButtonText: "Okay",
                        closeOnConfirm: true
                        },
                    function(){
                        window.location.href = $(".confirmOrder").data('href');
                    });
                }else{
                    swal("Warning", resp, "warning");
                    $(".confirmOrder").text('<i class="fa fa-spinner fa-spin"></i> CONFIRM ORDER REQUEST').attr('disabled', false);
                }
            },
            error: function(resp){
                console.log("Something went wrong with request");
            }
        });
    });
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

function removeZero(field) {
    var phoneNumber = document.getElementById(field).value;
    if (phoneNumber.startsWith("0") === true) {
        document.getElementById('phoneSpan').innerText = 'Invalid phone number';
    }else{
        document.getElementById('phoneSpan').innerText = '';
    }
}
