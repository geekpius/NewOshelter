@extends('layouts.site')

@section('style') 
<!-- DataTables -->
<link href="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>My Wallet</h2>  
        <p>
            <strong>{{ Auth::user()->name }},</strong> account owner 
        </p>
        <div class="pt-4">
            <div class="row">
                <div class="col-sm-12 mb-3">
                    <a class="text-decoration-none" href="{{ route('account.requests') }}">&lt;Back</a>
                </div>
                <div class="col-sm-4 offset-sm-4">
                    <div class="card card-bordered-blue">
                        <div class="card-body">
                            <div class="text-center">
                                <h1>{{ Auth::user()->userCurrency->currency }} {{ number_format(Auth::user()->userWallets->where('is_cash_out', false)->sum('balance'),2) }}</h1>
                            </div>
                            <div class="text-center">
                                <p class="text-muted">Available funds</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    
                    <div class="table-responsive mt-5">
                        <table id="datatable" class="table table-striped small">
                            <thead class="thead-light">
                                <tr>                                        
                                    <th>Paid At</th>
                                    <th>Amount</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach (Auth::user()->userWallets as $wallet)
                                <tr class="record">
                                    <td>{{ \Carbon\Carbon::parse($wallet->created_at)->diffForHumans() }}</td>
                                    <td>{{ $wallet->getBalanceAmount() }}</td>
                                    <td>{{ $wallet->getType() }}</td>
                                    <td class="{{ ($wallet->is_cash_out)? 'text-success':'text-primary' }}">{{ $wallet->getStatus() }}</td>  
                                    <td>
                                        @if(!$wallet->is_cash_out)
                                            <a href="#" class="text-decoration-none text-primary btn-withdraw" data-id="{{ $wallet->id }}" data-balance="{{ $wallet->balance }}" data-currency="{{ $wallet->currency }}"><i class="fa fa-money-bill"></i></a>
                                        @endif
                                    </td>  
                                @endforeach                                                                                
                            </tbody>
                        </table>                    
                    </div> 
                </div>
            </div>
        </div>
    </div>    
</div>


<!-- id modal -->
<div id="cashOutModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="cashOutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title font-13 text-primary"></h6>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form id="formCashOut">
                    <div class="form-group input-group-sm">
                        <label>Mode of payment</label>
                        <select name="payment_mode" class="form-control">
                            <option value="">--Select--</option>
                            <option value="mobile_money">Mobile Money</option>
                            <option value="bank">Bank</option>
                        </select>
                    </div> 
                    <div id="mobileOptions" style="display: none">
                        <div class="form-group input-group-sm">
                            <label>Phone number</label>
                            <input type="tel" name="phone_number" placeholder="Enter your mobile money number" maxlength="10" class="form-control">
                        </div> 
                        <div class="form-group input-group-sm">
                            <label>Network</label>
                            <select name="network_type" class="form-control">
                                <option value="">--Select--</option>
                                <option value="mtn">MTN</option>
                                <option value="airteltigo">AirtelTigo</option>
                                <option value="vodafone">Vodafone</option>
                            </select>
                        </div> 
                        <div class="form-group input-group-sm">
                            <button class="btn btn-primary btn-sm">Send request</button>
                        </div> 
                    </div>  
                    <div id="bankOptions" style="display: none">
                        <div class="form-group input-group-sm">
                            <label>Bank name</label>
                            <input type="text" name="bank_name" placeholder="Enter your bank name" class="form-control">
                        </div> 
                        <div class="form-group input-group-sm">
                            <label>Account number</label>
                            <input type="tel" name="account_number" placeholder="Enter your account number" class="form-control">
                        </div> 
                        <div class="form-group input-group-sm">
                            <label>Account name</label>
                            <input type="text" name="account_name" placeholder="Enter your account name" class="form-control">
                        </div> 
                        <div class="form-group input-group-sm">
                            <button class="btn btn-primary btn-sm">Send request</button>
                        </div> 
                    </div>   
                </form>   
                
                <div>
                    <p class="font-13"><span class="text-danger">Note:</span> Payment will be received with 48 hours depending on your payment mode. Oshelter will review and verify this request before payment is sent to you.</p>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->  
@endsection

@section('scripts')
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script>
$('#datatable').DataTable();
$("#datatable tbody").on('click', '.btn-withdraw', function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    let amount = $this.parents('.record').find('td').eq(1).text();
    $("#cashOutModal .modal-title").text(`You are about to cash out ${amount}`);
    $("#cashOutModal").modal('show');
    // swal({
    //     title: "Sure to cash out?",
    //     text: `You about to cash out ${amount}. Cash out happens within 48 hours depending on your mode of payment`,
    //     type: "warning",
    //     showCancelButton: true,
    //     confirmButtonClass: "btn-primary btn-sm",
    //     cancelButtonClass: "btn-sm",
    //     confirmButtonText: "Send request",
    //     closeOnConfirm: true
    //     },
    // function(){
    //     // $.ajax({
    //     //     url: $this.attr('href'),
    //     //     type: "GET",
    //     //     dataType: "json",
    //     //     success: function(response){
    //     //         if(response.message=='success'){
    //     //             $this.parents('.record').fadeOut('slow', function(){
    //     //                 $this.parents('.record').remove();
    //     //             });
    //     //         }else{
    //     //             console.log(response.message);
    //     //         }
    //     //     },
    //     //     error: function(response){
    //     //         console.log('something wrong with request')
    //     //     }
    //     // });
    // });
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

$("#formCashOut input[name='phone_number'], #formCashOut input[name='account_number']").keypress(function(event) {
    if (((event.which != 46 || (event.which == 46 && $(this).val() == '')) ||
            $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
        event.preventDefault();
    }
}).on('paste', function(event) {
    event.preventDefault();
});


</script>
@endsection