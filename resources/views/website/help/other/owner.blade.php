@extends('layouts.site')

@section('style')

@endsection
@section('content')
<div class="pxp-content pull-content-down">
    <div class="container">
        <h2 class="font-weight-bold">Owning properties</h2>  
        <p>Find info on listing, managing, communicating with visitors, and more.</p>
        <div class="pt-2">
            <div class="">
                @include('website.help.search')
                <h6 class="font-weight-800 mt-60">
                    <a class="text-decoration-none hide-help-menu" href="{{ route('help') }}">Help center</a>
                    <span class="font-14 ml-2 hide-help-menu">&gt; Owning properties</span>
                </h6>
                <div class="mt-5">
                    <h5 class="font-weight-800">Popular helps</h5>
                    <div class="row mt-4">
                        @foreach ($general as $help)
                        <div class="col-12 col-md-3">
                            <a href="{{ route('help.read', ['help'=>$help->id, 'question'=>$help->question_slug]) }}">
                                <p class="font-weight-bold font-16">{{ $help->question }}</p>
                            </a>
                            <p>{!! $help->getAnswerLimit()  !!}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/pages/website/search_help.js') }}"></script>
@endsection