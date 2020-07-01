@extends('admin.layouts.app')

@section('styles') 
<!-- DataTables -->
<link href="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">My Wallet</li>
                    </ol>
                </div>
                <h4 class="page-title">My Wallet</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
   
    <div class="card">
        
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">

                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="wallet-bal-usd mb-2">
                                <h4 class="wallet-title m-0">OShelter-Pay Balance</h4>
                                <span class="text-muted font-12">as at {{\Carbon\Carbon::parse(Auth::user()->userWallet->updated_at)->format('d F, Y')}}</span>
                                <h3 class="text-center"> {{Auth::user()->userWallet->currency}} {{number_format(Auth::user()->userWallet->balance,2)}}</h3>
                            </div> 
                            
                            <div class="text-center mt-4">
                                <button class="btn btn-gradient-primary btn-sm px-3 btnWithdraw" data-toggle="modal" data-target="#withdrawModal">Withdraw From Wallet</button>
                            </div>
                        </div>                                        
                    </div>                                               
                </div><!--end card-body-->

                <div class="card-body pt-4">

                    <h4 class="header-title mt-lg-3 mb-3">Transaction History</h4> 

                    <!-- Nav tabs -->
                    <ul class="nav nav-pills nav-justified" role="tablist">
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link active" data-toggle="tab" href="#all" role="tab">All</a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" data-toggle="tab" href="#in" role="tab">In</a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" data-toggle="tab" href="#out" role="tab">Out</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active p-3" id="all" role="tabpanel">
                            <div class="table-responsive dash-social">
                                <table id="datatable" class="table table-bordered">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Date</th>                                               
                                        <th>Transaction ID</th>
                                        <th>Type</th>
                                        <th>Value</th>
                                    </tr><!--end tr-->
                                    </thead>

                                    <tbody>
                                        @foreach (Auth::user()->userWallet->userWalletTransactions as $trans)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($trans->created_at)->diffForHumans() }}</td>
                                            <td>{{ $trans->transaction_id }}</td>
                                            <td><span class="badge badge-md badge-soft-success">{{ $trans->type }}</span></td>
                                            <td>{{Auth::user()->userWallet->currency}} {{ number_format($trans->amount,2) }}</td>
                                        </tr><!--end tr-->
                                        @endforeach                                                                                  
                                    </tbody>
                                </table>                    
                            </div>     
                        </div>
                        <div class="tab-pane p-3" id="in" role="tabpanel">
                            <div class="table-responsive dash-social">
                                <table id="datatable1" class="table table-bordered">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Date</th>                                               
                                        <th>Transaction ID</th>
                                        <th>Type</th>
                                        <th>Value</th>
                                    </tr><!--end tr-->
                                    </thead>
                                    <tbody>
                                        @foreach (Auth::user()->userWallet->userWalletTransactions->where('status',true) as $trans)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($trans->created_at)->diffForHumans() }}</td>
                                            <td>{{ $trans->transaction_id }}</td>
                                            <td><span class="badge badge-md badge-soft-success">{{ $trans->type }}</span></td>
                                            <td>{{Auth::user()->userWallet->currency}} {{ number_format($trans->amount,2) }}</td>
                                        </tr><!--end tr-->
                                        @endforeach                                                                                 
                                    </tbody>
                                </table>                    
                            </div>                             
                        </div>
                        <div class="tab-pane p-3" id="out" role="tabpanel">
                            <div class="table-responsive dash-social">
                                <table id="datatable2" class="table table-bordered">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Date</th>                                               
                                        <th>Transaction ID</th>
                                        <th>Type</th>
                                        <th>Value</th>
                                    </tr><!--end tr-->
                                    </thead>
                                    <tbody>
                                        @foreach (Auth::user()->userWallet->userWalletTransactions->where('status',false) as $trans)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($trans->created_at)->diffForHumans() }}</td>
                                            <td>{{ $trans->transaction_id }}</td>
                                            <td><span class="badge badge-md badge-soft-success">{{ $trans->type }}</span></td>
                                            <td>{{Auth::user()->userWallet->currency}} {{ number_format($trans->amount,2) }}</td>
                                        </tr><!--end tr-->
                                        @endforeach                                                                                     
                                    </tbody>
                                </table>                    
                            </div>                             
                        </div>
                    </div>    


                </div><!--end card-body--> 
                
            </div><!--end col--> 
            <div class="col-sm-3"></div>                    
        </div><!-- End row -->
    </div>

    <!-- withdraw modal -->
    <div id="withdrawModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="withdrawModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="withdrawModalLabel">Withdraw From Wallet</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form id="formWithdraw">
                        @csrf
                        <input type="hidden" name="old_amount" id="old_amount" value="{{ Auth::user()->userWallet->balance }}" readonly>
                        <div class="form-group validate">
                            <label for="amount">Amount</label>
                            <input type="text" class="form-control" name="amount" id="amount" placeholder="Enter enter amount">
                            <span class="text-danger mySpan"></span>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-gradient-success btnWithdrawSubmit">Submit</button>
                        </div>
                    </form>                    
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->  

</div><!-- container -->

@endsection

@section('scripts')
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/pages/wallet.js') }}"></script>
@endsection