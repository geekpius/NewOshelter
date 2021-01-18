
$('#datatable').DataTable();
    
$("#datatable tbody tr").on('click', '.btnExtend', function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    let typeStatus = $this.data("status");
    let type = $this.data("type");
    if(type == "hostel"){
        $("#formHostelExtend input[name='visit_id']").val($this.data('id'));
        $("#formHostelExtend input[name='checkin']").val($this.data('checkin'));
        $("#formHostelExtend input[name='type']").val($this.data('type'));
        $("#formHostelExtend input[name='status']").val($this.data('status'));
        $("#formHostelExtend input[name='owner']").val($this.data('owner'));
        $("#formHostelExtend input[name='duration']").val($this.data('duration'));
        $("#formHostelExtend").show("fast");
    }else{
        if(typeStatus == 'short_stay'){
            $("#formShortStayExtend input[name='visit_id']").val($this.data('id'));
            $("#formShortStayExtend input[name='checkin']").val($this.data('checkin'));
            $("#formShortStayExtend input[name='type']").val($this.data('type'));
            $("#formShortStayExtend input[name='status']").val($this.data('status'));
            $("#formShortStayExtend input[name='owner']").val($this.data('owner'));
            $("#formShortStayExtend input[name='min_stay']").val($this.data('min'));
            $("#formShortStayExtend input[name='max_stay']").val($this.data('max'));
            $("#formShortStayExtend input[name='extended_date']").val($this.data('checkin'));
            $("#formRentExtend").hide("fast");
            $("#formShortStayExtend").show("fast");

            // initialize date range
            $(function() {
                $('input[name="extended_date"]').daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true,
                    autoApply: true,
                    minDate: $('input[name="extended_date"]').val(),
                });
            });
        }else if(typeStatus == 'rent'){
            $("#formRentExtend input[name='visit_id']").val($this.data('id'));
            $("#formRentExtend input[name='checkin']").val($this.data('checkin'));
            $("#formRentExtend input[name='type']").val($this.data('type'));
            $("#formRentExtend input[name='status']").val($this.data('status'));
            $("#formRentExtend input[name='owner']").val($this.data('owner'));
            $("#formRentExtend input[name='duration']").val($this.data('duration'));
            $("#formShortStayExtend").hide("fast");
            $("#formRentExtend").show("fast");
        }
    }
    $("#extendModal").modal('show');

    return false;
});


// normal rent
$("#formRentExtend select[name='extended_date']").on("change", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    let advancePaymentDuration = $("#formRentExtend input[name='duration']").val();
    let selectedAdvancePaymentDuration = $this.val();
    if (parseInt(advancePaymentDuration) > parseInt(selectedAdvancePaymentDuration)){
        let duration = "";
        if(advancePaymentDuration == 6){
            duration = "6 months";
        }else if(advancePaymentDuration == 12){
            duration = "1 year";
        }else if(advancePaymentDuration == 24){
            duration = "2 years";
        }
        swal("Warning", `Least extension duration is ${duration}.`, "warning");
        $this.val(advancePaymentDuration);
        selectedAdvancePaymentDuration = advancePaymentDuration;
    }
    return false;
});


$("#formRentExtend").on('submit', function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    var valid = true;
    if($('#formRentExtend select[name="extended_date"]').val()==''){
        valid =false;
        $('#formRentExtend select[name="extended_date"]').addClass('is-invalid');
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
                console.log("Something went wrong");
                $(".btnExtendSubmit").text('Submit').attr('disabled', false);
            }
        });
    }

    return false;
});

// hostel
$("#formHostelExtend select[name='extended_date']").on("change", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);

    let advanceDuration = $("#formHostelExtend input[name='duration']").val();
    let selectedAdvanceDuration = $this.val();
    if(parseInt(advanceDuration) > parseInt(selectedAdvanceDuration)){
        let duration = "";
        if(advanceDuration < 12){
            duration = (advanceDuration <= 1)? `${advanceDuration} month`:`${advanceDuration} months`;
        }else {
            duration = "1 year";
        }
        swal("Warning", `Least extension duration is ${duration}`, "warning");
        $this.val(advanceDuration);
        selectedAdvanceDuration = advanceDuration;
    }
    return false;
});


$("#formHostelExtend").on('submit', function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    var valid = true;
    if($('#formHostelExtend select[name="extended_date"]').val()==''){
        valid =false;
        $('#formHostelExtend select[name="extended_date"]').addClass('is-invalid');
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
                console.log("Something went wrong");
                $(".btnExtendSubmit").text('Submit').attr('disabled', false);
            }
        });
    }

    return false;
});


// select checkout date for short stay
$('#formShortStayExtend input[name="extended_date"]').on('apply.daterangepicker', function(ev, picker) {
    var checkIn = $("#formShortStayExtend input[name='checkin']").val();
    var checkOut = picker.startDate;
    if(checkOut){
        let checkInDate = new Date(checkIn).getTime();
        let checkOutDate = new Date(checkOut).getTime();
        let distance = checkOutDate - checkInDate;
        let days = Math.floor(distance / (1000 * 60 * 60 * 24));

        // checking max and min stays
        let minimumStay = $("#formShortStayExtend input[name='min_stay']").val();
        let maximumStay = $("#formShortStayExtend input[name='max_stay']").val();
        if (days < parseInt(minimumStay) || days > parseInt(maximumStay)){
            swal("Warning", `Extension date should be within ${minimumStay} to ${maximumStay} days.`, "warning");
            $('#formShortStayExtend input[name="extended_date"]').val(checkIn);
            return;
        }
    }
});


$("#formShortStayExtend").on('submit', function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    var checkIn = $("#formShortStayExtend input[name='checkin']").val();
    var checkOut = $("#formShortStayExtend input[name='extended_date']").val();
    let checkInDate = new Date(checkIn).getTime();
    let checkOutDate = new Date(checkOut).getTime();
    let distance = checkOutDate - checkInDate;
    let days = Math.floor(distance / (1000 * 60 * 60 * 24));

    // checking max and min stays
    let minimumStay = $("#formShortStayExtend input[name='min_stay']").val();
    let maximumStay = $("#formShortStayExtend input[name='max_stay']").val();
    if (days < parseInt(minimumStay) || days > parseInt(maximumStay)){
        swal("Warning", `Extension date should be within ${minimumStay} to ${maximumStay} days.`, "warning");
        $('input[name="extended_date"]').val(checkIn);
        return;
    }


    // send data
    var valid = true;
    if($('#formShortStayExtend input[name="extended_date"]').val()==''){
        valid =false;
        $('#formShortStayExtend input[name="extended_date"]').addClass('is-invalid');
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