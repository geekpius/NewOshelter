@if (count($utilities))
<div class="table-responsive">
    <table class="table mt-4">
        @php $i=0; @endphp
        @foreach ($utilities as $util)
        @php $i++; @endphp
        <tr class="record">
            <td class="{{ ($i==1)? '':'no-border' }}">
                <div class="checkbox checkbox-primary">
                    <input id="{{ $util->id }}" type="checkbox" {{ ($util->status)? 'checked':'' }} data-id="{{ $util->id }}" class="switchBill" />
                    <label for="{{ $util->id }}" class="font-weight-500">
                        {{ ucwords($util->name) }} Bill
                    </label>
                </div>
            </td>
            <td class="{{ ($i==1)? '':'no-border' }} text-right"><a href="/utilities" data-id="{{ $util->id }}" data-name="{{ $util->name }}" data-amount="{{ $util->amount }}" class="text-primary onUpdate font-weight-600">{{ $util->currency }} {{ number_format($util->amount,2) }}/<small>month</small></a></td>
            <td width="10" class="{{ ($i==1)? '':'no-border' }} text-right"><a href="/utilities/remove" data-href="{{ route('property.utilities.remove', $util->id) }}" data-id="{{ $util->id }}" class="text-danger onRemove font-weight-600"><i class="fa fa-times fa-lg"></i></a></td>
        </tr>
        @endforeach
    </table>
</div>
@else
    <div style="background-image: url('{{ asset('assets/images/svg/3266884.svg') }}'); background-repeat: no-repeat; height:400px"></div>
@endif



<!-- extend modal -->
<div id="updateUtilityModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="updateUtilityModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="updateUtilityModalLabel">Update Amount</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-material mb-0" id="formUpdateBill">
                    <input type="hidden" name="utility_id" id="utility_id" readonly />
                    <div class="form-group validate">
                        <input type="text" name="amount" id="amount1" placeholder="Enter Amount" class="form-control">
                        <span class="text-danger small mySpan" role="alert"></span>                                  
                    </div>
                    <div class="form-group">
                        <button class="btn btn-gradient-primary btn-sm text-light px-4 mt-3 float-right btnUpdateBill"><i class="mdi mdi-refresh fa-lg"></i> Update</button>
                    </div>
                </form>                     
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->  


<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
})

$(".switchBill").on("change", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    let check = ($this.is(":checked"))? "on":"off";
    let data ={
        "property_id": $this.data('id'),
        "switch": check,
    }
    $.ajax({
        url: "{{ route('property.utilities.switch') }}",
        type: "POST",
        data: data,
        success: function(resp){
            if(resp!='success'){
                swal("Error", resp, "error");
            }
        },
        error: function(resp){
            console.log('something went wrong with request');
        }

    });
    return false;
});

$(".onUpdate").on("click", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    $("#updateUtilityModalLabel").text("Update "+$this.data('name')+ " bill amount");
    $("#formUpdateBill #utility_id").val($this.data('id'));
    $("#formUpdateBill #amount1").val($this.data('amount'));
    $('#updateUtilityModal').modal('show');
    return false;
});

$("#formUpdateBill").on("submit", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    var valid = true;
    $('#formUpdateBill input').each(function() {
        let $this = $(this);
        
        if(!$this.val()) {
            valid = false;
            $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
        }
    });

    if(valid){
        $(".btnUpdateBill").html('<i class="fa fa-spin fa-spinner"></i> Updating Bill...').attr('disabled',true);
        let data = $this.serialize();
        $.ajax({
            url: "{{ route('property.utilities.update') }}",
            type: "POST",
            data: data,
            success: function(resp){
                if(resp=='success'){
                    window.location.reload();
                }else{
                    swal("Error", resp, "error");
                }
                $(".btnUpdateBill").html('<i class="mdi mdi-refresh fa-lg"></i> Update').attr('disabled',false);
            },
            error: function(resp){
                console.log('something went wrong with request');
            }

        });
    }
    return false;
});

$(".onRemove").on("click", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);

    swal({
        title: "Are you sure?",
        text: "You are about to remove bill. This action is irreversible.",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger btn-sm",
        cancelButtonClass: "btn-sm",
        confirmButtonText: "Yes, Remove",
        closeOnConfirm: true
        },
    function(){
        $.ajax({
            url: $this.data('href'),
            type: "GET",
            success: function(resp){
                if(resp=='success'){
                    $this.parents('.record').fadeOut('slow', function(){
                        $this.parents('.record').remove();
                    });
                }else{
                    swal("Error", resp, "error");
                }
            },
            error: function(resp){
                console.log('something went wrong with request');
            }

        });
    });
    return false;
});

$('#amount1').keypress(function(event) {
    if (((event.which != 46 || (event.which == 46 && $(this).val() == '')) ||
            $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
        event.preventDefault();
    }
}).on('paste', function(event) {
    event.preventDefault();
});
</script>