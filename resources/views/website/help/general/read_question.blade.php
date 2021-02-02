@extends('layouts.site')

@section('style')

@endsection
@section('content')
<div class="pxp-content pull-content-down">
    <div class="container">
        <h2 class="font-weight-bold">Welcom to Oshelter help center</h2>  
        <div class="pt-2">
            <div class="">
                @include('website.help.search')
                <h5 class="font-weight-800 mt-60">
                    <a class="text-decoration-none" href="{{ route('help') }}">Help center</a>
                    <a class="text-decoration-none font-weight-bold text-gray font-14 ml-2" href="{{ route('help.title', ['helpCategory'=>$help->helpTopic->helpCategory->id, 'title'=>$help->helpTopic->helpCategory->topic_slug]) }}">&lt; {{ $help->helpTopic->helpCategory->topic }}</a>
                    <a class="text-decoration-none font-weight-bold text-gray font-14 ml-2" href="{{ route('help.topic', ['helpTopic'=>$help->helpTopic->id, 'topic'=>$help->helpTopic->topic_name_slug]) }}">&lt; {{ $help->helpTopic->topic_name }}</a>
                </h5>
                <div class="row mt-4">
                    <div class="col-12 col-sm-4">
                        <div class="question-menu">
                            @foreach ($helpCategories as $category)
                            <div class="mb-2">
                                <a class="text-gray text-decoration-none font-weight-bold" href="{{ route('help.title', ['helpCategory'=>$category->id, 'title'=>$category->topic_slug]) }}">&nbsp;{{ $category->topic }}</a>
                            </div>
                                @foreach ($category->helpTopics as $topic)
                                <div class="mb-2 ml-2">
                                    <a class="text-gray text-decoration-none {{ ($topic->topic_name_slug==$help->helpTopic->topic_name_slug)? 'border-link':'' }}" href="{{ route('help.topic', ['helpTopic'=>$topic->id, 'topic'=>$topic->topic_name_slug]) }}">&nbsp;{{ $topic->topic_name }}</a>
                                </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                    <div class="col-12 col-sm-8">
                       <div class="question-response">
                            <h4>{{ $help->question }}</h4>
                            <p class="mt-4">
                                {!! $help->answer !!}
                            </p>
                       </div>
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