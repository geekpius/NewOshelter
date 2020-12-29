$("#formRentBooking select[name='duration']").on('change', function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    let advancePaymentDuration = $("#initialAmount").data("duration");
    let selectedAdvancePaymentDuration = $this.val();
    if (advancePaymentDuration > selectedAdvancePaymentDuration){
        let duration = "";
        if(advancePaymentDuration == 6){
            duration = "6 months";
        }else if(advancePaymentDuration == 12){
            duration = "1 year";
        }else if(advancePaymentDuration == 24){
            duration = "2 years";
        }
        swal("Warning", `Least advance payment duration is ${duration}`, "warning");
        $this.val(advancePaymentDuration);
    }
    return false;
});



$("#formRentBooking").on('submit', function(e){
    e.stopPropagation();
    var $this = $(this);
    var valid = true;
    $('#formRentBooking select').each(function() {
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
