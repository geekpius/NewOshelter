@extends('layouts.site')

@section('style')

@endsection
@section('content')
<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>Found Something</h2>  
        <p>
            <strong>{{ Auth::user()->name }},</strong> listings
        </p>
        <div class="pt-4">
            <div class="row">
                <div class="col-sm-12">
                    <div>
                        <i class="fa fa-home fa-5x"></i>
                        <h5>Would you like to list new property?</h5>
                        <a href="{{ route('property.start') }}" class="text-primary">Start New Listing</a> 
                    </div> 

                    @foreach ($property as $item)
                    <div class="mt-5">
                        <i class="fa fa-home fa-5x"></i>
                        <h5><i class="fa fa-dot-circle font-16"></i> {{ $item->title }}</h5>
                        <a href="{{ route('property.create', $item->id) }}" class="text-primary">Complete Listing</a> &nbsp; &nbsp; || &nbsp; &nbsp;
                        <a href="{{ route('property.edit',$item->id) }}" class="text-warning">Edit Property Type</a> &nbsp; &nbsp; || &nbsp; &nbsp;
                        <a href="{{ route('property.confirmdelete', $item->id) }}" class="text-danger">Remove Listing</a> 
                    </div>     
                    @endforeach

                </div>
            </div>
        </div>
    </div>    
</div>
@endsection

@section('scripts')
@endsection