// BOOKING SCRIPTS //

// open upload modal
$(".btnAddNewID").on("click", function(e){
    e.preventDefault();
    e.stopPropagation();
    $("#idModal").modal("show");
    return false;
});


// go next
$(".btnNext").on("click", function(e){
    e.preventDefault();
    e.stopPropagation();
    window.location.reload();
    return false;
});

// continue steps in booking
$(".btnContinue").on("click", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    if($this.data('step')=='1'){
        var data = {
            "step": $this.data('step'),
        }

        $.ajax({
            url: $this.data('url'),
            type: "POST",
            data: data,
            success: function(resp){
                if(resp=='success'){
                    $("#propertyReview").slideUp('fast', function(){
                        $("#verifyContact").slideDown('fast');
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
    else if($this.data('step')=='2'){
        var data = {
            "step": $this.data('step'),
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
    if($this.data('step')=='3'){
        $("#paymentDiv").slideUp('fast', function(){
            $("#verifyContact").slideDown('fast');
        });
    }
    else if($this.data('step')=='2'){
        $("#verifyContact").slideUp('fast', function(){
            $("#propertyReview").slideDown('fast');
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
$("#verify_code").on("keyup", function(e){
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


$("#formHostel select[name='gender']").on('change', function (){
    let $this= $(this);
    if($("#formHostel select[name='room_type']").val()== '' ){
        alert('Select room type to proceed');
        $this.val('');
    }
    else if($this.val()!=''){
        let data={
            gender: $this.val(),
            room_type: $("#formHostel select[name='room_type']").val(),
        }
        $("#formHostel select[name='block']").find('.after').nextAll().remove();

        $.ajax({
            url: $this.data('href'),
            type: "POST",
            data: data,
            dataType: 'json',
            success: function(resp){
                let options = '';
                $.each( resp, function( key, value ) {
                    options+='<option value='+value.property_hostel_block.id+'>'+value.property_hostel_block.block_name+'</option>';
                });
                $("#formHostel select[name='block']").find('.after').after(options);
            },
            error: function(resp){
                console.log("Something went wrong with request");
            }
        });
    }
    else{
        $("#formHostel select[name='block']").find('.after').nextAll().remove();
    }
    return false;
});


$("#formHostel select[name='block']").on('change', function (){
    let $this= $(this);
    if($("#formHostel select[name='gender']").val() == '' ||$("#formHostel select[name='room_type']").val()== '' ){
        alert('Select room type and gender to proceed');
        $this.val('');
    }
    else if($this.val()!=''){
        let data={
            block : $this.val(),
            gender: $("#formHostel select[name='gender']").val(),
            room_type: $("#formHostel select[name='room_type']").val(),
        }
        $("#formHostel select[name='room']").find('.after').nextAll().remove();

        $.ajax({
            url: $this.data('href'),
            type: "POST",
            data: data,
            dataType: 'json',
            success: function(resp){
                let options = '';
                $.each( resp.rooms, function( key, value ) {
                    options+='<option value='+value.id+'>'+value.room_no +'</option>';
                });
                $("#formHostel select[name='room']").find('.after').after(options);
                $("#formHostel input[name='total_amount']").val(resp.price);
            },
            error: function(resp){
                console.log("Something went wrong with request");
            }
        });
    }
    else{
        $("#formHostel select[name='room']").find('.after').nextAll().remove();
    }
    return false;
});



$("#formHostel").on("submit", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    var valid = true;
    $('#formHostel input, #formHostel select').each(function() {
        var $this = $(this);

        if(!$this.val()) {
            valid = false;
            $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
        }
    });

    if(valid){
        let data = $this.serialize();
        $("#formHostel .confirmBooking").html('<i class="fa fa-spinner fa-spin"></i> CONFIRMING BOOKING...').attr('disabled', true);
        $.ajax({
            url: $this.attr('action'),
            type: "POST",
            data: data,
            success: function(resp){
                if(resp == 'success'){
                    swal({
                            title: "Confirmed",
                            text: "You have sent a booking request\nOshelter will contact you.",
                            type: "success",
                            confirmButtonClass: "btn-primary btn-sm",
                            confirmButtonText: "Okay",
                            closeOnConfirm: true
                        },
                        function(){
                            window.location.href = $("#formHostel .confirmBooking").data('href');
                        });
                }else{
                    swal("Warning", resp, "warning");
                    $("#formHostel .confirmBooking").text('CONFIRM BOOKING REQUEST').attr('disabled', false);
                }
            },
            error: function(resp){
                console.log("Something went wrong with request");
            }
        });
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


function removeZero(field) {
    var phoneNumber = document.getElementById(field).value;
    if (phoneNumber.startsWith("0") === true) {
        document.getElementById('phoneSpan').innerText = 'Invalid phone number';
    }else{
        document.getElementById('phoneSpan').innerText = '';
    }
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
