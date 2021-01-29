@extends('layouts.site')

@section('style')

@endsection
@section('content')
<div class="pxp-content pull-content-down">
    <div class="container">
        <h2 class="font-weight-bold">Welcom to Oshelter help center</h2>  
        <div class="pt-4">
            <div class="">
                @include('website.help.search')
                <h5 class="font-weight-800 mt-3"><a class="text-decoration-none" href="{{ route('help') }}">Help center</a></h5>
                <div class="row mt-4">
                    <div class="col-sm-4">
                        @foreach ($helpCategories as $category)
                        <div class="mb-2">
                            <a class="text-gray text-decoration-none" href="{{ route('help.title', ['helpCategory'=>$category->id, 'title'=>$category->topic_slug]) }}">&nbsp;{{ $category->topic }}</a>
                        </div>
                        @foreach ($category->helpTopics as $topic)
                            <div class="mb-2 ml-2">
                                <a class="text-gray text-decoration-none {{ ($topic->topic_name_slug==$title)? 'border-link':'' }}" href="{{ route('help.topic', ['helpTopic'=>$topic->id, 'topic'=>$topic->topic_name_slug]) }}">&nbsp;{{ $topic->topic_name }}</a>
                            </div>
                            @endforeach
                        @endforeach
                    </div>
                    <div class="col-sm-8">
                        <h4 class="mb-5 font-weight-bold">{{ $helpTopic->topic_name }}</h4>
                        @foreach ($helpTopic->helpQuestions as $help)
                            <p>
                                <a href="{{ route('help.read', ['help'=>$help->id, 'question'=>$help->question_slug]) }}" class="text-gray">{{ $help->question }}</a>
                            </p>
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