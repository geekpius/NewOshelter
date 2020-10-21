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
                                    <img src="{{ asset('assets/images/svg/property-owner.svg') }}" alt="owner" width="80" height="80">
                                    <div><h4><strong class="text-primary">Property Owners FAQs</strong></h4></div>
                                    <small>Toggle on the questions to display on/off answers</small>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <ul class="ul-style myUL">
                                    <li><span class="caret"><strong>Listing Properties</strong></span>
                                        <ul class="nested ul-style">
                                            <li><a href="#water" class="non-underline text-dark move-to-faq" data-target="#water">Water</a></li>
                                            <li><a href="#coffee" class="non-underline text-dark move-to-faq" data-target="#coffee">Coffee</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul class="ul-style mt-2 myUL">
                                    <li><span class="caret"><strong>Booking Properties</strong></span>
                                        <ul class="nested ul-style">
                                            <li>Water</li>
                                            <li>Coffee</li> 
                                        </ul>
                                    </li>
                                </ul>
                                <ul class="ul-style mt-2 myUL">
                                    <li><span class="caret"><strong>Payments</strong></span>
                                        <ul class="nested ul-style">
                                            <li>Water</li>
                                            <li>Coffee</li> 
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-9 mt-4 mt-sm-0" title="Toggle on the questions to display on/off answers">
                                <div class="parentDiv" id="water">
                                    <p>First</p>
                                    <div class="faq">
                                        <h6 class="text-danger show-answer">
                                            <strong>
                                            <i class="fa fa-square font-12"></i>
                                            What should I do if someone ask me to accept payment outside OShelter's website?
                                            </strong>
                                        </h6>
                                        <p class="answer" style="display: none">
                                            Answer
                                        </p>
                                    </div>
                                    <div class="faq mt-4" title="Toggle on the questions to display on/off answers">
                                        <h6 class="text-danger show-answer">
                                            <strong>
                                            <i class="fa fa-square font-12"></i>
                                            What should I do if someone ask me to accept payment outside OShelter's website?
                                            </strong>
                                        </h6>
                                        <p class="answer" style="display: none">
                                            Answer
                                        </p>
                                    </div>
                                    <div class="faq mt-4" title="Toggle on the questions to display on/off answers">
                                        <h6 class="text-danger show-answer">
                                            <strong>
                                            <i class="fa fa-square font-12"></i>
                                            What should I do if someone ask me to accept payment outside OShelter's website?
                                            </strong>
                                        </h6>
                                        <p class="answer" style="display: none">
                                            Answer
                                        </p>
                                    </div>
                                </div>

                                <div class="parentDiv" id="coffee" style="display: none">
                                    <p>Second</p>
                                    <div class="faq">
                                        <h6 class="text-danger show-answer">
                                            <strong>
                                            <i class="fa fa-square font-12"></i>
                                            What should I do if someone ask me to accept payment outside OShelter's website?
                                            </strong>
                                        </h6>
                                        <p class="answer" style="display: none">
                                            Answer
                                        </p>
                                    </div>
                                    <div class="faq mt-4" title="Toggle on the questions to display on/off answers">
                                        <h6 class="text-danger show-answer">
                                            <strong>
                                            <i class="fa fa-square font-12"></i>
                                            What should I do if someone ask me to accept payment outside OShelter's website?
                                            </strong>
                                        </h6>
                                        <p class="answer" style="display: none">
                                            Answer
                                        </p>
                                    </div>
                                    <div class="faq mt-4" title="Toggle on the questions to display on/off answers">
                                        <h6 class="text-danger show-answer">
                                            <strong>
                                            <i class="fa fa-square font-12"></i>
                                            What should I do if someone ask me to accept payment outside OShelter's website?
                                            </strong>
                                        </h6>
                                        <p class="answer" style="display: none">
                                            Answer
                                        </p>
                                    </div>
                                </div>
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