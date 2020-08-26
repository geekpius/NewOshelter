// HOSTEL BOOKING //
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
})

// get room types
$("#formBookHostel #gender").on("change", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this= $(this);
    $("#formBookHostel #room_type").find('.after').nextAll().remove();
    $("#formBookHostel #room_number").find('.after').nextAll().remove();
    $("#hostelAvailabilityChecker").text('');
    $("#showCalculations").hide();
    $("#myHostelPriceHeading").fadeOut('slow',function(){
        $("#myHostelSwitch").hide().fadeIn('fast');
    });
    if($this.val()!=''){
        var data={ block_name:$("#block_name").val(), gender:$this.val() }
        $("#formBookHostel #room_type").find('.after').nextAll().remove();
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
                $("#formBookHostel #room_type").find('.after').after(options);
            },
            error: function(resp){
                alert("Something went wrong with request");
            }
        });
    }
    else{
        $("#formBookHostel #room_type").find('.after').nextAll().remove();
    }
    return false;
});

// get room numbers
$("#formBookHostel #room_type").on("change", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this= $(this);
    $("#hostelAvailabilityChecker").text('');
    $("#myHostelPriceHeading").fadeOut('slow',function(){
        $("#myHostelSwitch").hide().fadeIn('fast');
    });
    if($this.val()!=''){
        var data={ room_type:$this.val(), gender: $("#formBookHostel #gender").val(), block_id: $("#formBookHostel #block_name").val() }
        $("#formBookHostel #room_number").find('.after').nextAll().remove();
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
                $("#formBookHostel #room_number").find('.after').after(options);
            },
            error: function(resp){
                alert("Something went wrong with request");
            }
        });
    }
    else{
        $("#formBookHostel #room_number").find('.after').nextAll().remove();
    }
    return false;
});

$("#formBookHostel #room_number").on("change", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this= $(this);
    if($this.val()!=''){
        var data={ room_number:$this.val(), room_type:$("#formBookHostel #room_type").val(), gender: $("#formBookHostel #gender").val(), block_id: $("#formBookHostel #block_name").val() }
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
                $("#myHostelAdvance").text(resp.advance);
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
$("#formBookHostel #block_name").on("change", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this= $(this);
    $("#formBookHostel #gender").val('');
    $("#formBookHostel #room_type").find('.after').nextAll().remove();
    $("#formBookHostel #room_number").find('.after').nextAll().remove();
    $("#hostelAvailabilityChecker").text('');
    $("#showCalculations").hide();
    $("#myHostelPriceHeading").fadeOut('slow',function(){
        $("#myHostelSwitch").hide().fadeIn('fast');
    });
    $("#dateRanger input[name='check_in']").val('');
    $("#dateRanger input[name='check_out']").val('');
    return false;
});


// Date pickers //
$(function() {
    $('#dateRanger').daterangepicker({
        opens: 'left',
        autoApply: true,
        showDropdowns: true,
        minDate: $('#dateRanger').data('date'), 
    });
});

$('#dateRanger').on('apply.daterangepicker', function(ev, picker) {
    var checkIn = picker.startDate;
    var checkOut =picker.endDate;
    if(checkOut){
        // checking max and min stays
        let months;
        let numberOfMonth;
        let checkInDate1 = new Date(checkIn);
        let checkOutDate1 = new Date(checkOut);
        months = (checkOutDate1.getFullYear() - checkInDate1.getFullYear()) * 12;
        months -= checkInDate1.getMonth();
        months += checkOutDate1.getMonth();
        numberOfMonth = (months <= 0)? 0 : months;
        
        // check if select months is not less
        let advanceDuration = $("#myHostelAdvanceMonth").text();
        if (advanceDuration == ''){
            alert("Do your room selection to proceed check in and check out.");
            return;
        }
        if (numberOfMonth < parseInt(advanceDuration)){
            alert("Number of months selected is less than advance payment months.\nSelect same or more than the advance payment duration.");
            return;
        }

        // get the total selected days price
        let totalPrice = numberOfMonth*parseFloat($("#initialHostelAmount").text());
        let month = (numberOfMonth>1)? numberOfMonth.toString()+" months":numberOfMonth.toString()+" month";
        $('#dateCalculator').text($("#initialHostelAmount").text()+" x " + month);
        $('#dateCalculatorResult').text($("#myHostelCurrency").text()+" "+totalPrice.toFixed(2));
        // getting service fee
        let serviceFee = (12/100)*totalPrice;
        let totalAmount = totalPrice+serviceFee;
        $("#serviceFeeResult").text($("#myHostelCurrency").text()+" "+serviceFee.toFixed(2));
        $("#totalFeeResult").text($("#myHostelCurrency").text()+" "+totalAmount.toFixed(2));
    }

    $("#dateRanger input[name='check_in']").val(picker.startDate.format('DD-MM-YYYY').toString()).removeClass('is-invalid');
    $("#dateRanger input[name='check_out']").val(picker.endDate.format('DD-MM-YYYY').toString()).removeClass('is-invalid');
    $("#formBookHostel #showCalculations").hide().slideDown('slow');
});


// proceed booking
$("#formBookHostel").on('submit', function(e){
    e.stopPropagation();
    var $this = $(this);
    var valid = true;
    $('#formBookHostel input, #formBookHostel select').each(function() {
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