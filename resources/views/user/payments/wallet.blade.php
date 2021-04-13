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
                                <h2>{{ Auth::user()->userCurrency->currency }} {{ number_format(Auth::user()->userWallets->whereIn('is_cash_out',[1])->sum('balance'),2) }}</h2>
                            </div>
                            <div class="text-center">
                                <p class="text-muted">Available funds</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4"></div>

                <div class="col-sm-3 text-center">
                    <a class="btn btn-primary btn-sm nav-link" id="cashIn" href="#">Payments</a>
                </div>
                <div class="col-sm-3 text-center">
                    <a class="nav-link" id="cashOut" href="#">Withdrawals</a>
                </div>
                <div class="col-sm-3 text-center">
                    <a class="nav-link" id="cancelled" href="#">Cancelled Payments</a>
                </div>
                
                <div class="col-sm-3"></div>

                <div class="col-sm-12">                    
                    <div class="table-responsive mt-5" id="cashInTable">
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
                                @foreach (Auth::user()->userWallets->whereIn('is_cash_out', [0,1,2]) as $wallet)
                                <tr class="record">
                                    <td>{{ \Carbon\Carbon::parse($wallet->created_at)->diffForHumans() }}</td>
                                    <td>{{ $wallet->getBalanceAmount() }}</td>
                                    <td>{{ $wallet->getType() }}</td>
                                    <td class="{{ $wallet->getCssStyle() }}">{{ $wallet->getStatus() }}</td>  
                                    <td>
                                        @if($wallet->is_cash_out==0)
                                        <span><i class="fa fa-spin fa-spinner"></i> Waiting visitor's confirmation</span>
                                        @elseif($wallet->is_cash_out==1)
                                            <a href="#" class="text-decoration-none text-primary btn-withdraw" data-id="{{ $wallet->id }}" data-balance="{{ $wallet->balance }}" data-currency="{{ $wallet->currency }}"><i class="fa fa-money-bill"></i></a>
                                        @else
                                        <span><i class="fa fa-spin fa-spinner"></i> Waiting for withdraw approval</span>
                                        @endif
                                    </td>  
                                @endforeach                                                                                
                            </tbody>
                        </table>                    
                    </div> 
                    <div class="table-responsive mt-5" id="cashOutTable" style="display: none">
                        <table id="datatable1" class="table table-striped small">
                            <thead class="thead-light">
                                <tr>                                        
                                    <th>Paid At</th>
                                    <th>Amount</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>

                            <tbody>
                                @foreach (Auth::user()->userWallets->where('is_cash_out', 3) as $wallet)
                                <tr class="record">
                                    <td>{{ \Carbon\Carbon::parse($wallet->created_at)->diffForHumans() }}</td>
                                    <td>{{ $wallet->getBalanceAmount() }}</td>
                                    <td>{{ $wallet->getType() }}</td>
                                    <td class="text-success">{{ $wallet->getStatus() }}</td>  
                                    {{-- <td>
                                        <a href="#" class="text-decoration-none text-primary btn-view" data-id="{{ $wallet->id }}"><i class="fa fa-eye"></i></a>
                                    </td>   --}}
                                @endforeach                                                                                
                            </tbody>
                        </table>                    
                    </div> 

                    <div class="table-responsive mt-5" id="cancelTable" style="display: none">
                        <table id="datatable2" class="table table-striped small">
                            <thead class="thead-light">
                                <tr>                                        
                                    <th>Paid At</th>
                                    <th>Amount</th>
                                    <th>Type</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach (Auth::user()->userWallets->where('is_cash_out', 4) as $wallet)
                                <tr class="record">
                                    <td>{{ \Carbon\Carbon::parse($wallet->created_at)->diffForHumans() }}</td>
                                    <td>{{ $wallet->getBalanceAmount() }}</td>
                                    <td>{{ $wallet->getType() }}</td>
                                    <td>{{ $wallet->transaction->confirmation->cancelConfirmation->reason }}</td>
                                    <td class="text-danger">{{ $wallet->getStatus() }}</td>  
                                @endforeach                                                                                
                            </tbody>
                        </table>                    
                    </div> 

                    <div class="mt-2">
                        <p class="font-13">
                            <span class="text-danger">Note:</span> Cashout button <i class="fa fa-money-bill text-primary"></i> will be enabled when visitor confirms his/her stay.
                        </p>
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
                <form id="formCashOut" action="{{ route('wallet.withdraw') }}">
                    @csrf
                    <input type="hidden" readonly name="wallet_id">
                    <input type="hidden" readonly name="balance">
                    <input type="hidden" readonly name="currency">
                    <div class="form-group input-group-sm validate">
                        <label>Mode of payment</label>
                        <select name="payment_mode" class="form-control">
                            <option value="">--Select--</option>
                            <option value="mobile_money">Mobile Money</option>
                            <option value="bank">Bank</option>
                        </select>
                    </div> 
                    <div id="mobileOptions" style="display: none">
                        <div class="form-group input-group-sm validate">
                            <label>Phone number</label>
                            <input type="tel" name="phone_number" placeholder="Enter your mobile money number" maxlength="10" class="form-control">
                            <span class="small text-danger msg-number mySpan"></span>
                        </div> 
                        <div class="form-group input-group-sm validate">
                            <label>Network</label>
                            <select name="network_type" class="form-control">
                                <option value="">--Select--</option>
                                <option value="mtn">MTN</option>
                                <option value="airteltigo">AirtelTigo</option>
                                <option value="vodafone">Vodafone</option>
                            </select>
                            <span class="small text-danger msg-network mySpan"></span>
                        </div> 
                        <div class="form-group input-group-sm validate">
                            <label>Mobile Money Name</label>
                            <input type="text" name="momo_account_name" placeholder="Enter your mobile money account name" class="form-control">
                            <span class="small text-danger msg-momo-account mySpan"></span>
                        </div> 
                        <div class="form-group input-group-sm">
                            <button class="btn btn-primary btn-sm btnMomoRequest">Send request</button>
                        </div> 
                    </div>  
                    <div id="bankOptions" style="display: none">
                        <div class="form-group input-group-sm validate">
                            <label>Bank name</label>
                            <input type="text" name="bank_name" placeholder="Enter your bank name" class="form-control">
                            <span class="small text-danger mySpan"></span>
                        </div> 
                        <div class="form-group input-group-sm validate">
                            <label>Account number</label>
                            <input type="tel" name="account_number" placeholder="Enter your account number" class="form-control">
                            <span class="small text-danger mySpan"></span>
                        </div> 
                        <div class="form-group input-group-sm validate">
                            <label>Account name</label>
                            <input type="text" name="account_name" placeholder="Enter your account name" class="form-control">
                            <span class="small text-danger mySpan"></span>
                        </div> 
                        <div class="form-group input-group-sm">
                            <button class="btn btn-primary btn-sm btnBankRequest">Send request</button>
                        </div> 
                    </div>   
                </form>   
                
                <div>
                    <p class="font-13"><span class="text-danger">Note:</span> Payment will be received with 72 hours depending on your payment mode. Oshelter will review and verify this request before payment is sent to you.</p>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->  
@endsection

@section('scripts')
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/pages/wallet.js') }}"></script> 
<script>
    cashInBtn.addEventListener("click", clickOpenCashIn);
    cashOutBtn.addEventListener("click", clickOpenCashOut);
    cancelBtn.addEventListener("click", clickOpenlCancel);
</script>
@endsection