@extends('layouts.site')

@section('style') 
<link rel="stylesheet" href="{{ asset('assets/plugins/rating/themes/rating.css') }}" />
@endsection
@section('content')
<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>Property Rating</h2>  
        <p>
            <strong>{{ Auth::user()->name }},</strong> visits 
        </p>
        <div class="pt-4">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-body pt-12">

                        <h4 class="header-title mt-lg-12 mb-3">Property Rating</h4> 
                        
                        <br>
                        <div class="col-sm-8">
                            <div class="card">
                                <div class="card-body">
                                    <p class="font-14">
                                        @php $image = (empty($visit->property->user->image))? 'user.svg':'users/'.$visit->property->user->image; @endphp
                                        <img src="{{ asset('assets/images/'.$image) }}" alt="{{ $visit->property->user->name }}" class="thumb-sm rounded-circle mr-1" />
                                        This property belongs to {{ current(explode(' ',$visit->property->user->name))}}.
                                    </p>
                                    <span class="font-weight-500 ml-1">
                                       It's time to rate property for Oshelter's better decision.
                                    </span>
                                </div>    
                            </div>
                            <h5 class="text-primary">{{ $visit->property->title }}</h5>
                            <form id="formRate" action="{{ route('visits.property.rating.submit', $visit->id) }}">
                                @csrf
                                <div class="card">
                                    <div class="card-body row">  
                                        <div class="col-lg-4 mt-2">
                                            <i class="fa fa-thumbs-up text-primary"></i> <b>Accuracy</b>
                                        </div>
                                        <div class="col-lg-8">
                                            <select class="example-css" name="accuracy" autocomplete="off" style="display: none">
                                                <option value="">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
    
                                        <div class="col-lg-12"><br></div>
    
                                        <div class="col-lg-4 mt-2">
                                            <i class="fa fa-map-marker text-primary"></i> <b>Location</b>
                                        </div>
                                        <div class="col-lg-8">
                                            <select class="example-css" name="location" autocomplete="off" style="display: none;">
                                                <option value="">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-12"><br></div>
    
                                        <div class="col-lg-4 mt-2">
                                            <i class="mdi mdi-security text-primary"></i> <b>Security</b>
                                        </div>
                                        <div class="col-lg-8">
                                            <select class="example-css" name="security" autocomplete="off" style="display: none">
                                                <option value="">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
    
                                        <div class="col-lg-12"><br></div>
    
                                        <div class="col-lg-4 mt-2">
                                            <i class="mdi mdi-currency-usd text-primary"></i> <b>Value</b>
                                        </div>
                                        <div class="col-lg-8">
                                            <select class="example-css" name="value" autocomplete="off" style="display: none">
                                                <option value="">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
    
                                        <div class="col-lg-12"><br></div>
    
                                        <div class="col-lg-4 mt-2">
                                            <i class="mdi mdi-comment text-primary"></i> <b>Communication</b>
                                        </div>
                                        <div class="col-lg-8">
                                            <select class="example-css" name="communication" autocomplete="off" style="display: none">
                                                <option value="">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
    
                                        <div class="col-lg-12"><br></div>
    
                                        <div class="col-lg-4 mt-2">
                                            <i class="fas fa-dumpster text-primary"></i> <b>Cleanliness</b>
                                        </div>
                                        <div class="col-lg-8">
                                            <select class="example-css" name="cleanliness" autocomplete="off" style="display: none">
                                                <option value="">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
    
                                    <div class="card-body row">
                                        <div class="col-sm-8">
                                            <div class="form-group validate">                                                                                                           
                                                <textarea class="form-control" name="comment" rows="5" placeholder="Write your comments"></textarea>                               
                                                <span class="text-danger small mySpan" role="alert"></span>
                                            </div><!--end form-group--> 
                                            <div class="form-group">
                                                <button class="btn btn-primary btn-round btn-block btnSubmit" type="submit">
                                                    <i class="fas fa-dot-circle mr-1"></i> Submit
                                                </button>
                                            </div> <!--end form-group--> 
                                        </div>    
                                    </div>
                                </div>
                           </form>
                        </div>
                    </div><!--end card-body--> 
                </div>
            </div>
        </div>
    </div>    
</div> 
@endsection

@section('scripts')
<script src="{{asset('assets/plugins/rating/jquery.barrating.min.js')}}"></script>
<script src="{{ asset('assets/pages/jquery.rating.init.js') }}"></script>

<script>
$("#formRate").on("submit", function(e){
    e.preventDefault();
    $this = $(this);
    let comment = $("#formRate textarea[name='comment']").val();
    if(!comment){
        $("#formRate textarea[name='comment']").parents('.validate').find('.mySpan').text('Please give your comment');
    }else{
        $(".btnSubmit").html('<i class="fa fa-spinner fa-spin"></i> Submitting...').attr('disabled', true);
        let data = $this.serialize();
        $.ajax({
            url: $this.attr('action'),
            type: "POST",
            data: data,
            success: function(resp){
                if(resp=='success'){
                    window.location.href="{{ route('visits') }}";
                }else{
                    swal("Warning", resp, "warning");
                    $(".btnSubmit").html('<i class="fas fa-dot-circle mr-1"></i> Submit').attr('disabled', false);
                }
            },
            error: function(resp){
                alert("Something went wrong with request");
            }
        });
    }
    return false;
});
</script>
@endsection