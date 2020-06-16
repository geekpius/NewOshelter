@extends('admin.layouts.app')

@section('styles')
@endsection
@section('content')

<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">Booking</li>
                    </ol>
                </div>
                <h4 class="page-title">Booking</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
   
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                   @if (!$property->user->verify_email)
                       
                  
                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-4">
                            <div class="mb-5">
                                <i class="fa fa-envelope fa-5x"></i>
                                <p>Please make sure your email verified and active. As it stands, your email address is not verified. Go to your email and verify.</p> 
                                <button class="btn btn-primary">Resend Verification Link</button>
                            </div> 
                        </div>

                        <div class="col-sm-12 mt-4">
                            <button class="btn btn-primary pl-5 pr-5"><i class="fa fa-arrow-right"></i> Next</button>
                        </div>
                    </div><!-- end row --> 
                    @endif
                    {{-- <div class="row mb-5">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-4">
                            <div class="text-center mt-2">
                                <h6 class="text-primary">ID CARD</h6>
                            </div>
                            <div class="flip-box">
                                <div class="flip-box-inner">
                                    @php
                                        $cardFront = (empty(Auth::user()->profile->id_front))? '1.png':'cards/'.Auth::user()->profile->id_front;
                                        $cardBack = (empty(Auth::user()->profile->id_back))? '1.png':'cards/'.Auth::user()->profile->id_back;
                                    @endphp
                                    <div class="text-center mt-2 flip-box-front">
                                        <img src="{{ asset('assets/images/'.$cardFront) }}" alt="ID Card Front" class="front_card" style="width:300px; height:200px; border-radius:2%" />
                                    </div>
                                    <div class="flip-box-back">
                                        <img src="{{ asset('assets/images/'.$cardBack) }}" alt="ID Card Front" class="back_card" style="width:300px; height:200px; border-radius:2%" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-7"></div>
                        <div class="col-sm-6">
                           <div class="mt-5 text-center ml-sm-5 ml-lg-4">
                                @if (empty(Auth::user()->profile->id_front) && empty(Auth::user()->profile->id_back))
                                <a href="javascript:void(0);" class="text-primary btnAddNewID">Add New Government ID Approve</a>
                                @else
                                <i class="fa fa-check text-success"></i> ID is checked
                                @endif
                           </div>
                        </div>

                        <div class="col-sm-12 mt-4">
                            <button class="btn btn-primary pl-5 pr-5"><i class="fa fa-arrow-right"></i> Next</button>
                        </div>
                    </div><!-- end row -->  --}}


                    <div class="row">
                        <div class="col-sm-6">
                            <div class="col-sm-12">
                                <h3>Review {{ $property->type }} rules</h3>
                                <div class="col-sm-12 mt-5">
                                    <div class="card card-bordered-pink">
                                        <div class="card-body">
                                            <p class="font-14">
                                                <img src="{{ asset('assets/images/users/'.$property->user->image) }}" alt="{{ $property->user->name }}" class="thumb-sm rounded-circle mr-1" />
                                                This property belongs to {{ current(explode(' ',$property->user->name))}}. Other people like it.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="mt-5">
                                        <h3>2 nights</h3>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-6">
                                                Check In
                                                <div class="card card-purple" style="width:40% !important">
                                                    <div class="card-body text-center text-white">
                                                        <strong class="font-16">16-Mar-2020</strong>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-lg-6">
                                                Check Out
                                                <div class="card card-purple" style="width:40% !important">
                                                    <div class="card-body text-center text-white">
                                                        <strong class="font-16">25-Mar-2020</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-5">
                                        <h3>Take note of the rules</h3>
                                        <div class="col-sm-12">
                                            @if (count($property->propertyOwnRules))
                                                @foreach ($property->propertyOwnRules as $own_rule)
                                                <h4><i class="fa fa-square text-danger"></i> &nbsp; {{ $own_rule->rule }}</h4>
                                                @endforeach
                                                
                                                @foreach ($property->propertyRules as $rule)
                                                <h4><i class="fa fa-square text-danger"></i> &nbsp; {{ $rule->rule }}</h4>
                                                @endforeach
                                            @else
                                                @foreach ($property->propertyRules as $rule)
                                                <h4><i class="fa fa-square text-danger"></i> &nbsp; {{ $rule->rule }}</h4>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>
                        <div class="col-sm-6">
                            <div class="col-sm-12">
                                <div class="col-sm-12 mt-5">
                                    <div class="card card-bordered-pink">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    @php $image = $property->propertyImages->first(); @endphp
                                                    <img src="{{ asset('assets/images/properties/'.$image->image) }}" alt="{{ $image->caption }}" class="img-thumbnail" width="200" height="200" />
                                                </div>
                                                <div class="col-sm-8">
                                                    <h4>{{ $property->title }}</h4>
                                                    <p>{{ ucfirst($property->type) }} in {{ strtolower($property->base) }}</p>
                                                    <p>
                                                        <i class="fa fa-star"></i> 
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        &nbsp;&nbsp;
                                                        {{ $property->propertyReviews->count() }} Reviews
                                                    </p>
                                                </div>
                                                <div class="col-sm-12"><hr></div>
                                                <div class="col-sm-12">
                                                    <h4><i class="fa fa-users"></i> &nbsp;&nbsp; 2 Guests</h4>
                                                </div>
                                                <div class="col-sm-12"><hr></div>
                                                <div class="col-sm-12">
                                                    <div>
                                                        <p class="font-18">30/night</p>
                                                    </div>
                                                    <div class="font-18">
                                                        <span id="dateCalculator">Night Cal</span>
                                                        <span class="float-right" id="dateCalculatorResult">Total Night Fee</span>
                                                    </div>
                                                    {{-- <div class="font-18">
                                                        <span>Discount Cal</span>
                                                        <span class="float-right">Total Discount Fee</span>
                                                    </div> --}}
                                                    <div class="font-18">
                                                        <span>Service Fee</span>
                                                        <span class="float-right" id="serviceFeeResult">Total Service Fee</span>
                                                    </div>
                                                    <hr>
                                                    <div class="font-18">
                                                        <span><strong>Total</strong></span>
                                                        <span class="float-right"><strong id="totalFeeResult">Total Fee</strong></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12"><hr></div>
                                                <div class="col-sm-12">
                                                    <p class="font-16"><span class="text-danger"><strong>Note:</strong></span> Cancellation after 48 hours, you will get full refund minus service fee.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        
                        

                        {{-- Move next button --}}
                        <div class="col-sm-12 mt-5 ml-sm-4">
                            <button class="btn btn-primary pl-5 pr-5"><i class="fa fa-arrow-right"></i> Agree and continue</button>
                        </div>
                    </div>

                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div> 
    
</div><!-- container -->

<!-- id modal -->
<div id="idModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="idModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="idModalLabel">Upload ID front and back</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="text-center" onclick="getFrontFile();" style="cursor:pointer">
                    {{-- <div><i class="fa fa-id-card text-primary" style="font-size:150px"></i></div> --}}
                    <div>
                        <img src="{{ asset('assets/images/iconmonstr-id-card-14.svg') }}" alt="Front" width="100" height="100">    
                    </div>
                    <div>
                        <a href="javascript:void(0);"> <span id="msgStatus">Click upload ID front</span>
                            <div style='height: 0px;width:0px; overflow:hidden;'><input id="front_file" type="file" name="front_file" /></div>
                        </a>
                    </div>
                </div>
                <div class="mt-4 text-center" onclick="getBackFile();" style="cursor:pointer">
                    <div>
                        <img src="{{ asset('assets/images/iconmonstr-credit-card-15.svg') }}" alt="Front" width="100" height="100">    
                    </div>
                    <div>
                        <a href="javascript:void(0);"> <span id="msgStatus2">Click to upload ID back</span>
                            <div style='height: 0px;width:0px; overflow:hidden;'><input id="back_file" type="file" name="back_file" /></div>
                        </a>
                    </div>
                </div>             
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->  

@endsection

@section('scripts')

<script>
$(".btnAddNewID").on("click", function(e){
    e.preventDefault();
    e.stopPropagation();
    $("#idModal").modal("show");
    return false;
});

function getFrontFile(){
    document.getElementById("front_file").click();
}

function getBackFile(){
    document.getElementById("back_file").click();
}

$("#front_file").on("change", function(){
    var form_data = new FormData();
    var size = document.getElementById('front_file').files[0].size;
    var selectedFile = document.getElementById('front_file').files[0].name;
    var ext = selectedFile.replace(/^.*\./, '');
    ext= ext.toLowerCase();
    if(size>1000141){
        swal("Opps", "Uploaded file is greater than 1mb.", "error");
        document.getElementById("front_file").value = null;
    }
    else if(ext!='jpg' && ext!='jpeg' && ext!='png'){
        swal("Opps", "Unknown file types.", "error");
        document.getElementById("front_file").value = null;
    }
    else{
        form_data.append("front_file", document.getElementById('front_file').files[0]);
        $.ajax({
            url: "{{ route('profile.front.card') }}", 
            type: 'POST',
            data: form_data,
            contentType: false,
            processData: false,
            success: function (response) {
                if(response=='fail'){
                    swal("Opps", "Something went wrong with your inputs. Try again.", "warning");
                }
                else if(response=='error'){
                    swal("Opps", "Something went wrong.", "warning");
                }
                else if(response=='nophoto'){
                    swal("Opps", "No photo is selected.", "warning");
                }
                else{
                    $("#msgStatus").addClass('text-success').text("Uploaded Successfully");
                    $(".front_card").attr("src", "{{ asset('assets/images/cards') }}/"+response); 
                }
                document.getElementById("front_file").value = null;
            },
            error: function(response){
                alert('Something went wrong.');
                document.getElementById("front_file").value = null;
            }
            
        });
    }
    
    return false;
});

$("#back_file").on("change", function(){
    var form_data = new FormData();
    var size = document.getElementById('back_file').files[0].size;
    var selectedFile = document.getElementById('back_file').files[0].name;
    var ext = selectedFile.replace(/^.*\./, '');
    ext= ext.toLowerCase();
    if(size>1000141){
        swal("Opps", "Uploaded file is greater than 1mb.", "error");
        document.getElementById("back_file").value = null;
    }
    else if(ext!='jpg' && ext!='jpeg' && ext!='png'){
        swal("Opps", "Unknown file types.", "error");
        document.getElementById("back_file").value = null;
    }
    else{
        form_data.append("back_file", document.getElementById('back_file').files[0]);
        $.ajax({
            url: "{{ route('profile.back.card') }}", 
            type: 'POST',
            data: form_data,
            contentType: false,
            processData: false,
            success: function (response) {
                if(response=='fail'){
                    swal("Opps", "Something went wrong with your inputs. Try again.", "warning");
                }
                else if(response=='error'){
                    swal("Opps", "Something went wrong.", "warning");
                }
                else if(response=='nophoto'){
                    swal("Opps", "No photo is selected.", "warning");
                }
                else{
                    $("#msgStatus2").addClass('text-success').text("Uploaded Successfully");
                    $(".back_card").attr("src", "{{ asset('assets/images/cards') }}/"+response); 
                }
                document.getElementById("back_file").value = null;
            },
            error: function(response){
                alert('Something went wrong.');
                document.getElementById("back_file").value = null;
            }
            
        });
    }
    
    return false;
});
</script>
@endsection