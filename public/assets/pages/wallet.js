// table
$('#datatable, #datatable1, #datatable2').DataTable();

// amount field validation
$('#amount').keypress(function(event) {
    if (((event.which != 46 || (event.which == 46 && $(this).val() == '')) ||
            $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
        event.preventDefault();
    }
}).on('paste', function(event) {
    event.preventDefault();
});

// request for withdrawal
$("#formWithdraw").on("submit", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    var valid = true;
    var oldAmount = $("#formWithdraw #old_amount").val();
    var amount = $("#formWithdraw #amount").val();
    if(amount==''){
        $("#formWithdraw #amount").parents('.validate').find('.mySpan').text("The amount field is required");
    }
    else if(parseFloat(amount)==0){
        $("#formWithdraw #amount").parents('.validate').find('.mySpan').text("Zero amount not allowed");
    }else if(parseFloat(amount)>parseFloat(oldAmount)){
        $("#formWithdraw #amount").parents('.validate').find('.mySpan').text("Not enough balance");
    }

    return false;
});

$("input").on('input', function(){
    if($(this).val()!=''){
        $(this).parents('.validate').find('.mySpan').text('');
    }else{ $(this).parents('.validate').find('.mySpan').text('The '+$(this).attr('name').replace(/[\_]+/g, ' ')+' field is required'); }
});