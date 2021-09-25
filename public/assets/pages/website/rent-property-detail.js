// $("#formRentBooking select[name='duration']").on('change', function(e){
//     e.preventDefault();
//     e.stopPropagation();
//     var $this = $(this);
//     let advancePaymentDuration = $("#initialAmount").data("duration");
//     let selectedAdvancePaymentDuration = $this.val();
//     if (parseInt(advancePaymentDuration) > parseInt(selectedAdvancePaymentDuration)){
//         let duration = "";
//         if(advancePaymentDuration == 6){
//             duration = "6 months";
//         }else if(advancePaymentDuration == 12){
//             duration = "1 year";
//         }else if(advancePaymentDuration == 24){
//             duration = "2 years";
//         }
//         swal("Warning", `Least advance payment duration is ${duration}`, "warning");
//         $this.val(advancePaymentDuration);
//         selectedAdvancePaymentDuration = advancePaymentDuration;
//     }
//
//
//     let totalPrice = selectedAdvancePaymentDuration*parseFloat($("#initialAmount").data('amount'));
//     let months = "";
//     if(selectedAdvancePaymentDuration == 6){
//         months = `${selectedAdvancePaymentDuration} months`;
//     }
//     else if(selectedAdvancePaymentDuration == 12){
//         months = "1 year";
//     }
//     else if(selectedAdvancePaymentDuration == 24){
//         months = "2 years";
//     }
//
//     $('#formRentBooking #dateCalculator').text(`${$("#initialAmount").data('amount')} x ${months}`);
//     $('#dateCalculatorResult').text(`${$("#initialCurrency").data('currency')} ${totalPrice.toFixed(2)}`);
//     // getting service fee
//     let serviceCharge = parseFloat($("#formRentBooking input[name='charge']").val());
//     let discountCharge = parseFloat($("#formRentBooking input[name='discount']").val());
//     let serviceFee = (serviceCharge/100)*totalPrice;
//     let discountFee = (discountCharge/100)*totalPrice;
//     let totalAmount = (totalPrice+serviceFee)-discountFee;
//     $("#serviceFeeResult").text(`${$("#initialCurrency").data('currency')} ${serviceFee.toFixed(2)}`);
//     if(discountFee !== 0){
//         $("#discountFeeResult").text(`${$("#initialCurrency").data('currency')} ${discountFee.toFixed(2)}`);
//         $("#discountFee").show();
//     }
//     $("#totalFeeResult").text(`${$("#initialCurrency").data('currency')} ${totalAmount.toFixed(2)}`);
//
//     $("#formRentBooking #showCalculations").hide().slideDown('slow');
//
//
//     return false;
// });


$("#formRentBooking").on('submit', function(e){
    e.stopPropagation();
    var $this = $(this);
    var valid = true;
    // $('#formRentBooking select').each(function() {
    //     var $this = $(this);
    //
    //     if(!$this.val()) {
    //         valid = false;
    //         $this.addClass('is-invalid');
    //     }
    // });
    if(valid){
        $(".btnRentBook").html('<i class="fa fa-spin fa-spinner"></i> Booking...').attr('disabled', true);
        return true;
    }
    return false;
});
