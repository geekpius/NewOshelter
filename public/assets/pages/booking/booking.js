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
            "step": $this.data('step')
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


$('#formRent select[name="duration"]').on('change', function (){
    let $this= $(this);
    if($this.val() == ''){
        $('#formRent input[name="total_amount"]').val('0.00')
    }else{
        let duration = parseInt($this.val());
        let price = parseFloat($this.data('price'));
        $('#formRent input[name="total_amount"]').val((duration*price).toFixed(2))
    }
});


$('#formSale select[name="payment_method"]').on('change', function (){
    let $this= $(this);
    if($this.val() == ''){
        $('#formSale input[name="total_amount"]').val('0.00')
    }else{
        let price = parseFloat($this.data('price'));
        if($this.val() == 'full'){
            $('#formSale input[name="total_amount"]').attr('readonly', true);
            $('#formSale input[name="total_amount"]').val(price.toFixed(2));
        }else{
            $('#formSale input[name="total_amount"]').attr('readonly', false);
        }
    }
});



$("#formRent").on("submit", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    var valid = true;
    $('#formRent input, #formRent select').each(function() {
        var $this = $(this);

        if(!$this.val()) {
            valid = false;
            $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
        }
    });

    if(valid){
        let data = $this.serialize();
        $("#formRent .confirmBooking").html('<i class="fa fa-spinner fa-spin"></i> CONFIRMING BOOKING...').attr('disabled', true);
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
                            window.location.href = $("#formRent .confirmBooking").data('href');
                        });
                }else{
                    swal("Warning", resp, "warning");
                    $("#formRent .confirmBooking").text('CONFIRM BOOKING REQUEST').attr('disabled', false);
                }
            },
            error: function(resp){
                console.log("Something went wrong with request");
            }
        });
    }
    return false;
});



$("#formShortStay").on("submit", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    var valid = true;
    $('#formShortStay input, #formShortStay select').each(function() {
        var $this = $(this);

        if(!$this.val()) {
            valid = false;
            $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
        }
    });

    if(valid){
        let data = $this.serialize();
        $("#formShortStay .confirmBooking").html('<i class="fa fa-spinner fa-spin"></i> CONFIRMING BOOKING...').attr('disabled', true);
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
                            window.location.href = $("#formShortStay .confirmBooking").data('href');
                        });
                }else{
                    swal("Warning", resp, "warning");
                    $("#formShortStay .confirmBooking").text('CONFIRM BOOKING REQUEST').attr('disabled', false);
                }
            },
            error: function(resp){
                console.log("Something went wrong with request");
            }
        });
    }
    return false;
});


$("#formSale").on("submit", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    var valid = true;
    $('#formSale input, #formSale select').each(function() {
        var $this = $(this);

        if(!$this.val()) {
            valid = false;
            $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
        }
    });

    if(valid){
        let data = $this.serialize();
        $("#formSale .confirmBooking").html('<i class="fa fa-spinner fa-spin"></i> CONFIRMING BOOKING...').attr('disabled', true);
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
                            window.location.href = $("#formSale .confirmBooking").data('href');
                        });
                }else{
                    swal("Warning", resp, "warning");
                    $("#formSale .confirmBooking").text('CONFIRM BOOKING REQUEST').attr('disabled', false);
                }
            },
            error: function(resp){
                console.log("Something went wrong with request");
            }
        });
    }
    return false;
});


$("#formAuction").on("submit", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    var valid = true;
    $('#formAuction input, #formAuction select').each(function() {
        var $this = $(this);

        if(!$this.val()) {
            valid = false;
            $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
        }
    });

    if(valid){
        let data = $this.serialize();
        $("#formAuction .confirmBooking").html('<i class="fa fa-spinner fa-spin"></i> CONFIRMING BOOKING...').attr('disabled', true);
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
                            window.location.href = $("#formAuction .confirmBooking").data('href');
                        });
                }else{
                    swal("Warning", resp, "warning");
                    $("#formAuction .confirmBooking").text('CONFIRM BOOKING REQUEST').attr('disabled', false);
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


// Date pickers //
$(function() {
    $('#dateRanger').daterangepicker({
        opens: 'left',
        autoApply: true,
        // showDropdowns: true,
        minDate: $('#dateRanger').data('date'),
    });
});

$('#dateRanger').on('apply.daterangepicker', function(ev, picker) {
    var checkIn = picker.startDate;
    var checkOut =picker.endDate;

    if(checkOut){
        let checkInDate = new Date(checkIn).getTime();
        let checkOutDate = new Date(checkOut).getTime();
        let distance = checkOutDate - checkInDate;
        let days = Math.floor(distance / (1000 * 60 * 60 * 24));

        // checking max and min stays
        maxStay = $("#dateMaxMin").data('max');
        minStay = $("#dateMaxMin").data('min');
        if (days < minStay || days > maxStay){
            swal("Warning", "Check in and check out with owners minimum and maximum stay.", "warning");
            return;
        }
        // get the total selected days price
        let totalPrice = days * parseFloat($("#formShortStay #initialAmount").val());

        $('#formShortStay input[name="total_amount"]').val(`${totalPrice.toFixed(2)}`);
    }

    $("#dateRanger input[name='check_in']").val(picker.startDate.format('DD-MM-YYYY').toString()).removeClass('is-invalid');
    $("#dateRanger input[name='check_out']").val(picker.endDate.format('DD-MM-YYYY').toString()).removeClass('is-invalid');
});


// checking select adults and owner's
$("#formShortStay select[name='adult']").on("change", function(){
    $this = $(this);
    if($this.val()!=""){
        let setAdult = $this.data('number');
        if(parseInt($this.val())>parseInt(setAdult)){
            let noOfAdult = (parseInt(setAdult)>1)? setAdult+" adults":setAdult+" adult";
            alert("Property require "+noOfAdult);
            $this.val('1');
            return;
        }
    }
});

// checking select children and owner's
$("#formShortStay select[name='children']").on("change", function(){
    $this = $(this);
    if($this.val()!=""){
        let setChildren = $this.data('number');
        if(parseInt($this.val())>parseInt(setChildren)){
            let noOfChild = (parseInt(setChildren)>1)? setChildren+" children":setChildren+" child";
            alert("Property require "+noOfChild);
            $this.val(`${setChildren}`);
            return;
        }
    }
});
