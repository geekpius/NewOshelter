$("#formBookHostel #block_name").on("change", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this= $(this);
    $("#formBookHostel #room_type").find('.after').nextAll().remove();
    $("#formBookHostel #room_number").find('.after').nextAll().remove();
    $("#hostelAvailabilityChecker").text('');
    $("#myHostelPriceHeading").fadeOut('slow',function(){
        $("#myHostelSwitch").fadeIn('fast');
    });
    if($this.val()!=''){
        var data={ block_name:$this.val() }
        $("#formBookHostel #room_type").find('.after').nextAll().remove();
        $.ajax({
            url: "{{ route('property.get.roomtype') }}",
            type: "POST",
            data: data,
            dataType: 'json',
            success: function(resp){
                let options = '';
                $.each( resp, function( key, value ) {
                    options+='<option value='+value.id+'>'+value.block_room_type +'</option>';
                });
                $("#formBookHostel #room_type").find('.after').after(options);
            },
            error: function(resp){
                alert("Something went wrong with request");
            }
        });
    }
    else{
        $("#formBookHostel #room_type").find('.after').nextAll().remove();
    }
    return false;
});

$("#formBookHostel #room_type").on("change", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this= $(this);
    $("#hostelAvailabilityChecker").text('');
    $("#myHostelPriceHeading").fadeOut('slow',function(){
        $("#myHostelSwitch").fadeIn('fast');
    });
    if($this.val()!=''){
        var data={ room_type:$this.val() }
        $("#formBookHostel #room_number").find('.after').nextAll().remove();
        $.ajax({
            url: "{{ route('property.get.roomnumber') }}",
            type: "POST",
            data: data,
            dataType: 'json',
            success: function(resp){
                let options = '';
                $.each( resp, function( key, value ) {
                    options+='<option value='+value.room_no+'>'+value.room_no +'</option>';
                });
                $("#formBookHostel #room_number").find('.after').after(options);
            },
            error: function(resp){
                alert("Something went wrong with request");
            }
        });
    }
    else{
        $("#formBookHostel #room_number").find('.after').nextAll().remove();
    }
    return false;
});

$("#formBookHostel #room_number").on("change", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this= $(this);
    if($this.val()!=''){
        var data={ room_number:$this.val(), room_type:$("#formBookHostel #room_type").val() }
        $.ajax({
            url: "{{ route('property.check.roomtype') }}",
            type: "POST",
            data: data,
            dataType: 'json',
            success: function(resp){
                $("#hostelAvailabilityChecker").text(resp.data);
                $("#myHostelCurrency").text(resp.currency);
                $("#initialHostelAmount").text(resp.price+'/');
                $("#myHostelPriceCal").text(resp.calendar+' per person');
                $("#myHostelAdvance").text(resp.advance);
                $("#myHostelSwitch").fadeOut('slow',function(){
                    $("#myHostelPriceHeading").fadeIn('fast');
                });
            },
            error: function(resp){
                alert("Something went wrong with request");
            }
        });
    }
    else{
        $("#hostelAvailabilityChecker").text('');
        $("#myHostelPriceHeading").fadeOut('slow',function(){
            $("#myHostelSwitch").fadeIn('fast');
        });
    }
    return false;
});