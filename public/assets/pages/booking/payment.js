const paymentForm = document.getElementById('paymentForm');
paymentForm.addEventListener("submit", payWithPaystack, false);

function payWithPaystack(e) {
  e.preventDefault();
  document.getElementById("paymentButton").disabled = true;
  let handler = PaystackPop.setup({
    key: 'pk_test_816a9713c650da936913373b265a690a4948feb3', // Replace with your public key
    email: document.getElementById("email-address").value,
    amount: parseFloat(document.getElementById("totalFee").value) * 100,
    currency: document.getElementById("userCurrency").value, // Use GHS for Ghana Cedis or USD for US Dollars
    ref: document.getElementById("referenceId").value, // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"
    onClose: function(){
        swal("Cancelled", "This transaction was cancelled.", "warning");
        document.getElementById("paymentButton").disabled = false;
    },
    callback: function(response){
        let url = $("#paymentForm").data("url");
        let data = {
            _token: $("#paymentForm input[name='_token']").val(),
            booking_id: $("#paymentForm input[name='booking_id']").val(),
            type: $("#paymentForm input[name='type']").val(),
            currency: $("#paymentForm input[name='currency']").val(),
            amount: $("#paymentForm input[name='amount']").val(),
            service_fee: $("#paymentForm input[name='service_fee']").val(),
            discount_fee: $("#paymentForm input[name='discount_fee']").val(),
            reference_id: response.reference
        }
        $.ajax({
            url: url,
            method: 'POST',
            data: data,
            success: function (resp) {
              if(resp=='fail'){
                swal("Warning", "Did not found reference ID.", "warning");
                document.getElementById("paymentButton").disabled = false;
              }else if(resp=='error'){
                swal("Warning", "Something happened with verification.", "warning");
                document.getElementById("paymentButton").disabled = false;
              }else if(resp=='catch'){
                swal("Warning", "Your payment could not be verified. Check your email if you have received payment notification.", "warning");
                document.getElementById("paymentButton").disabled = false;
              }else{  
                window.location.href = resp;
              }
              
            },
            error: function(resp){
                console.log("something went wrong");
            }
        });
    }
  });
  handler.openIframe();
}
