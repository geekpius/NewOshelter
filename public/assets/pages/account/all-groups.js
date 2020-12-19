// go back route 
function goBackRoute(e){
    e.preventDefault();
    let windowWidth = $(window).width();
    let url = $("#goBack").data("url");
    if(windowWidth <= 991){
        window.location.href = `${url}#show=true`;
    }else{
        window.location.href = url;
    }
}


function getLegalName(name) { 
    document.getElementById('myLegalName').innerText = name;
}

function getOccupation(occupation) { 
    document.getElementById('myOccupation').innerText = occupation;
}


// update profile
$("#formProfileUpdate").on("submit", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    var valid = true;
    $('#formProfileUpdate input, #formProfileUpdate select').each(function() {
        var $this = $(this);
        
        if(!$this.val()) {
            valid = false;
            $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
        }
    });
    if(valid){
        $(".btnProfileUpdate").html('<i class="fa fa-spin fa-spinner"></i> Updating Profile...').attr('disabled', true);
        let data  = $this.serialize();
        $.ajax({
            url: $this.data("action"),
            type: "POST",
            data: data,
            success: function(resp){
                if(resp=='success'){
                    swal("Updated", "Profile update successful", "success");
                    getLegalName($("#formProfileUpdate input[name='legal_name']").val());
                    getOccupation($("#formProfileUpdate input[name='profession']").val());
                }
                else{
                    alert("Something went wrong");
                }
                $(".btnProfileUpdate").html('<i class="fa fa-refresh"></i> Update Profile').attr('disabled', false);
            },
            error: function(resp){
                alert("Something went wrong with your request");
                $(".btnProfileUpdate").html('<i class="fa fa-refresh"></i> Update Profile').attr('disabled', false);
            }
        });
    }
    return false;
});


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
                    $("#formChangePassword input[name='current_password']").val("");
                    $("#formChangePassword input[name='password']").val("");
                    $("#formChangePassword input[name='password_confirmation']").val("");
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


// //coupon
// $(".btnAddCoupon").on("click", function(e){
//     e.preventDefault();
//     e.stopPropagation();
//     $(this).hide();
//     $("#formCoupon").fadeIn('slow');
//     return false;
// });

// $("#formCoupon").on("submit", function(e){
//     e.preventDefault();
//     e.stopPropagation();
//     var $this = $(this);
//     var valid = true;
//     $('#formCoupon input').each(function() {
//         var $this = $(this);
        
//         if(!$this.val()) {
//             valid = false;
//             $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
//         }
//     });
//     if(valid){
//         alert('saved');
//     }
//     return false;
// });

// $(".btnSaveCouponCancel").on("click", function(e){
//     e.preventDefault();
//     e.stopPropagation();
//     $("#formCoupon").hide();
//     $('.btnAddCoupon').fadeIn('slow');
//     return false;
// });

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