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
                                <h1>{{ Auth::user()->userCurrency->currency }} {{ number_format(Auth::user()->userWallets->sum('balance'),2) }}</h1>
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
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($wallet->created_at)->diffForHumans() }}</td>
                                    <td>{{ $wallet->getBalanceAmount() }}</td>
                                    <td>{{ $wallet->getType() }}</td>
                                    <td class="{{ ($wallet->is_cash_out)? 'text-success':'text-primary' }}">{{ $wallet->getStatus() }}</td>  
                                    <td>
                                        @if(!$wallet->is_cash_out)
                                            <a href="#" class="text-decoration-none text-primary btn-withdraw"><i class="fa fa-money-bill"></i></a>
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
@endsection

@section('scripts')
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script>
$('#datatable').DataTable();
</script>
@endsection