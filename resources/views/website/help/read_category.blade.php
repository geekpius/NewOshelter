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
                <h6 class="font-weight-800 mt-60">
                    <a class="text-decoration-none {{ $helpCategory->category != 'general'? 'hide-help-menu':'' }}" href="{{ route('help') }}">Help center</a>
                    @if ($helpCategory->category == 'owner')
                    <a class="text-decoration-none font-weight-bold text-gray font-14 ml-2 hide-help-menu" href="{{ route('help.owner', str_slug('owning-properties')) }}">&gt; Owning properties</a>
                    <a class="text-decoration-none font-weight-bold text-gray font-14 ml-2 show-help-menu" href="{{ route('help.owner', str_slug('owning-properties')) }}">&lt; Owning properties</a>
                    @elseif ($helpCategory->category == 'visitor')
                    <a class="text-decoration-none font-weight-bold text-gray font-14 ml-2 hide-help-menu" href="{{ route('help.owner', str_slug('booking-and-visitors')) }}">&gt; Booking and visitors</a>
                    <a class="text-decoration-none font-weight-bold text-gray font-14 ml-2 show-help-menu" href="{{ route('help.owner', str_slug('booking-and-visitors')) }}">&lt; Booking and visitors</a>
                    @endif
                    <span class="font-14 hide-help-menu">&gt; {{ $helpCategory->topic }}</span>
                </h6>
                <div class="row mt-4">
                    <div class="col-12 col-sm-4">
                        <div class="category-menu">
                            @if ($helpCategory->category != 'general')
                                @foreach ($helpCategories as $category)
                                    @if ($category->category == $helpCategory->category)
                                    <div class="mb-2">
                                        <a class="text-gray text-decoration-none font-weight-bold {{ ($category->topic_slug==$title)? 'border-link':'' }}" href="{{ route('help.title', ['helpCategory'=>$category->id, 'title'=>$category->topic_slug]) }}">&nbsp;{{ $category->topic }}</a>
                                    </div>
                                    @foreach ($category->helpTopics as $topic)
                                        <div class="mb-2 ml-2">
                                            <a class="text-gray text-decoration-none" href="{{ route('help.topic', ['helpTopic'=>$topic->id, 'topic'=>$topic->topic_name_slug]) }}">&nbsp;{{ $topic->topic_name }}</a>
                                        </div>
                                    @endforeach
                                    @endif
                                @endforeach
                            @endif

                            @foreach ($generals as $category)
                                <div class="mb-2">
                                    <a class="text-gray text-decoration-none font-weight-bold {{ ($category->topic_slug==$title)? 'border-link':'' }}" href="{{ route('help.title', ['helpCategory'=>$category->id, 'title'=>$category->topic_slug]) }}">&nbsp;{{ $category->topic }}</a>
                                </div>
                                @foreach ($category->helpTopics as $topic)
                                    <div class="mb-2 ml-2">
                                        <a class="text-gray text-decoration-none" href="{{ route('help.topic', ['helpTopic'=>$topic->id, 'topic'=>$topic->topic_name_slug]) }}">&nbsp;{{ $topic->topic_name }}</a>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                    <div class="col-12 col-sm-8">
                       <div class="category-response">
                            <h4 class="mb-5 font-weight-bold">{{ $helpCategory->topic }}</h4>
                            @foreach ($helpCategory->helpTopics as $topic)
                                <p class="font-weight-bold">{{ $topic->topic_name }}</p>
                                @foreach ($topic->helpQuestions as $help)
                                <p class="ml-2">
                                    <a href="{{ route('help.read', ['help'=>$help->id, 'question'=>$help->question_slug]) }}" class="text-gray">{{ $help->question }}</a>
                                </p>
                                @endforeach
                            @endforeach
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