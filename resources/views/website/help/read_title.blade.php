@extends('layouts.site')

@section('style')

@endsection
@section('content')
<div class="pxp-content pull-content-down">
    <div class="container">
        <h2 class="font-weight-bold">Welcom to Oshelter help center</h2>  
        <div class="pt-4">
            <div class="mt-4">
                <h5 class="font-weight-800"><a class="text-decoration-none" href="{{ route('help') }}">Help center</a></h5>
                <div class="row mt-4">
                    <div class="col-sm-4">
                        @foreach ($helpTypes as $type)
                        <a class="text-gray" style="border-left: solid red" href="{{ route('help.title', ['helpType'=>$type->id, 'title'=>$type->document_title]) }}">&nbsp;{{ $type->document_title }}</a>
                        @endforeach
                    </div>
                    <div class="col-sm-8">
                        <h4 class="mb-5">{{ $helpType->document_title }}</h4>
                        @foreach ($helpType->helps()->get() as $help)
                            <p><a href="{{ route('help.read', ['help'=>$help->id, 'question'=>$help->question_slug]) }}" class="text-gray">{{ $help->question }}</a></p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>
@endsection

@section('scripts')
@endsection