
$("#formEvent").on('submit', function(e){
    e.stopPropagation();
    var valid = true;
    if(valid){
        $(".btnEvent").html('<i class="fa fa-spin fa-spinner"></i> Booking event...').attr('disabled', true);
        return true;
    }
    return false;
});
