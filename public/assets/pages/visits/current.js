
$('#datatable').DataTable();
    
$("#datatable tbody tr").on('click', '.btnExtend', function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    $("#formExtend input[name='visit_id']").val($this.data('id'));
    $("#formExtend input[name='checkin']").val($this.data('checkin'));
    $("#formExtend input[name='type']").val($this.data('type'));
    $("#formExtend input[name='status']").val($this.data('status'));
    $("#formExtend input[name='owner']").val($this.data('owner'));
    $("#extendModal").modal('show');
    return false;
});

// select extension date
$(function() {
    $('input[name="extended_date"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        autoApply: true,
        minDate: $('input[name="extended_date"]').data('date'),
    });
});

$('input[name="extended_date"]').on('apply.daterangepicker', function(ev, picker) {
    var checkIn = $("#formExtend input[name='checkin']").val();
    var checkOut = picker.startDate;
    if(checkOut){
        let type = $("#formExtend input[name='type']").val();
        let status = $("#formExtend input[name='status']").val();
        if(type == 'hostel'){
            let checkInDate = new Date(checkIn);
            let checkOutDate = new Date(checkOut);
            let months = (checkOutDate.getFullYear() - checkInDate.getFullYear()) * 12;
            months -= checkInDate.getMonth();
            months += checkOutDate.getMonth();
            let numberOfMonth = (months <= 0)? 0 : months;
            // check if select months is not less
            if (numberOfMonth < 6){
                alert("Extension date should be 6 months or more.");
                return;
            }
        }else{
            if(status == 'rent'){
                let checkInDate = new Date(checkIn);
                let checkOutDate = new Date(checkOut);
                let months = (checkOutDate.getFullYear() - checkInDate.getFullYear()) * 12;
                months -= checkInDate.getMonth();
                months += checkOutDate.getMonth();
                let numberOfMonth = (months <= 0)? 0 : months;
                // check if select months is not less
                if (numberOfMonth < 12){
                    alert("Extension date should be 12 months or more.");
                    return;
                }
            }else if(status == 'short_stay'){
                let checkInDate = new Date(checkIn).getTime();
                let checkOutDate = new Date(checkOut).getTime();
                let distance = checkOutDate - checkInDate;
                let days = Math.floor(distance / (1000 * 60 * 60 * 24));

                // checking max and min stays
                if (days < 3){
                    alert("Extension date should be 3 days or more.");
                    return;
                }
            }
        }
    }
});

$("#formExtend").on('submit', function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    var checkIn = $("#formExtend input[name='checkin']").val();
    var checkOut = $("#formExtend input[name='extended_date']").val();
    let type = $("#formExtend input[name='type']").val();
    let status = $("#formExtend input[name='status']").val();
    if(type == 'hostel'){
        let checkInDate = new Date(checkIn);
        let checkOutDate = new Date(checkOut);
        let months = (checkOutDate.getFullYear() - checkInDate.getFullYear()) * 12;
        months -= checkInDate.getMonth();
        months += checkOutDate.getMonth();
        let numberOfMonth = (months <= 0)? 0 : months;
        // check if select months is not less
        if (numberOfMonth < 6){
            alert("Extension date should be 6 months or more.");
            return;
        }
    }else{
        if(status == 'rent'){
            let checkInDate = new Date(checkIn);
            let checkOutDate = new Date(checkOut);
            let months = (checkOutDate.getFullYear() - checkInDate.getFullYear()) * 12;
            months -= checkInDate.getMonth();
            months += checkOutDate.getMonth();
            let numberOfMonth = (months <= 0)? 0 : months;
            // check if select months is not less
            if (numberOfMonth < 12){
                alert("Extension date should be 12 months or more.");
                return;
            }
        }else if(status == 'short_stay'){
            let checkInDate = new Date(checkIn).getTime();
            let checkOutDate = new Date(checkOut).getTime();
            let distance = checkOutDate - checkInDate;
            let days = Math.floor(distance / (1000 * 60 * 60 * 24));

            // checking max and min stays
            if (days < 3){
                alert("Extension date should be 3 days or more.");
                return;
            }
        }
    }


    // send data
    var valid = true;
    if($('#formExtend input[name="extended_date"]').val()==''){
        valid =false;
    }
    if(valid){
        $(".btnExtendSubmit").html('<i class="fa fa-spin fa-spinner"></i> Submitting...').attr('disabled', true);
        let data = $this.serialize();
        $.ajax({
            url: $this.attr('action'),
            type: 'POST',
            data: data,
            success: function(resp){
                if(resp=='success'){
                    alert('Request sent to property owner.\nWait for confirmation.')
                    $("#extendModal").modal('hide');
                }
                else{
                    alert(resp);
                }
                $(".btnExtendSubmit").text('Submit').attr('disabled', false);
            },
            error: function(resp){
                alert("Something went wrong");
                $(".btnExtendSubmit").text('Submit').attr('disabled', false);
            }
        });
        return true;
    }

    return false;
});