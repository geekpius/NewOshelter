$('#datatable, #datatable1').DataTable();
$("#datatable tbody").on('click', '.btn-withdraw', function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    let amount = $this.parents('.record').find('td').eq(1).text();
    $("#cashOutModal .modal-title").text(`You are about to cash out ${amount}`);
    $("#formCashOut input:text, #formCashOut select").val('');
    $("#formCashOut input[name='phone_number']").val('');
    $("#mobileOptions").hide();
    $("#bankOptions").hide();
    $("#formCashOut input[name='wallet_id']").val($this.data('id'));
    $("#formCashOut input[name='balance']").val($this.data('balance'));
    $("#formCashOut input[name='currency']").val($this.data('currency'));
    $("#cashOutModal").modal('show');
    return false;
});

$("#formCashOut select[name='payment_mode']").on("change", function(){
    var $this = $(this);
    if($this.val() != ''){
        if($this.val() == "mobile_money"){
            $("#bankOptions").hide();
            $("#mobileOptions").show();
        }else if($this.val() == "bank"){
            $("#mobileOptions").hide();
            $("#bankOptions").show();
        }
    }else{
        $("#mobileOptions").hide();
        $("#bankOptions").hide();
    }
});

$("#formCashOut input[name='phone_number']").on("input", function(){
    var $this = $(this);
    if($this.val().startsWith("00") || !$this.val().startsWith("0")){
        $(".msg-number").text('Phone number is invalid');
    }
    if($this.val() == ""){
        $(".msg-number").text('');
    }
    if($this.val().startsWith("024") || $this.val().startsWith("054") || $this.val().startsWith("059")){
        $("#formCashOut select[name='network_type']").val("mtn");
        $(".msg-number").text('');
        $(".msg-network").text('');
    }
    else if($this.val().startsWith("026") || $this.val().startsWith("027") || $this.val().startsWith("057")){
        $("#formCashOut select[name='network_type']").val("airteltigo");
        $(".msg-number").text('');
        $(".msg-network").text('');
    }
    else if($this.val().startsWith("020") || $this.val().startsWith("050")){
        $("#formCashOut select[name='network_type']").val("vodafone");
        $(".msg-number").text('');
        $(".msg-network").text('');
    }
});

$("#formCashOut input[name='phone_number'], #formCashOut input[name='account_number']").keypress(function(event) {
    if (((event.which != 46 || (event.which == 46 && $(this).val() == '')) ||
            $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
        event.preventDefault();
    }
}).on('paste', function(event) {
    event.preventDefault();
});

$(".btnMomoRequest").on("click", function(e){
    e.preventDefault();
    var valid = true;
    $('#formCashOut input, #formCashOut select').each(function() {
        var $this = $(this);
        
        if(!$this.val() && $this.attr('name')!='bank_name' && $this.attr('name')!='account_number' && $this.attr('name')!='account_name') {
            valid = false;
            $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
        }
    });

    if(valid){
        let data = $("#formCashOut").serialize();
        $.ajax({
            url: $("#formCashOut").attr('action'),
            type: "POST",
            data: data,
            success: function(resp){
                if(resp === 'success'){
                    swal({
                        title: "Success",
                        text: "Your withdrawal request is sent.",
                        type: "success",
                        confirmButtonClass: "btn-success btn-sm",
                        confirmButtonText: "OKAY",
                        closeOnConfirm: false
                        },
                    function(){
                        window.location.reload();
                    });
                }else{
                    swal('Warning', resp, 'warning');
                }
            },
            error: function(resp){
                console.log("Something went wrong with request");
            }
        });
    }
});


$(".btnBankRequest").on("click", function(e){
    e.preventDefault();
    var valid = true;
    $('#formCashOut input, #formCashOut select').each(function() {
        var $this = $(this);
        
        if(!$this.val() && $this.attr('name')!='phone_number' && $this.attr('name')!='network_type' && $this.attr('name')!='momo_account_name') {
            valid = false;
            $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
        }
    });

    if(valid){
        let data = $("#formCashOut").serialize();
        $.ajax({
            url: $("#formCashOut").attr('action'),
            type: "POST",
            data: data,
            success: function(resp){
                if(resp === 'success'){
                    swal({
                        title: "Success",
                        text: "Your withdrawal request is sent.",
                        type: "success",
                        confirmButtonClass: "btn-success btn-sm",
                        confirmButtonText: "OKAY",
                        closeOnConfirm: false
                        },
                    function(){
                        window.location.reload();
                    });
                }else{
                    swal('Warning', resp, 'warning');
                }
            },
            error: function(resp){
                console.log("Something went wrong with request");
            }
        });
    }
});

$("#formCashOut input").on('input', function(){
    if($(this).val()!=''){
        $(this).parents('.validate').find('.mySpan').text('');
    }else{ $(this).parents('.validate').find('.mySpan').text('The '+$(this).attr('name').replace(/[\_]+/g, ' ')+' field is required'); }
});
$("#formCashOut select").on('change', function(){
    if($(this).val()!=''){
        $(this).parents('.validate').find('.mySpan').text('');
    }else{ $(this).parents('.validate').find('.mySpan').text('The '+$(this).attr('name').replace(/[\_]+/g, ' ')+' field is required'); }
});


var cashInBtn = document.getElementById('cashIn');
var cashOutBtn = document.getElementById('cashOut');
function clickOpenCashOut(e){
    e.preventDefault();
    $("#cashInTable").hide("slow");
    cashInBtn.classList.remove("btn","btn-primary","btn-sm");
    $("#cashOutTable").show("slow");
    cashOutBtn.classList.add("btn","btn-primary","btn-sm");
}


function clickOpenCashIn(e){
    e.preventDefault();
    $("#cashOutTable").hide("slow");
    cashOutBtn.classList.remove("btn","btn-primary","btn-sm");
    $("#cashInTable").show("slow");
    cashInBtn.classList.add("btn","btn-primary","btn-sm");
}