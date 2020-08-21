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
        let checkInDate = new Date(checkIn).getTime();
        let checkOutDate = new Date(checkOut).getTime();
        let distance = checkOutDate - checkInDate;
        let days = Math.floor(distance / (1000 * 60 * 60 * 24));

        // checking max and min stays
        maxStay = $("#dateMaxMin").data('max');
        minStay = $("#dateMaxMin").data('min');
        let months;
        let numberOfMonth;
        let checkInDate1 = new Date(checkIn);
        let checkOutDate1 = new Date(checkOut);
        months = (checkOutDate1.getFullYear() - checkInDate1.getFullYear()) * 12;
        months -= checkInDate1.getMonth();
        months += checkOutDate1.getMonth();
        numberOfMonth = (months <= 0)? 0 : months;
        if (days < minStay){
            alert("Check in and check out with owners minimum and maximum stay.");
            return;
        }
        
        if (numberOfMonth > maxStay){
            alert("Check in and check out with owners minimum and maximum stay.");
            return;
        }

        // get the total selected days price
        let totalPrice = days*parseFloat($("#initialAmount").data('amount'));
        let nights = (days>1)? days.toString()+" nights":days.toString()+" night";
        $('#dateCalculator').text($("#initialAmount").data('amount')+" x " + nights);
        $('#dateCalculatorResult').text($("#initialCurrency").data('currency')+" "+totalPrice.toFixed(2));
        // getting service fee
        let serviceFee = (12/100)*totalPrice;
        let totalAmount = totalPrice+serviceFee;
        $("#serviceFeeResult").text($("#initialCurrency").data('currency')+" "+serviceFee.toFixed(2));
        $("#totalFeeResult").text($("#initialCurrency").data('currency')+" "+totalAmount.toFixed(2));
    }

    $("#dateRanger input[name='check_in']").val(picker.startDate.format('DD-MM-YYYY').toString()).removeClass('is-invalid');
    $("#dateRanger input[name='check_out']").val(picker.endDate.format('DD-MM-YYYY').toString()).removeClass('is-invalid');
    $("#formStayBooking #showCalculations").hide().slideDown('slow');
});


$("#formStayBooking #adult").on("change", function(){
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

$("#formStayBooking #children").on("change", function(){
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

$("#formStayBooking").on('submit', function(e){
    e.stopPropagation();
    var $this = $(this);
    var valid = true;
    $('#formStayBooking input, #formStayBooking select').each(function() {
        var $this = $(this);
        
        if(!$this.val()) {
            valid = false;
            //$this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
            $this.addClass('is-invalid');
        }
    });
    if(valid){
        $(".btnStayBook").html('<i class="fa fa-spin fa-spinner"></i> Booking..').attr('disabled', true);
        return true;
    }
    return false;
});