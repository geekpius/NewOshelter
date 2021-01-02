
// get room types
$("#formBookHostel select[name='gender']").on("change", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this= $(this);
    $("#formBookHostel select[name='room_type']").find('.after').nextAll().remove();
    $("#formBookHostel select[name='room_number']").find('.after').nextAll().remove();
    $("#hostelAvailabilityChecker").text('');
    $("#showCalculations").hide();
    $("#myHostelPriceHeading").fadeOut('slow',function(){
        $("#myHostelSwitch").hide().fadeIn('fast');
    });
    if($this.val()!=''){
        var data={ 
            block_name:$("#formBookHostel select[name='block_name']").val(), 
            gender:$this.val() 
        }
        $("#formBookHostel select[name='room_type']").find('.after').nextAll().remove();
        $.ajax({
            url: $this.data('url'),
            type: "POST",
            data: data,
            dataType: 'json',
            success: function(resp){
                let options = '';
                $.each( resp, function( key, value ) {
                    $replace = value.block_room_type.toLowerCase().replace(/ /g,"_");
                    options+='<option value='+$replace+'>'+value.block_room_type +'</option>';
                });
                $("#formBookHostel select[name='room_type']").find('.after').after(options);
            },
            error: function(resp){
                alert("Something went wrong with request");
            }
        });
    }
    else{
        $("#formBookHostel select[name='room_type']").find('.after').nextAll().remove();
    }
    return false;
});

// get room numbers
$("#formBookHostel select[name='room_type']").on("change", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this= $(this);
    $("#hostelAvailabilityChecker").text('');
    $("#myHostelPriceHeading").fadeOut('slow',function(){
        $("#myHostelSwitch").hide().fadeIn('fast');
    });
    if($this.val()!=''){
        var data={ 
            room_type:$this.val(), 
            gender: $("#formBookHostel select[name='gender']").val(), 
            block_id: $("#formBookHostel select[name='block_name']").val() 
        }
        $("#formBookHostel select[name='room_number']").find('.after').nextAll().remove();
        $.ajax({
            url: $this.data('url'),
            type: "POST",
            data: data,
            dataType: 'json',
            success: function(resp){
                let options = '';
                $.each( resp, function( key, value ) {
                    options+='<option value='+value.room_no+'>'+value.room_no +'</option>';
                });
                $("#formBookHostel select[name='room_number']").find('.after').after(options);
            },
            error: function(resp){
                alert("Something went wrong with request");
            }
        });
    }
    else{
        $("#formBookHostel select[name='room_number']").find('.after').nextAll().remove();
    }
    return false;
});

$("#formBookHostel select[name='room_number']").on("change", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this= $(this);
    if($this.val()!=''){
        var data={ 
            room_number:$this.val(), 
            room_type:$("#formBookHostel select[name='room_type']").val(), 
            gender: $("#formBookHostel select[name='gender']").val(), 
            block_id: $("#formBookHostel select[name='block_name']").val() 
        }
        $.ajax({
            url: $this.data('url'),
            type: "POST",
            data: data,
            dataType: 'json',
            success: function(resp){
                $("#hostelAvailabilityChecker").text(resp.data);
                $("#myHostelCurrency").text(resp.currency);
                $("#initialHostelAmount").text(resp.price);
                $("#hyphen").show()
                $("#myHostelPriceCal").text(resp.calendar+' per person');
                if (resp.isFull=='Yes'){
                    $("#formBookHostel .btnHostelBook").hide();
                    $("#formBookHostel .btnHostelBooked").show();
                }
                $("#myHostelAdvanceMonth").text(resp.month);
                $("#myHostelSwitch").fadeOut('slow',function(){
                    $("#myHostelPriceHeading").fadeIn('fast');
                });
            },
            error: function(resp){
                alert("Something went wrong with request");
            }
        });
    }
    else{
        $("#hostelAvailabilityChecker").text('');
        $("#myHostelPriceHeading").fadeOut('slow',function(){
            $("#myHostelSwitch").fadeIn('fast');
        });
    }
    return false;
});

// change block name
$("#formBookHostel select[name='block_name']").on("change", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this= $(this);
    $("#formBookHostel select[name='gender']").val('');
    $("#formBookHostel select[name='room_type']").find('.after').nextAll().remove();
    $("#formBookHostel select[name='room_number']").find('.after').nextAll().remove();
    $("#hostelAvailabilityChecker").text('');
    $("#showCalculations").hide();
    $("#myHostelPriceHeading").fadeOut('slow',function(){
        $("#myHostelSwitch").hide().fadeIn('fast');
    });
    $("#formBookHostel select[name='duration']").val('');
    return false;
});

// select duration
$("#formBookHostel select[name='duration']").on("change", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    let blockName = $("#formBookHostel select[name='block_name']").val();
    let roomType = $("#formBookHostel select[name='room_type']").val();
    let gender = $("#formBookHostel select[name='gender']").val();
    let roomNumber = $("#formBookHostel select[name='room_number']").val();
    if(!blockName || !roomType || !gender || !roomNumber){
        swal("Warning", "Do your room selection to proceed duration.", "warning");
        $this.val('');
    }
    else{
        let advanceDuration = $("#myHostelAdvanceMonth").text();
        let selectedAdvanceDuration = $this.val();
        if(advanceDuration && parseInt(advanceDuration) > parseInt(selectedAdvanceDuration)){
            let duration = "";
            if(advanceDuration < 12){
                duration = (advanceDuration <= 1)? `${advanceDuration} month`:`${advanceDuration} months`;
            }else {
                duration = "1 year";
            }
            swal("Warning", `Least advance payment duration is ${duration}`, "warning");
            $this.val(advanceDuration);
            selectedAdvanceDuration = advanceDuration;
        }

        // fee calculations
        let totalPrice = parseInt(selectedAdvanceDuration)*parseFloat($("#initialHostelAmount").text());
        let months = "";
        if(selectedAdvanceDuration < 12){
            months = (selectedAdvanceDuration <= 1)? `${selectedAdvanceDuration} month`:`${selectedAdvanceDuration} months`;
        }
        else {
            months = "1 year";
        }
        
        $('#formBookHostel #dateCalculator').text(`${$("#initialHostelAmount").text()} x ${months}`);
        $('#formBookHostel #dateCalculatorResult').text(`${$("#myHostelCurrency").text()} ${totalPrice.toFixed(2)}`);
        // getting service fee
        let serviceCharge = parseFloat($("#formBookHostel input[name='charge']").val());
        let discountCharge = parseFloat($("#formBookHostel input[name='discount']").val());
        let serviceFee = (serviceCharge/100)*totalPrice;
        let discountFee = (discountCharge/100)*totalPrice;
        let totalAmount = (totalPrice+serviceFee)-discountFee;
        $("#formBookHostel #serviceFeeResult").text(`${$("#myHostelCurrency").text()} ${serviceFee.toFixed(2)}`);
        if(discountFee !== 0){
            $("#formBookHostel #discountFeeResult").text(`${$("#myHostelCurrency").text()} ${discountFee.toFixed(2)}`);
            $("#formBookHostel #discountFee").show();
        }
        $("#formBookHostel #totalFeeResult").text(`${$("#myHostelCurrency").text()} ${totalAmount.toFixed(2)}`);

        $("#formBookHostel #showCalculations").hide().slideDown('slow');
    }
    return false;
});


// proceed booking
$("#formBookHostel").on('submit', function(e){
    e.stopPropagation();
    var $this = $(this);
    var valid = true;
    $('#formBookHostel select').each(function() {
        var $this = $(this);
        
        if(!$this.val()) {
            valid = false;
            //$this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
            $this.addClass('is-invalid');
        }
    });
    if(valid){
        $(".btnHostelBook").html('<i class="fa fa-spin fa-spinner"></i> Booking..').attr('disabled', true);
        return true;
    }
    return false;
});