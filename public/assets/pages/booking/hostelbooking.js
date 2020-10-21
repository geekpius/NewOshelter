$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
})

// BOOKING SCRIPTS //

// open upload modal
$(".btnAddNewID").on("click", function(e){
    e.preventDefault();
    e.stopPropagation();
    $("#idModal").modal("show");
    return false;
});

// function to fire select images
function getFrontFile(){
    document.getElementById("front_file").click();
}

function getBackFile(){
    document.getElementById("back_file").click();
}

// on select of front id card image
$("#front_file").on("change", function(){
    var $this = $(this);
    var form_data = new FormData();
    var size = document.getElementById('front_file').files[0].size;
    var selectedFile = document.getElementById('front_file').files[0].name;
    var ext = selectedFile.replace(/^.*\./, '');
    ext= ext.toLowerCase();
    if(size>1000141){
        swal("Opps", "Uploaded file is greater than 1mb.", "error");
        document.getElementById("front_file").value = null;
    }
    else if(ext!='jpg' && ext!='jpeg' && ext!='png'){
        swal("Opps", "Unknown file types.", "error");
        document.getElementById("front_file").value = null;
    }
    else{
        form_data.append("front_file", document.getElementById('front_file').files[0]);
        $.ajax({
            url: $this.data('url'), 
            type: 'POST',
            data: form_data,
            contentType: false,
            processData: false,
            success: function (response) {
                if(response=='fail'){
                    swal("Opps", "Something went wrong with your inputs. Try again.", "warning");
                }
                else if(response=='error'){
                    swal("Opps", "Something went wrong.", "warning");
                }
                else if(response=='nophoto'){
                    swal("Opps", "No photo is selected.", "warning");
                }
                else{
                    $("#msgStatus").addClass('text-success').text("Uploaded Successfully");
                    $(".front_card").attr("src", $this.data('path')+"/"+response); 
                }
                document.getElementById("front_file").value = null;
            },
            error: function(response){
                alert('Something went wrong.');
                document.getElementById("front_file").value = null;
            }
            
        });
    }
    
    return false;
});

// on select of back id card image
$("#back_file").on("change", function(){
    var $this = $(this);
    var form_data = new FormData();
    var size = document.getElementById('back_file').files[0].size;
    var selectedFile = document.getElementById('back_file').files[0].name;
    var ext = selectedFile.replace(/^.*\./, '');
    ext= ext.toLowerCase();
    if(size>1000141){
        swal("Opps", "Uploaded file is greater than 1mb.", "error");
        document.getElementById("back_file").value = null;
    }
    else if(ext!='jpg' && ext!='jpeg' && ext!='png'){
        swal("Opps", "Unknown file types.", "error");
        document.getElementById("back_file").value = null;
    }
    else{
        form_data.append("back_file", document.getElementById('back_file').files[0]);
        $.ajax({
            url: $this.data('url'), 
            type: 'POST',
            data: form_data,
            contentType: false,
            processData: false,
            success: function (response) {
                if(response=='fail'){
                    swal("Opps", "Something went wrong with your inputs. Try again.", "warning");
                }
                else if(response=='error'){
                    swal("Opps", "Something went wrong.", "warning");
                }
                else if(response=='nophoto'){
                    swal("Opps", "No photo is selected.", "warning");
                }
                else{
                    $("#msgStatus2").addClass('text-success').text("Uploaded Successfully");
                    $(".back_card").attr("src", $this.data('path')+"/"+response); 
                }
                document.getElementById("back_file").value = null;
            },
            error: function(response){
                alert('Something went wrong.');
                document.getElementById("back_file").value = null;
            }
            
        });
    }
    
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
        if($("#owner_message").val()==''){
            $("#owner_message").addClass('is-invalid');
            $("#owner_message").parents('.validate').find('.mySpan').text('owner message field is required');
        }else{
            var data = {
                "step": $this.data('step'),
                "owner_message": $("#owner_message").val(),
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
    }else{
        $("#phone_number").removeClass('is-invalid');
        var data = $("#phone_number").serialize();
        $.ajax({
            url: $this.data('url'),
            type: "POST",
            data: data,
            success: function(resp){
                if(resp=='success'){
                    $(".phoneNumberField").slideUp('fast', function(){
                        $(".verifyCodeField").slideDown('fast');
                        $this.html('<i class="fa fa-arrow-right"></i> Resend Verification');
                    });
                }else{
                    console.log(resp+'. try again.');
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
$("#verify_code").on("keyup", function(e){
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

// get total amount on payment summary
$("#totalPayment").text($("#totalFeeResult").text());


// select visa
$("#visa").on("change", function(){
    var $this = $(this);
    if($this.prop("checked", true)){
        $("#momoExpand").slideUp('fast');
        $("#visaExpand").slideDown('fast', function(){
            $("#formMobileMobile")[0].reset();
        });
    }
});

// select momo
$("#mobile_money").on("change", function(){
    var $this = $(this);
    if($this.prop("checked", true)){
        $("#visaExpand").slideUp('fast');
        $("#momoExpand").slideDown('fast', function(){
            $("#formVisa")[0].reset();
        });
    }
});

// make payment
$(".makePayment").on('click', function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    if(document.getElementById('mobile_money').checked){
        var valid = true;
        $('#formMobileMobile input, #formMobileMobile select').each(function() {
            var $this = $(this);
            
            if(!$this.val()) {
                valid = false;
                $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
                $this.addClass('is-invalid');
            }
        });
        if(valid){
            $this.attr('disabled', true);
            let data = {
                mobile_operator: $('#formMobileMobile #mobile_operator').val(),
                country_code: $('#formMobileMobile input[name="country_code"]').val(),
                mobile_number: $('#formMobileMobile input[name="mobile_number"]').val(),
                amount: parseFloat($(".makePayment #payAmount").text()),
            }
            
            $.ajax({
                url: $("#formMobileMobile").attr('action'),
                type: "POST",
                data: data,
                success: function(resp){
                    // alert(resp);
                    if(resp == 'success'){
                        swal({
                            title: "Success",
                            text: "Check your phone to enter your pin.",
                            type: "success",
                            confirmButtonClass: "btn-primary btn-sm",
                            confirmButtonText: "OKAY",
                            closeOnConfirm: true
                        });
                    }
                    else{
                        swal("Error", resp, "warning");
                    }
                },
                error: function(resp){
                    console.log('something went wrong with request');
                }
            });
            return false;
        }
    }else if(document.getElementById('visa').checked){
        var valid = true;
        $('#formVisa input, #formVisa select').each(function() {
            var $this = $(this);
            
            if(!$this.val()) {
                valid = false;
                $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
                $this.addClass('is-invalid');
            }
        });
        if(valid){
            return false;
        }
    }else{
        swal("Select", "Select payment option.", "warning");
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

function isMonthAndYear(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode !== 47) 
    {
        return false;
    }
    return true;
}