@extends('layouts.site')

@section('content')

<div class="pxp-content">
    <div class="pxp-contact pxp-content-wrapper">
        <div class="pxp-contact-hero mt-4 mt-md-5">
            <div class="pxp-contact-hero-fig pxp-cover" style="background-image: url({{ asset('assets/light/images/contact-bg.jpg') }}); background-position: 50% 50%;"></div>

            <div class="pxp-contact-hero-offices-container">
                <div class="container">
                    <div class="pxp-contact-hero-offices custom-scroller" style="height: 700px; overflow-y:scroll; overflow-x:hidden;">
                        <div class="row">
                            <div class="col-sm-12 mb-4">
                                <h2 class="pxp-section-h2 text-center mb-4">Need Help?</h2>
                                <div class="text-center">
                                    <img src="{{ asset('assets/images/svg/guest.svg') }}" alt="owner" width="80" height="80">
                                    <div><h4><strong class="text-primary">Booking and Travellers FAQs</strong></h4></div>
                                    <small>Toggle on the questions to display on/off answers</small>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                @foreach ($types as $type)
                                <ul class="ul-style myUL mb-2">
                                    <li><span class="caret"><strong>{{ $type->document_title }}</strong></span>
                                        <ul class="nested ul-style">
                                            @foreach ($type->helps as $help)
                                            <li><a href="#{{ $help->id }}" class="non-underline text-dark move-to-faq" data-target="#{{ $help->id }}">{{ $help->document_name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                                @endforeach
                                
                            </div>
                            <div class="col-sm-9 mt-4 mt-sm-0" title="Toggle on the questions to display on/off answers">
                                @foreach ($types as $type)
                                    @php $i = 0; @endphp
                                    @foreach ($type->helps as $help)
                                    @php $i++; @endphp
                                    <div class="parentDiv" id="{{ $help->id }}" style="display: {{ ($i==1)? '':'none' }}">
                                        <p class="text-primary">{{ $help->document_name }}</p>
                                        <div class="faq">
                                            <h6 class="text-danger show-answer">
                                                <strong>
                                                <i class="fa fa-square font-12"></i>
                                                {{ $help->question }}
                                                </strong>
                                            </h6>
                                            <div class="answer" style="display: none">
                                                {!! $help->answer !!}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container mt-200"></div>

@endsection

@section('scripts')
<script src="{{ asset('assets/light/js/jquery.sticky.js') }}"></script>
<script>
    var toggler = document.getElementsByClassName("caret");
    var i;

    toggler[0].parentElement.querySelector(".nested").classList.toggle("active");
    toggler[0].classList.toggle("caret-down");

    for (i = 0; i < toggler.length; i++) {
        toggler[i].addEventListener("click", function() {
            if(this.parentElement.querySelector(".nested").classList.contains("active")){
                return false;
            }
            else{
                var allElem = document.getElementsByClassName("nested");
                [].forEach.call(allElem, function(el){
                    el.classList.remove("active");
                });
                $(".caret").removeClass("caret-down");
                this.parentElement.querySelector(".nested").classList.toggle("active");
                this.classList.toggle("caret-down");
            }
            
        });
    }

    $(".show-answer").on("click", function(){
        $(this).parent('.faq').find('.answer').fadeToggle('fast');
        var nextAll = $(this).parent('.faq').nextAll();
        var prevAll = $(this).parent('.faq').prevAll();
        //alert("next all "+nextAll.length+"   -  prev all "+prevAll.length)
        if(nextAll.length>0){
            nextAll.slideToggle('fast');
        }
        if(prevAll.length>0){
            prevAll.slideToggle('fast');
        }
        return false;
    });

    $(".move-to-faq").on("click", function(e){
        e.preventDefault();
        e.stopPropagation();
        var target = $(this).data('target');
        $(".parentDiv").hide();
        $(target).show();
        return false;
    });

</script>
@endsection