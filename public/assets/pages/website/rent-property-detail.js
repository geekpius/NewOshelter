// Date pickers //
$(function() {
    $('#dateRanger').daterangepicker({
        opens: 'left',
        autoApply: true,
        minDate: $('#dateRanger').data('date'), 
    });
});

$('#dateRanger').on('apply.daterangepicker', function(ev, picker) {
    var checkIn = picker.startDate;
    var checkOut =picker.endDate;
    if(checkOut){
        // get number of selected months
        let months;
        let numberOfMonth;
        let checkInDate = new Date(checkIn);
        let checkOutDate = new Date(checkOut);
        months = (checkOutDate.getFullYear() - checkInDate.getFullYear()) * 12;
        months -= checkInDate.getMonth();
        months += checkOutDate.getMonth();
        numberOfMonth = (months <= 0)? 0 : months;
        
        // check if select months is not less
        let advanceDuration = $("#initialAmount").data('duration');
        if (numberOfMonth < advanceDuration){
            alert("Number of months selected is less than advance payment months.\nSelect same or more than the advance payment duration");
            return;
        }

        // get the total selected months price
        let totalPrice = numberOfMonth*parseFloat($("#initialAmount").data('amount'));
        let month = (numberOfMonth>1)? numberOfMonth.toString()+" months":numberOfMonth.toString()+" month";
        $('#dateCalculator').text($("#initialAmount").data('amount')+" x " + month);
        $('#dateCalculatorResult').text($("#initialCurrency").data('currency')+" "+totalPrice.toFixed(2));
        // getting service fee
        let serviceFee = (12/100)*totalPrice;
        let totalAmount = totalPrice+serviceFee;
        $("#serviceFeeResult").text($("#initialCurrency").data('currency')+" "+serviceFee.toFixed(2));
        $("#totalFeeResult").text($("#initialCurrency").data('currency')+" "+totalAmount.toFixed(2));
    }

    $("#dateRanger input[name='check_in']").val(picker.startDate.format('DD-MM-YYYY').toString()).removeClass('is-invalid');
    $("#dateRanger input[name='check_out']").val(picker.endDate.format('DD-MM-YYYY').toString()).removeClass('is-invalid');
    $("#formRentBooking #showCalculations").hide().slideDown('slow');
});


// checking adult selections //
$("#formRentBooking #adult").on("change", function(){
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

// checking children selections //
$("#formRentBooking #children").on("change", function(){
    $this = $(this);
    if($this.val()!=""){
        let setChildren = $this.data('number');
        if(parseInt($this.val())>parseInt(setChildren)){
            let noOfChild = (parseInt(setChildren)>1)? setChildren+" children":setChildren+" child";
            alert("Property require "+noOfChild);
            $this.val('0');
            return;
        }
    }
});

$("#formRentBooking").on('submit', function(e){
    e.stopPropagation();
    var $this = $(this);
    var valid = true;
    $('#formRentBooking input, #formRentBooking select').each(function() {
        var $this = $(this);
        
        if(!$this.val()) {
            valid = false;
            $this.addClass('is-invalid');
        }
    });
    if(valid){
        $(".btnRentBook").html('<i class="fa fa-spin fa-spinner"></i> Booking...').attr('disabled', true);
        return true;
    }
    return false;
});
