
$('#datatable').DataTable();
    
$("#datatable tbody tr").on('click', '.btnExtend', function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    $("#formExtend input[name='visit_id']").val($this.data('id'));
    $("#formExtend input[name='checkin']").val($this.data('checkin'));
    $("#formExtend input[name='type']").val($this.data('type'));
    $("#formExtend input[name='owner']").val($this.data('owner'));
    $("#formExtend input[name='extended_date']").val($this.data('checkin'));
    $("#formExtend input[name='duration']").val($this.data('duration'));
    $("#extendModal").modal('show');

    // initialize date range
    $(function() {
        $('input[name="extended_date"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            autoApply: true,
            minDate: $('input[name="extended_date"]').val(),
        });
    });
    return false;
});


// select checkout date
$('input[name="extended_date"]').on('apply.daterangepicker', function(ev, picker) {
    var checkIn = $("#formExtend input[name='checkin']").val();
    var checkOut = picker.startDate;
    if(checkOut){
        let checkInDate = new Date(checkIn);
        let checkOutDate = new Date(checkOut);
        let months = (checkOutDate.getFullYear() - checkInDate.getFullYear()) * 12;
        months -= checkInDate.getMonth();
        months += checkOutDate.getMonth();
        let numberOfMonth = (months <= 0)? 0 : months;
        // check if select months is not less
        let duration = $("#formExtend input[name='duration']").val();
        if (numberOfMonth < parseInt(duration)){
            swal("Warning", `Extension date should be ${duration} months or more`, "warning");
            $('input[name="extended_date"]').val(checkIn);
            return;
        }
    }
});


$("#formExtend").on('submit', function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    var checkIn = $("#formExtend input[name='checkin']").val();
    var checkOut = $("#formExtend input[name='extended_date']").val();
    let checkInDate = new Date(checkIn);
    let checkOutDate = new Date(checkOut);
    let months = (checkOutDate.getFullYear() - checkInDate.getFullYear()) * 12;
    months -= checkInDate.getMonth();
    months += checkOutDate.getMonth();
    let numberOfMonth = (months <= 0)? 0 : months;
    // check if select months is not less
    let duration = $("#formExtend input[name='duration']").val();
    if (numberOfMonth < parseInt(duration)){
        swal("Warning", `Extension date should be ${duration} months or more`, "warning");
        return;
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
                    swal("Success", "Request sent to property owner.\nWait for confirmation.", "success");
                    $("#extendModal").modal('hide');
                }
                else{
                    swal("Warning", resp, "warning");
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