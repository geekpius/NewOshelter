$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
})


function getBillContent()
{
    $.ajax({
        url: $("#getBillContent").data('href'),
        type: "GET",
        success: function(resp){
            $("#getBillContent").html(resp);
        },
        error: function(resp){
            console.log('something went wrong with request');
        }
    });
}
getBillContent();

// pull up modal
$("#btnAddBill").on("click", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    $('#addUtilityModal').modal('show');
    return false;
});

$("#formAddBill").on("submit", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    var valid = true;
    $('#formAddBill input, #formAddBill select').each(function() {
        let $this = $(this);
        
        if(!$this.val()) {
            valid = false;
            $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
        }
    });

    if(valid){
        $(".btnAddBill").html('<i class="fa fa-spin fa-spinner"></i> Adding Bill...').attr('disabled',true);
        let data = $this.serialize();
        $.ajax({
            url: $this.data('href'),
            type: "POST",
            data: data,
            success: function(resp){
                if(resp=='success'){
                    getBillContent();
                    $("#formAddBill #amount, #formAddBill #bill").val('');
                    $('#addUtilityModal').modal('hide');
                }else{
                    swal("Error", resp, "error");
                }
                $(".btnAddBill").html('<i class="mdi mdi-plus-circle fa-lg"></i> Add Bill').attr('disabled',false);
            },
            error: function(resp){
                console.log('something went wrong with request');
            }

        });
    }
    return false;
});

$('#amount').keypress(function(event) {
    if (((event.which != 46 || (event.which == 46 && $(this).val() == '')) ||
            $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
        event.preventDefault();
    }
}).on('paste', function(event) {
    event.preventDefault();
});