$(function() {
    $('#dateRanger').daterangepicker({
        opens: 'left',
        autoApply: true,
        minDate: "{{ \Carbon\Carbon::parse(\Carbon\Carbon::tomorrow())->format('m-d-Y') }}", 
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
        let result = days*parseFloat("{{ $property->propertyPrice->property_price }}");
        let nights = (days>1)? days.toString()+" nights":days.toString()+" night";
        $('#dateCalculator').text("{{ $property->propertyPrice->property_price }} x " + nights);
        $('#dateCalculatorResult').text("{{ $property->propertyPrice->currency }} "+result.toFixed(2));
        // service
        $("#serviceFeeResult").text("{{ $property->propertyPrice->currency }} "+(0.12*result).toFixed(2));
        // total
        let totalPrice = (0.12*result)+result;
        $("#totalFeeResult").text("{{ $property->propertyPrice->currency }} "+totalPrice.toFixed(2));
    }

    $("#dateRanger input[name='check_in']").val(picker.startDate.format('DD-MM-YYYY').toString());
    $("#dateRanger input[name='check_out']").val(picker.endDate.format('DD-MM-YYYY').toString());
    $("#formBooking #showCalculations").hide().slideDown('slow');
});

$("#formBooking #adult").on("change", function(){
    $this = $(this);
    if($this.val()!=""){
        if(parseInt($this.val())>parseInt("{{ $property->adult }}")){
            let noOfAdult = (parseInt("{{ $property->adult }}")>1)? "{{ $property->adult }} adults":"{{ $property->adult }} adult";
            alert("Property require "+noOfAdult);
            $this.val('1');
        }
    }
});

$("#formBooking #children").on("change", function(){
    $this = $(this);
    if($this.val()!=""){
        if(parseInt($this.val())>parseInt("{{ $property->children }}")){
            let noOfChild = (parseInt("{{ $property->children }}")>1)? "{{ $property->children }} children":"{{ $property->children }} child";
            alert("Property require "+noOfChild);
            $this.val('0');
        }
    }
});

$("#formBooking").on('submit', function(e){
    e.stopPropagation();
    var $this = $(this);
    var valid = true;
    $('#formBooking input, #formBooking select').each(function() {
        var $this = $(this);
        
        if(!$this.val()) {
            valid = false;
            //$this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
            $this.addClass('is-invalid');
        }
    });
    if(valid){
        $(".btnBook").html('<i class="fa fa-spin fa-spinner"></i> Reserving..').attr('disabled', true);
        return true;
    }
    return false;
});