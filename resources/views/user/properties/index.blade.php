@extends('layouts.site')

@section('styles')
@endsection
@section('content')
<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>Your Properties</h2>
        <p>
            <strong>{{ Auth::user()->name }},</strong> listings  > <small><a href="{{ route('property.add') }}">List new</a></small>
        </p>
        <div class="pt-4">
            <div class="row">
                <div class="col-sm-12">
                    @include('includes.alerts')
                </div>
                <div class="col-sm-3 offset-sm-4">
                    <select name="filter" id="filter" class="form-control">
                        <option value="">Filter property type</option>
                        @foreach ($property_types as $type)
                            <option value="{{ strtolower(str_replace(' ','_',$type->name)) }}">{{ str_plural($type->name) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-5">
                    <input type="search" name="search" id="search" class="form-control" placeholder="Search property title...">
                </div>
                <div class="col-sm-12 mt-4" id="propertyContent" data-url="{{ route('property.load') }}">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/pages/property/property.js') }}"></script>
@endsection
