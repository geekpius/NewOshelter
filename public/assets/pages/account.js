// getting legal info on update
function getLegalName(name) { 
    document.getElementById('myLegalName').innerText = name;
}

function getAge(dob) { 
    var diff_ms = Date.now() - dob.getTime();
    var age_dt = new Date(diff_ms); 
  
    var result =  Math.abs(age_dt.getUTCFullYear() - 1970);
    document.getElementById('myAge').innerHTML = "("+result+")";
}


function getCity(city) { 
    document.getElementById('myCity').innerText = city;
}

function getOccupation(occupation) { 
    document.getElementById('myOccupation').innerText = occupation;
}


// profile photo
function getFile(){
    document.getElementById("upfile").click();
}

$("#upfile").on("change", function(){
    var form_data = new FormData();
    var size = document.getElementById('upfile').files[0].size;
    var selectedFile = document.getElementById('upfile').files[0].name;
    var ext = selectedFile.replace(/^.*\./, '');
    ext= ext.toLowerCase();
    if(size>1000141){
        swal("Opps", "Uploaded file is greater than 1mb.", "error");
        document.getElementById("upfile").value = null;
    }
    else if(ext!='jpg' && ext!='jpeg' && ext!='png'){
        swal("Opps", "Unknown file types.", "error");
        document.getElementById("upfile").value = null;
    }
    else{
        form_data.append("photo", document.getElementById('upfile').files[0]);
        $.ajax({
            url: $("#upfile").data('href'), 
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
                    let src = $(".img_preview").data('preview');
                    $(".img_preview").attr("src", "/assets/images/users/"+response); 
                }
                document.getElementById("upfile").value = null;
            },
            error: function(response){
                alert('Something went wrong.');
                document.getElementById("upfile").value = null;
            }
            
        });
    }
    
    return false;
});


// ID card
$(".btnAddNewID").on("click", function(e){
    e.preventDefault();
    e.stopPropagation();
    $("#idModal").modal("show");
    return false;
});

function getFrontFile(){
    document.getElementById("front_file").click();
}

function getBackFile(){
    document.getElementById("back_file").click();
}

$("#front_file").on("change", function(){
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
            url: $("#front_file").data('href'), 
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
                    $(".front_card").attr("src", "/assets/images/cards/"+response); 
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

$("#back_file").on("change", function(){
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
            url: $("#back_file").data('href'), 
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
                    $(".back_card").attr("src", "/assets/images/cards/"+response); 
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


// change password
$("#formChangePassword").on("submit", function(e){
    e.preventDefault();
    e.stopPropagation();
    var valid = true;
    $('#formChangePassword input').each(function() {
        var $this = $(this);
        
        if(!$this.val()) {
            valid = false;
            $this.parents('.validate').find('span:last').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
        }
    });
    if(valid) {
        $('.btnChangePassword').html('<i class="fa fa-spinner fa-spin"></i> Changing Password...').attr('disabled', true);
        var data = $("#formChangePassword").serialize();
        $.ajax({
            url: $("#formChangePassword").data('action'),
            type: "POST",
            data: data,
            success: function(resp){
                if(resp=='success'){
                    swal({
                        title: "Changed",
                        text: "Password is changed",
                        type: "success",
                        confirmButtonClass: "btn-primary btn-sm",
                        confirmButtonText: "OKAY",
                        closeOnConfirm: true
                    });
                }
                else{
                    swal({
                        title: "Opps",
                        text: resp,
                        type: "error",
                        confirmButtonClass: "btn-primary btn-sm",
                        confirmButtonText: "OKAY",
                        closeOnConfirm: true
                    });
                }
                
                $("#formChangePassword")[0].reset();
                $('.btnChangePassword').html('<i class="fa fa-refresh"></i> Change Password').attr('disabled', false);
                $("#currrent_password").focus();
            },
            error: function(resp){
                alert("Something went wrong.");
                $('.btnChangePassword').html('<i class="fa fa-refresh"></i> Change Password').attr('disabled', false);
            }
        });
    }
    return false;
});

$("#formChangePassword input").on('input', function(){
    if($(this).val()!=''){
        $(this).parents('.validate').find('span:last').text('');
    }else{ $(this).parents('.validate').find('span:last').text('The '+$(this).attr('name').replace(/[\_]+/g, ' ')+' field is required'); }
});

//coupon
$(".btnAddCoupon").on("click", function(e){
    e.preventDefault();
    e.stopPropagation();
    $(this).hide();
    $("#formCoupon").fadeIn('slow');
    return false;
});

$("#formCoupon").on("submit", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    var valid = true;
    $('#formCoupon input').each(function() {
        var $this = $(this);
        
        if(!$this.val()) {
            valid = false;
            $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
        }
    });
    if(valid){
        alert('saved');
    }
    return false;
});

$(".btnSaveCouponCancel").on("click", function(e){
    e.preventDefault();
    e.stopPropagation();
    $("#formCoupon").hide();
    $('.btnAddCoupon').fadeIn('slow');
    return false;
});

///vat/tin
// $("#formVat").on("submit", function(e){
//     e.preventDefault();
//     e.stopPropagation();
//     var $this = $(this);
//     var valid = true;
//     $('#formVat input, #formVat select').each(function() {
//         var $this = $(this);
        
//         if(!$this.val()) {
//             valid = false;
//             $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
//         }
//     });
//     if(valid){
//         var data = $('#formVat').serialize();
//         $(".btnStoreVat").html('<i class="fa fa-spin fa-spinner"></i> Submitting..').attr('disabled', true);
//         $.ajax({
//             url: $("#formVat").data('action'), 
//             type: 'POST',
//             data: data,
//             success: function (resp) {
//                 if(resp=='success'){
//                     swal("Submitted", "Submitted successful. Wait for confirmation.", "success");
//                     getVatInfo();
//                 }else if(resp=='confirm'){
//                     swal("Exists", "Already have a confirmed VAT/TIN.", "success");
//                 }
//                 else{
//                     swal("Opps", resp, "error");
//                 }

//                 $("#formVat")[0].reset();
//                 $(".btnStoreVat").html('Submit').attr('disabled', false);
//             },
//             error: function(resp){
//                 alert('Something went wrong.');
//                 $(".btnStoreVat").html('Submit').attr('disabled', false);
//             }
            
//         });
//     }
//     return false;
// });

// $("#formVat input, #formCoupon input").on('input', function(){
//     if($(this).val()!=''){
//         $(this).parents('.validate').find('.mySpan').text('');
//     }else{ $(this).parents('.validate').find('.mySpan').text('The '+$(this).attr('name').replace(/[\_]+/g, ' ')+' field is required'); }
// });

// $("#formVat select").on('input', function(){
//     if($(this).val()!=''){
//         $(this).parents('.validate').find('.mySpan').text('');
//     }else{ $(this).parents('.validate').find('.mySpan').text('The '+$(this).attr('name').replace(/[\_]+/g, ' ')+' field is required'); }
// });

// function getVatInfo(){
//     $.ajax({
//         url: $(".myTableDiv").data('href'), 
//         type: 'GET',
//         dataType: 'json',
//         success: function (resp) {
//             if(resp.msg=='empty'){
//                 console.log('Empty');
//             }else{
//                 var confirm = (resp.confirm==1)? 'Cofirmed':'Not confirmed';
//                 $(".myTableRow").append('<td>'+resp.vat_id+'</td><td>'+resp.name+'</td><td>'+confirm+'</td>');
//                 $(".myTableDiv").show('fast');
//                 $(".btnVatModal").hide('fast');
//             }
//         },
//         error: function(resp){
//             alert('Something went wrong.');
//         }
        
//     });
// }

// getVatInfo();


//check notifications
$(".checkMessage").on("change", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    var data = {
        message : $this.data('value')
    }

    $.ajax({
        url: $this.data('href'), 
        type: 'POST',
        data: data,
        success: function (resp) {
            
        },
        error: function(resp){
            console.log('Request error.');
        }
        
    });
    return false;
});

$(".checkSupport").on("change", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    var data = {
        support : $this.data('value')
    }

    $.ajax({
        url: $this.data('href'), 
        type: 'POST',
        data: data,
        success: function (resp) {
            
        },
        error: function(resp){
            console.log('Request error.');
        }
        
    });
    return false;
});

$(".checkReminder").on("change", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    var data = {
        reminder : $this.data('value')
    }

    $.ajax({
        url: $this.data('href'), 
        type: 'POST',
        data: data,
        success: function (resp) {
            
        },
        error: function(resp){
            console.log('Request error.');
        }
        
    });
    return false;
});

$(".checkPolicy").on("change", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    var data = {
        policy : $this.data('value')
    }

    $.ajax({
        url: $this.data('href'), 
        type: 'POST',
        data: data,
        success: function (resp) {
            
        },
        error: function(resp){
            console.log('Request error.');
        }
        
    });
    return false;
});

$(".checkUnsubscribe").on("change", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    $.ajax({
        url: $this.data('href'), 
        type: 'POST',
        success: function (resp) {
            
        },
        error: function(resp){
            console.log('Request error.');
        }
        
    });
    return false;
});
