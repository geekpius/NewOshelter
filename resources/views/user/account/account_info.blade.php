@extends('layouts.site')

@section('content')

<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>Account Info</h2>  
        <p>
            <strong>{{ Auth::user()->name }},</strong> account owner 
        </p>
        <div id="" class="pt-4">
            @include('includes.gobackroute')
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="card card-bordered-blue">
                        <div class="card-body">
                            <div class="met-profile-main">
                                <div class="met-profile-main-pic text-center" onclick="getFile();" style="cursor: pointer">
                                    <img src="{{ (empty(Auth::user()->image))? asset('assets/images/user.svg'):asset('assets/images/users/'.Auth::user()->image) }}" alt="{{ Auth::user()->name }}" width="130" height="130" class="rounded-circle img_preview" />
                                    <div style='height: 0px;width:0px; overflow:hidden;'><input id="upfile" type="file" name="photo" data-href="{{ route('profile.photo') }}" /></div>
                                </div>
                            </div> 

                            <div class="text-center mt-3">
                                <h5 id="myLegalName">{{ Auth::user()->name }}</h5>                                                        
                                <p class="mb-0" id="myOccupation">{{ empty(Auth::user()->profile->occupation)? 'Profession':Auth::user()->profile->occupation }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card card-bordered-blue">
                        <div class="card-body">
                            <div class="text-center">
                                <h6 class="small font-weight-bold">GOVERNMENT APPROVED ID CARD</h6>
                            </div>
                            @php $cardFront = (empty(Auth::user()->profile->id_front))? '1.png':'cards/'.Auth::user()->profile->id_front; @endphp
                            <div class="text-center mt-2">
                                <img src="{{ asset('assets/images/'.$cardFront) }}" alt="ID Card Front" class="front_card img-responsive" width="300" height="170" style="border-radius:2%" />
                            </div>
                            @if (!Auth::user()->is_id_verified)
                            <div class="text-center mt-3">
                                @if (empty(Auth::user()->profile->id_type))
                                <a href="#" class="text-primary text-decoration-none btnAddNewID small">Add New Government approved ID</a>
                                @endif
                                <div style="display: {{ empty(Auth::user()->profile->id_type)? 'none':'inline' }}" class="checkContainer">
                                    <small>Oshelter is checking ID card...</small>
                                </div>
                            </div>
                            @else
                            <div class="text-center mt-3"><small>ID card is checked</small></div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-8">
                    <div class="card card-bordered-blue">
                        <div class="card-body">
                            <span class="text-primary">OShelter cares for your privacy. Therefore, we releases contact information of owners and guests after booking is confirmed.</span>
                            <hr>
                            <form class="form-horizontal form-material mb-0" id="formProfileUpdate" data-action="{{ route('account.update') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group validate">
                                            <label for="">Legal Name</label>
                                            <input type="text" name="legal_name" id="legal_name" value="{{ Auth::user()->name }}" placeholder="Enter legal name" class="form-control">
                                            <span class="text-danger small mySpan" role="alert"></span>                                  
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group validate">
                                            <label for="">Gender</label>
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="">--Select gender--</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                            <span class="text-danger small mySpan" role="alert"></span>                                  
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group validate">
                                            <label for="">Date of Birth</label>
                                            <input type="date" name="dob" id="dob" value="{{ empty(Auth::user()->profile->dob)? '':Auth::user()->profile->dob }}" placeholder="Select dob" class="form-control">
                                            <span class="text-danger small mySpan" role="alert"></span>                                  
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group validate">
                                            <label for="">Marital status</label>
                                            <select name="marital_status" id="marital_status" class="form-control">
                                                <option value="">--Select status--</option>
                                                <option value="single">Single</option>
                                                <option value="married">Married</option>
                                                <option value="divorce">Divorce</option>
                                                <option value="widow">Widow</option>
                                                <option value="widower">Widower</option>
                                            </select>
                                            <span class="text-danger small mySpan" role="alert"></span>                                  
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group validate">
                                            <label for="">City</label>
                                            <input type="text" name="city" id="city" value="{{ empty(Auth::user()->profile->city)? '':Auth::user()->profile->city }}" placeholder="Enter city location" class="form-control">
                                            <span class="text-danger small mySpan" role="alert"></span>                                  
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group validate">
                                            <label for="">Profession/Occupation</label>
                                            <input type="text" name="profession" id="profession" value="{{ empty(Auth::user()->profile->occupation)? '':Auth::user()->profile->occupation }}" placeholder="Enter your profession/occupation" class="form-control">
                                            <span class="text-danger small mySpan" role="alert"></span>                                  
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group validate">
                                            <label for="">Emergency Contact</label>
                                            <input type="tel" name="emergency_contact" id="emergency_contact" onkeypress="return isNumber(event)" value="{{ empty(Auth::user()->profile->emergency)? '':Auth::user()->profile->emergency }}" placeholder="Enter emergency contact" class="form-control">
                                            <span class="text-danger small mySpan" role="alert"></span>                                  
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary px-4 mt-3 btnProfileUpdate"><i class="mdi mdi-refresh fa-lg"></i> Update Profile</button>
                                </div>
                            </form> 
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 offset-sm-4">
                    <div class="text-center mt-2">
                        Would you like to deactivate your account?
                        <a href="{{ route('profile.deactivate') }}" class="text-danger ml-2">Deactivate Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>

<!-- id modal -->
<div id="idModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="idModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-sm">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="idModalLabel">Upload ID card front</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="text-center" onclick="getFrontFile();" style="cursor:pointer">
                    <div>
                        <img src="{{ asset('assets/images/iconmonstr-id-card-14.svg') }}" data-img="{{ (empty(Auth::user()->profile->id_front))? '':'cards/'.Auth::user()->profile->id_front }}" alt="Front" width="100" height="100" id="img_preview">    
                    </div>
                    <div>
                        <a href="javascript:void(0);"> <span id="msgStatus">Upload ID front</span>
                            <div style='height: 0px;width:0px; overflow:hidden;'><input id="front_file" type="file" name="front_file" data-url="{{ route('profile.front.card') }}" data-path="{{ asset('assets/images/cards') }}" /></div>
                        </a>
                    </div>

                    <span class="small text-danger preview_mySpan"></span>
                </div>
                <form id="formID" action="{{ route('profile.card.info') }}" class="mt-5">
                    @csrf
                    <div class="form-group input-group-sm validate">
                        <label>Card type</label>
                        <select name="id_type" class="form-control">
                            <option value="">--Select--</option>
                            <option value="national">National ID</option>
                            <option value="voter">Voter ID</option>
                            <option value="driver">Driver's License</option>
                        </select>
                        <span class="small text-danger mySpan"></span>
                    </div> 
                    <div class="form-group input-group-sm validate">
                        <label>ID number</label>
                        <input type="text" name="id_number" placeholder="Enter your ID number" class="form-control">
                        <span class="small text-danger mySpan"></span>
                    </div> 
                    
                    <div class="form-group input-group-sm">
                        <button class="btn btn-primary btn-sm btnID">Update Info</button>
                    </div>   
                </form>   
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal --> 

@endsection

@section('scripts')
<script src="{{ asset('assets/pages/account/all-groups.js') }}"></script>
<script>
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

$(".btnAddNewID").on("click", function(e){
    e.preventDefault();
    e.stopPropagation();
    $("#idModal").modal("show");
    return false;
});

// function to fire select images
function getFrontFile(){
    document.getElementById("front_file").click();
}

$("#front_file").on("change", function(){
    var $this = $(this);
    var form_data = new FormData();
    var size = document.getElementById('front_file').files[0].size;
    var selectedFile = document.getElementById('front_file').files[0].name;
    var ext = selectedFile.replace(/^.*\./, '');
    ext= ext.toLowerCase();
    if(size>1000141){
        swal("Opps", "Uploaded file is greater than 1mb.", "warning");
        document.getElementById("front_file").value = null;
    }
    else if(ext!='jpg' && ext!='jpeg' && ext!='png'){
        swal("Opps", "Unknown file types.", "warning");
        document.getElementById("front_file").value = null;
    }
    else{
        form_data.append("front_file", document.getElementById('front_file').files[0]);
        $.ajax({
            url: $this.data('url'), 
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
                    $(".front_card").attr("src", $this.data('path')+"/"+response); 
                    $("#img_preview").data('img', 'inserted');
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

$("#formID").on("submit", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    var valid = true;
    $('#formID input, #formID select').each(function() {
        var $this = $(this);
        
        if(!$this.val()) {
            valid = false;
            $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
        }
    });

    if($("#img_preview").data('img') == ''){
        valid = false;
        $(".preview_mySpan").text('Upload card front view');
    }

    if(valid){
        let data = $this.serialize();
        $(".btnID").attr('disabled', false);
        $.ajax({
            url: $this.attr('action'),
            type: "POST",
            data: data,
            success: function(resp){
                if(resp==='success'){
                    swal({
                        title: "Success",
                        text: "Card info updated successful",
                        type: "success",
                        confirmButtonClass: "btn-primary btn-sm",
                        confirmButtonText: "OKAY",
                        closeOnConfirm: true
                        },
                    function(){
                        $(".btnAddNewID").hide();
                        $('.checkContainer').show();
                        $("#idModal").modal("hide");
                    });
                }else{
                    swal('Failed', `${resp} Try again`, 'warning');
                }

                $(".btnID").attr('disabled', true);
            },
            error: function(resp){
                console.log('something went wrong with request');
                $(".btnID").attr('disabled', true);
            }
        });
    }

    return false;
});

$("input").on('input', function(){
    if($(this).val()!=''){
        $(this).parents('.validate').find('.mySpan').text('');
        $(this).removeClass('is-invalid');
    }else{ 
        $(this).parents('.validate').find('.mySpan').text('The '+$(this).attr('name').replace(/[\_]+/g, ' ')+' field is required'); 
        $(this).addClass('is-invalid');
    }
});

// toggle select field error messages
$("select").on('change', function(){
    if($(this).val()!=''){
        $(this).parents('.validate').find('.mySpan').text('');
        $(this).removeClass('is-invalid');
    }else{ 
        $(this).parents('.validate').find('.mySpan').text('The '+$(this).attr('name').replace(/[\_]+/g, ' ')+' field is required');
        $(this).addClass('is-invalid');
    }
});


$("#formProfileUpdate select[name='gender']").val("{{ empty(Auth::user()->profile->gender)? '':Auth::user()->profile->gender }}");
$("#formProfileUpdate select[name='marital_status']").val("{{ empty(Auth::user()->profile->marital_status)? '':Auth::user()->profile->marital_status }}");
</script>
@endsection