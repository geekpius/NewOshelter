@extends('layouts.app')

@section('styles')
<!-- X-editable css -->
<link type="text/css" href="{{ asset('assets/plugins/x-editable/css/bootstrap-editable.css') }}" rel="stylesheet">

<!-- DataTables -->
<link href="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">My Account</li>
                    </ol>
                </div>
                <h4 class="page-title">My Account</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body  met-pro-bg">
                    <div class="met-profile">
                        <div class="row">
                            <div class="col-lg-4 align-self-center mb-3 mb-lg-0">
                                <div class="met-profile-main">
                                    <div class="met-profile-main-pic">
                                        <img src="{{ (empty(Auth::user()->image))? asset('assets/images/user.jpg'):asset('assets/images/users/'.Auth::user()->image) }}" alt="{{ Auth::user()->name }}" width="130" height="130" class="rounded-circle img_preview">
                                        <span class="fro-profile_main-pic-change" onclick="getFile();">
                                            <i class="fas fa-camera">
                                                <div style='height: 0px;width:0px; overflow:hidden;'><input id="upfile" type="file" name="photo" /></div></i>
                                        </span>
                                    </div>
                                    <div class="met-profile_user-detail ml-3">
                                        <h5 class="met-user-name">{{ Auth::user()->name }} <small>({{ Auth::user()->membership }})</small></h5>                                                        
                                        <p class="mb-0 met-user-name-post" id="myOccupation">{{ empty(Auth::user()->profile->occupation)? 'N/A':Auth::user()->profile->occupation }}</p>
                                    </div>
                                </div>                                                
                            </div><!--end col-->
                            <div class="col-lg-4 ml-auto">
                                <ul class="list-unstyled personal-detail">
                                    <li class=""><i class="dripicons-phone mr-2 text-info font-18"></i> <b> Phone </b> : {{ Auth::user()->phone }}</li>
                                    <li class="mt-2"><i class="dripicons-mail text-info font-18 mt-2 mr-2"></i> <b> Email </b> : {{ Auth::user()->email }}</li>
                                    <li class="mt-2"><i class="dripicons-location text-info font-18 mt-2 mr-2"></i> <b>Location</b> : <span id="myCity">{{ empty(Auth::user()->profile->city)? 'N/A':Auth::user()->profile->city }}</span></li>
                                    <li class="mt-2"><i class="fas fa-map-pin text-info font-18 mt-2 mr-2"></i> <b>Digital Address</b> : <a class="text-white" href="https://ghanapostgps.com/mapview.html#{{ Auth::user()->digital_address }}" target="_blank">{{ Auth::user()->digital_address }}</a></li>
                                    <li class="mt-2"><i class="fa fa-clock text-info font-18 mt-2 mr-2"></i> <b>Login Time</b> : {{ Auth::user()->login_time }}</li>
                                </ul>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end f_profile-->                                                                                
                </div><!--end card-body-->
                <div class="card-body">
                    <ul class="nav nav-pills mb-0" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="general_detail_tab" data-toggle="pill" href="#general_detail">General</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="settings_detail_tab" data-toggle="pill" href="#settings_detail">Change Password</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="activity_detail_tab" data-toggle="pill" href="#activity_detail">Activities</a>
                        </li>
                    </ul>        
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div><!--end row-->
    <div class="row">
        <div class="col-12">
            <div class="tab-content detail-list" id="pills-tabContent">
                <div class="tab-pane fade show active" id="general_detail">
                    <div class="row">
                        <div class="col-12">                                            
                            <div class="card">
                                <div class="card-body">
                                   <div class="row">
                                       <div class="col-md-8">
                                            <table class="table mb-0" id="profileTable">
                                                <thead>
                                                <tr>
                                                    <th colspan="2" class="text-uppercase text-primary">Update Profile</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Gender</td>
                                                        <td>
                                                            <a href="#" id="inline-gender" data-type="select" data-value="{{ empty(Auth::user()->profile->gender)? '':Auth::user()->profile->gender }}" data-placement="right" data-placeholder="Required" data-title="Select your gender" data-pk="1"></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Date of Birth</td>
                                                        <td>
                                                            <a href="#" id="inline-dob" data-type="combodate" data-value="{{ empty(Auth::user()->profile->dob)? '':Auth::user()->profile->dob }}" data-format="YYYY-MM-DD" data-viewformat="DD/MM/YYYY" data-template="D / MMM / YYYY" data-pk="1"  data-title="Select Date of birth"></a> &nbsp; <span id="myAge">({{ Auth::user()->getAgeAttribute() }})</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Marital Status</td>
                                                        <td>
                                                            <a href="#" id="inline-marital" data-type="select" data-value="{{ empty(Auth::user()->profile->marital_status)? '':Auth::user()->profile->marital_status }}" data-placement="right" data-placeholder="Required" data-title="Select your marital status" data-pk="1"></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>No of Children</td>
                                                        <td>
                                                            <a href="#" id="inline-children" data-type="select" data-value="{{ empty(Auth::user()->profile->children)? '':Auth::user()->profile->children }}" data-placement="right" data-placeholder="Required" data-title="Enter your city" data-pk="1"></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>City</td>
                                                        <td>
                                                            <a href="#" id="inline-city" data-type="text" data-value="{{ empty(Auth::user()->profile->city)? '':Auth::user()->profile->city }}" data-placement="right" data-placeholder="Required" data-title="Enter your city" data-pk="1"></a> - <strong>Ghana</strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Occupation/Profession</td>
                                                        <td>
                                                            <a href="#" id="inline-occupation" data-type="text" data-pk="1" data-value="{{ empty(Auth::user()->profile->occupation)? '':Auth::user()->profile->occupation }}" data-placement="right" data-placeholder="Required" data-title="Enter your occupation"></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table><!--end table-->                                             
                                       </div>
                                       <div class="col-lg-4">
                                            <div class="row">
                                                <div class="col-lg-6 mx-auto">
                                                    <div class="own-detail bg-blue">
                                                        <h1>{{ Auth::user()->propertyRents->count() }}</h1>
                                                        <h5>Rents</h5>
                                                    </div>
                                                    <div class="own-detail own-detail-project bg-secondary">
                                                        <h1>{{ Auth::user()->propertyBuys->count() }}</h1>
                                                        <h5>Buys</h5>
                                                    </div>
                                                    <div class="own-detail own-detail-happy bg-success">
                                                        <h1>{{ Auth::user()->propertyBids->count() }}</h1>
                                                        <h5>Bids</h5>
                                                    </div>
                                                </div>                                        
                                            </div>                                                                                                                       
                                       </div>
                                   </div>  
                                   
                                   <div class="row">
                                       <div class="col-lg-12">
                                           Look at the template profile <br>
                                           Auth <br>
                                           Deactivate
                                       </div>
                                   </div>
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end row-->                                             
                </div><!--end general detail-->

                <div class="tab-pane fade" id="settings_detail">
                    <div class="row">
                        <div class="col-lg-12 col-xl-9 mx-auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-6">
                                            <form class="form-horizontal form-material mb-0" id="formChangePassword">
                                                @csrf
                                                <div class="form-group validate">
                                                    <input type="password" name="current_password" id="currrent_password" placeholder="Enter Current Password" class="form-control">
                                                    <span class="text-danger small" role="alert"></span>                                  
                                                </div>
                                                <div class="form-group validate">
                                                    <input type="password" name="password" placeholder="Enter New Password" class="form-control">
                                                    <span class="text-danger small" role="alert"></span>                                  
                                                </div>
                                                <div class="form-group validate">
                                                    <input type="password" name="password_confirmation" placeholder="Confirm New Password" class="form-control">
                                                    <span class="text-danger small" role="alert"></span>                                  
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-gradient-primary btn-sm text-light px-4 mt-3 float-right mb-0 btnChangePassword"><i class="mdi mdi-refresh fa-lg"></i> Change Password</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>                                            
                            </div>
                        </div> <!--end col-->                                          
                    </div><!--end row-->
                </div><!--end settings detail-->

                <div class="tab-pane fade" id="activity_detail">
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive dash-social">
                                        <table id="datatable" class="table">
                                            <thead>
                                            <tr>
                                                <th>Timestamp</th>
                                                <th>Activity</th>
                                            </tr><!--end tr-->
                                            </thead>
                
                                            <tbody>
                                            {{-- @foreach ($tickets as $tick)
                                                <tr class="record">
                                                    <td>#{{$tick->id}}</td>
                                                    <td class="text-primary">{{$tick->subject}}</td>
                                                    <td>{{$tick->help_desk}}</td>
                                                    <td>
                                                    @if (!$tick->status)
                                                        Pending
                                                    @else
                                                        Closed
                                                    @endif    
                                                    </td>
                                                    <td>{{\Carbon\Carbon::parse($tick->created_at)->diffForHumans() }}</td>
                                                    <td>                                                       
                                                        <a href="{{ route('host.ticket.read', $tick->id) }}" class="mr-3" title="View"><i class="fa fa-eye text-primary font-16"></i></a>
                                                        @if (!$tick->status)
                                                        <a href="javascript:void(0);" data-id="{{ $tick->id }}" data-href="{{ route('host.ticket.close',$tick->id) }}" class="btnClose" title="Close"><i class="fas fa-times-circle text-danger font-16"></i></a>
                                                        @endif
                                                    </td>
                                                </tr><!--end tr-->
                                            @endforeach                                        --}}
                                            </tbody>
                                        </table>                    
                                    </div>
                                </div>                                            
                            </div>
                        </div> <!--end col-->                                          
                    </div><!--end row-->
                </div><!--end activity detail-->


            </div><!--end tab-content--> 
            
        </div><!--end col-->
    </div><!--end row-->

</div><!-- container -->

@endsection

@section('scripts')
<!-- XEditable Plugin -->
<script src="{{ asset('assets/plugins/moment/moment.js') }}"></script>
<script src="{{ asset('assets/plugins/x-editable/js/bootstrap-editable.min.js') }}"></script>

<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
})

$(function () {

    //modify buttons style
    $.fn.editableform.buttons =
        '<button type="submit" class="btn btn-success editable-submit btn-xs waves-effect waves-light"><i class="mdi mdi-check"></i></button>' +
        '<button type="button" class="btn btn-danger editable-cancel btn-xs waves-effect waves-light"><i class="mdi mdi-close"></i></button>';

    $('#inline-gender').editable({
        prepend: "-Select Gender-",
        mode: 'inline',
        inputclass: 'form-control-sm',
        source: [
            {value: "male", text: 'Male'},
            {value: "female", text: 'Female'}
        ],
        url: "{{ route('guest.account.gender') }}",
        success: function(response, newValue) {
            if(response=='error') {
                return 'Something went wrong. Please try later.';
            }
        }
    });


    @php $today = \Carbon\Carbon::today(); $lastYear = $today->subYears(80); @endphp
    //inline
    $('#inline-dob').editable({
        mode: 'inline',
        combodate: {
            minYear: {{ $lastYear->year }},
            maxYear: {{ \Carbon\Carbon::now()->year }},
            minuteStep: 1
        },
        inputclass: 'form-control-sm',
        url: "{{ route('account.dob') }}",
        success: function(response, newValue) {
            if(response=='error') {
                return 'Something went wrong. Please try later.';
            }else{
                getAge(new Date(newValue));
            }
        }
    });


    $('#inline-marital').editable({
        prepend: "-Marital Status-",
        mode: 'inline',
        inputclass: 'form-control-sm',
        source: [
            {value: "single", text: 'Single'},
            {value: "married", text: 'Married'},
            {value: "divorce", text: 'Divorce'},
            {value: "widow", text: 'Widow'},
            {value: "widower", text: 'Widower'}
        ],
        url: "{{ route('account.marital') }}",
        success: function(response, newValue) {
            if(response=='error') {
                return 'Something went wrong. Please try later.';
            }
        }
    });

    $('#inline-children').editable({
        prepend: "-No of Children-",
        mode: 'inline',
        inputclass: 'form-control-sm',
        source: [
            {value: "none", text: 'None'},
            {value: "1 child", text: '1 Child'},
            {value: "2 children", text: '2 Children'},
            {value: "3 children", text: '3 Children'},
            {value: "4 children", text: '4 Children'},
            {value: "5 children", text: '5 Children'},
            {value: "6 children", text: '6 Children'},
            {value: "7 children", text: '7 Children'},
            {value: "8 children", text: '8 Children'},
            {value: "9 children", text: '9 Children'},
            {value: "10 children", text: '10 Children'},
        ],
        url: "{{ route('account.children') }}",
        success: function(response, newValue) {
            if(response=='error') {
                return 'Something went wrong. Please try later.';
            }
        }
    });


    $('#inline-city').editable({
        validate: function (value) {
            if ($.trim(value) == '') return 'This field is required';
        },
        mode: 'inline',
        inputclass: 'form-control-sm',
        url: "{{ route('account.city') }}",
        success: function(response, newValue) {
            if(response=='error') {
                return 'Something went wrong. Please try later.';
            }
            else{
                getCity(newValue);
            }
        }
    });

    $('#inline-occupation').editable({
        validate: function (value) {
            if ($.trim(value) == '') return 'This field is required';
        },
        mode: 'inline',
        inputclass: 'form-control-sm',
        url: "{{ route('account.occupation') }}",
        success: function(response, newValue) {
            if(response=='error') {
                return 'Something went wrong. Please try later.';
            }else{
                getOccupation(newValue);
            }
        }
    });
});


function getAge(dob) { 
    var diff_ms = Date.now() - dob.getTime();
    var age_dt = new Date(diff_ms); 
  
    var result =  Math.abs(age_dt.getUTCFullYear() - 1970);
    document.getElementById('myAge').innerHTML = "("+result+")";
}

function getCity(city) { 
    document.getElementById('myCity').innerText = city;
}

function getOccupation(occupation) { 
    document.getElementById('myOccupation').innerText = occupation;
}

$("#formChangePassword").on("submit", function(e){
    e.preventDefault();
    e.stopPropagation();
    var valid = true;
    $('#formChangePassword input').each(function() {
        var $this = $(this);
        
        if(!$this.val()) {
            valid = false;
            $this.parents('.validate').find('span:last').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
        }
    });
    if(valid) {
        $('.btnChangePassword').html('<i class="fa fa-spinner fa-spin"></i> Changing Password...').attr('disabled', true);
        var data = $("#formChangePassword").serialize();
        $.ajax({
            url: "{{ route('password.change') }}",
            type: "POST",
            data: data,
            success: function(resp){
                if(resp=='success'){
                    swal({
                        title: "Changed",
                        text: "Password is changed",
                        type: "success",
                        confirmButtonClass: "btn-primary btn-sm",
                        confirmButtonText: "OKAY",
                        closeOnConfirm: true
                    });
                }
                else{
                    swal({
                        title: "Opps",
                        text: resp,
                        type: "error",
                        confirmButtonClass: "btn-primary btn-sm",
                        confirmButtonText: "OKAY",
                        closeOnConfirm: true
                    });
                }
                
                $("#formChangePassword")[0].reset();
                $('.btnChangePassword').html('<i class="fa fa-refresh"></i> Change Password').attr('disabled', false);
                $("#currrent_password").focus();
            },
            error: function(resp){
                alert("Something went wrong.");
                $('.btnChangePassword').html('<i class="fa fa-refresh"></i> Change Password').attr('disabled', false);
            }
        });
    }
    return false;
});

$("#formChangePassword input").on('input', function(){
    if($(this).val()!=''){
        $(this).parents('.validate').find('span:last').text('');
    }else{ $(this).parents('.validate').find('span:last').text('The '+$(this).attr('name').replace(/[\_]+/g, ' ')+' field is required'); }
});

function getFile(){
    document.getElementById("upfile").click();
}

$("#upfile").on("change", function(){
    var form_data = new FormData();
    var size = document.getElementById('upfile').files[0].size;
    var selectedFile = document.getElementById('upfile').files[0].name;
    var ext = selectedFile.replace(/^.*\./, '');
    ext= ext.toLowerCase();
    if(size>1000141){
        swal("Opps", "Uploaded file is greater than 1mb.", "error");
        document.getElementById("upfile").value = null;
    }
    else if(ext!='jpg' && ext!='jpeg' && ext!='png'){
        swal("Opps", "Unknown file types.", "error");
        document.getElementById("upfile").value = null;
    }
    else{
        form_data.append("photo", document.getElementById('upfile').files[0]);
        $.ajax({
            url: "{{ route('profile.photo') }}", 
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
                    $(".img_preview").attr("src", "{{ asset('assets/images/users') }}/"+response); 
                }
                document.getElementById("upfile").value = null;
            },
            error: function(response){
                alert('Something went wrong.');
                document.getElementById("upfile").value = null;
            }
            
        });
    }
    
    return false;
});

$('#datatable').DataTable();
</script>
@endsection