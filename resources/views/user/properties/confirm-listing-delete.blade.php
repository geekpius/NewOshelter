@extends('layouts.site')

@section('style')

@endsection
@section('content')
<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>Confirm Remove</h2>  
        <p>
            <strong>{{ Auth::user()->name }},</strong> listings
        </p>
        <div class="pt-4">
            <div class="row">
                <div class="col-sm-6">
                    @include('includes.alerts')
                    <form class="mt-4" id="formConfirm" method="POST" action="{{ route('property.delete', $property->id) }}">
                        @csrf
                        <div class="form-group validate">
                            <label for="">Let us know that it is you.</label>
                            <input type="password" name="password" class="form-control" placeholder="Confirm your password">
                            <span class="text-danger small mySpan" role="alert">{{ $errors->has('password') ? $errors->first('password') : '' }}</span>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btnConfirm btn-danger btn-block">
                                <i class="fa fa-arrow-right"></i>
                                Confirm Delete
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/pages/property/property.js') }}"></script>
@endsection