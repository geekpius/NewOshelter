const paymentForm = document.getElementById('paymentForm');
paymentForm.addEventListener("submit", isBookingPaid, false);

var initialButtonText = document.getElementById("paymentButton").innerText;

function isBookingPaid(e)
{
  e.preventDefault();
  let url = $("#paymentForm #paymentButton").data("url");
  document.getElementById("paymentButton").disabled = true;
  document.getElementById("paymentButton").innerText= "WAITING FOR VERIFICATION.....";
  $.ajax({
      url: url,
      method: 'POST',
      success: function (resp) {
        if(resp == 'paid'){
          swal("Already", "Already paid for this booking.", "success");
          document.getElementById("paymentButton").disabled = false;
          document.getElementById("paymentButton").innerText= initialButtonText;
        }else{
          payWithPaystack();
        }
      },
      error: function(resp){
          console.log("something went wrong");
          document.getElementById("paymentButton").disabled = false;
          document.getElementById("paymentButton").innerText= initialButtonText;
      }
  });
  return false;
}

function payWithPaystack() {
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
        document.getElementById("paymentButton").innerText= initialButtonText;
    },
    callback: function(response){
        let url = $("#paymentForm").data("url");
        let data = {
            _token: $("#paymentForm input[name='_token']").val(),
            booking_id: $("#paymentForm input[name='booking_id']").val(),
            owner: $("#paymentForm input[name='owner']").val(),
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
                document.getElementById("paymentButton").innerText= initialButtonText;
              }else if(resp=='error'){
                swal("Warning", "Something happened with verification. Contact us for support.", "warning");
                document.getElementById("paymentButton").disabled = false;
                document.getElementById("paymentButton").innerText= initialButtonText;
              }else if(resp=='catch'){
                swal("Warning", "Your payment could not be verified. Check your email if you have received payment notification. Contact us for support.", "warning");
                document.getElementById("paymentButton").disabled = false;
                document.getElementById("paymentButton").innerText= initialButtonText;
              }else{  
                window.location.href = resp;
              }
              
            },
            error: function(resp){
                console.log("something went wrong");
                document.getElementById("paymentButton").disabled = false;
                document.getElementById("paymentButton").innerText= initialButtonText;
            }
        });
    }
  });
  handler.openIframe();
}


var shareData = {};
let marker;
function initMap(latitude, longitude) {        
  const myLatLng = { lat: latitude, lng: longitude };
  const map = new google.maps.Map(document.getElementById("gmaps-markers"), {
    zoom: 20,
    center: myLatLng,
  });

  marker = new google.maps.Marker({
    position: myLatLng,
    draggable: true,
    map,
  });

}


$("#viewLocation").on('click', function(){
  var $this = $(this);
  $("#locationModal .modal-title").text($this.data('title'));
  let latitude = $this.data('lat');
  let longitude = $this.data('lng');
  initMap(Number(latitude), Number(longitude));
  shareData = {
    text: $this.data('text'),
    link: $this.data('link')
  }
  $("#locationModal").modal('show');
  return false;
});

const btn = document.querySelector('.btnShare');

btn.addEventListener('click', async () => {
  try {
    await navigator.share({
      title: document.title,
      text: shareData.text,
      url: shareData.link
    })
  } catch(err) {
    console.log('error');
  }

  console.log(shareData.link)
});
