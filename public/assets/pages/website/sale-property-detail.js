
$("#formOrder").on('submit', function(e){
    e.stopPropagation();
    var $this = $(this);
    var valid = true;
    $('#formOrder select').each(function() {
        var $this = $(this);
        
        if(!$this.val()) {
            valid = false;
            $this.addClass('is-invalid');
        }
    });
    if(valid){
        $(".btnOrder").html('<i class="fa fa-spin fa-spinner"></i> Placing order...').attr('disabled', true);
        return true;
    }
    return false;
});
