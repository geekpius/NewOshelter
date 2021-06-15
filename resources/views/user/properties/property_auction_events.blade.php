@extends('layouts.site')

@section('style') 
<!-- DataTables -->
<link href="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>Property Auction Events</h2>  
        <p>
            <strong>{{ Auth::user()->name }},</strong> auction events 
        </p>
        <div class="pt-4">
            <div class="row">
                <div class="col-sm-12 mb-3">
                    <a class="text-decoration-none" href="{{ route('property') }}">&lt;Back</a>
                </div>
                <div class="col-sm-12">
                    <div class="card card-bordered-blue">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped small">
                                    <thead class="thead-light">
                                        <tr>                                        
                                            <th>Ordered At</th>
                                            <th>Property</th>
                                            <th>Buyer</th>
                                            <th>Status</th>
                                        </tr><!--end tr-->
                                    </thead>

                                    <tbody>
                                        @foreach ($property->auctions as $auction)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($auction->created_at)->diffForHumans() }}</td>
                                            <td>{{ $auction->property->title }}</td>
                                            @php $image = (empty($auction->user->image))? 'user.svg':'users/'.$auction->user->image; @endphp
                                            <td><img src="{{ asset('assets/images/'.$image) }}" alt="{{ $auction->user->name }}" class="thumb-sm rounded-circle mr-2">{{ $auction->user->name }}</td>
                                            <td>
                                                @if ($auction->isPendingAttribute())
                                                    <span class="text-primary"><i class="fa fa-spin fa-spinner"></i> Processing</span>
                                                @elseif ($auction->isDoneAttribute())
                                                    <span class="text-success"><i class="fa fa-check-circle"></i> Bought</span>
                                                @elseif ($auction->isCancelAttribute())
                                                    <span class="text-danger"><i class="fa fa-times-circle"></i> Cancelled</span>
                                                @endif
                                            </td>
                                        </tr><!--end tr-->
                                        @endforeach                                                                                   
                                    </tbody>
                                </table>                       
                            </div> 
                        </div>
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