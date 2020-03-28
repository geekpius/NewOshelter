@extends('layouts.host')

@section('styles')
<link href="{{ asset('assets/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/plugins/filter/magnific-popup.css') }}" rel="stylesheet" type="text/css" />
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
                                        <img src="{{ (empty(Auth::user()->image))? asset('assets/images/users/user-4.jpg'):asset('assets/images/users/'.Auth::user()->image) }}" alt="{{ Auth::user()->name }}" width="130" height="130" class="rounded-circle img_preview">
                                        <span class="fro-profile_main-pic-change" onclick="getFile();">
                                            <i class="fas fa-camera">
                                                <div style='height: 0px;width:0px; overflow:hidden;'><input id="upfile" type="file" name="photo" /></div></i>
                                        </span>
                                    </div>
                                    <div class="met-profile_user-detail ml-3">
                                        <h5 class="met-user-name">{{ Auth::user()->name }} <small>({{ Auth::user()->membership }})</small></h5>                                                        
                                        <p class="mb-0 met-user-name-post" id="myOccupation">{{ empty($user->profile->occupation)? 'N/A':$user->profile->occupation }}</p>
                                    </div>
                                </div>                                                
                            </div><!--end col-->
                            <div class="col-lg-4 ml-auto">
                                <ul class="list-unstyled personal-detail">
                                    <li class=""><i class="dripicons-phone mr-2 text-info font-18"></i> <b> Phone </b> : {{ $user->phone }}</li>
                                    <li class="mt-2"><i class="dripicons-mail text-info font-18 mt-2 mr-2"></i> <b> Email </b> : {{ Auth::user()->email }}</li>
                                    <li class="mt-2"><i class="dripicons-location text-info font-18 mt-2 mr-2"></i> <b>Location</b> : <span id="myCity">{{ empty($user->profile->city)? 'N/A':$user->profile->city }}</span></li>
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
                            <a class="nav-link" id="portfolio_detail_tab" data-toggle="pill" href="#portfolio_detail">Portfolio</a>
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
                                                        <td>Date of Birth</td>
                                                        <td>
                                                            <a href="#" id="inline-dob" data-type="combodate" data-value="{{ empty($user->profile->dob)? '':$user->profile->dob }}" data-format="YYYY-MM-DD" data-viewformat="DD/MM/YYYY" data-template="D / MMM / YYYY" data-pk="1"  data-title="Select Date of birth"></a> &nbsp; <span id="myAge">({{ $user->getAgeAttribute() }})</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>City</td>
                                                        <td>
                                                            <a href="#" id="inline-city" data-type="text" data-value="{{ empty($user->profile->city)? '':$user->profile->city }}" data-placement="right" data-placeholder="Required" data-title="Enter your city" data-pk="1"></a> - <strong>Ghana</strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Occupation/Profession</td>
                                                        <td>
                                                            <a href="#" id="inline-occupation" data-type="text" data-pk="1" data-value="{{ empty($user->profile->occupation)? '':$user->profile->occupation }}" data-placement="right" data-placeholder="Required" data-title="Enter your occupation"></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Business Name</td>
                                                        <td>
                                                            <a href="#" id="inline-business" data-type="text" data-pk="1" data-value="{{ empty($user->profile->business_name)? '':$user->profile->business_name }}" data-placement="right" data-placeholder="Required" data-title="Enter your business name"></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Business Description</td>
                                                        <td>
                                                            <a href="#" id="inline-desc" data-type="textarea" data-pk="1" data-placeholder="Your business description here..." data-title="Enter business description">{{ empty($user->profile->description)? '':$user->profile->description }}</a>
                                                        </td>
                                                    </tr> 
                                                </tbody>
                                            </table><!--end table-->                                             
                                       </div>
                                       <div class="col-lg-4">
                                            <div class="row">
                                                <div class="col-lg-6 mx-auto">
                                                    <div class="own-detail bg-blue">
                                                        <h1>{{Auth::user()->properties->count()}}</h1>
                                                        <h5>Properties</h5>
                                                    </div>
                                                    <div class="own-detail own-detail-project bg-secondary">
                                                        <h1>0</h1>
                                                        <h5>Tenants</h5>
                                                    </div>
                                                    <div class="own-detail own-detail-happy bg-success">
                                                        <h1>0</h1>
                                                        <h5>Reviews</h5>
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

                <div class="tab-pane fade" id="portfolio_detail">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <ul class="col container-filter categories-filter mb-0" id="filter">
                                            <li><a class="categories active" data-filter="*">All</a></li>
                                            <li><a class="categories" data-filter=".branding">House</a></li>
                                            <li><a class="categories" data-filter=".design">Room</a></li>
                                            <li><a class="categories" data-filter=".photo">Apartment</a></li>
                                            <li><a class="categories" data-filter=".coffee">coffee</a></li>
                                        </ul>
                                    </div><!-- End portfolio  -->
                                </div><!--end card-body-->
                            </div><!--end card-->
                            
                            <div class="card">
                                <div class="card-body">
                                    <div class="row container-grid nf-col-3  projects-wrapper">
                                        <div class="col-lg-4 col-md-6 p-0 nf-item branding design coffee spacing">
                                            <div class="item-box">
                                                <a class="cbox-gallary1 mfp-image" href="../assets/images/small/img-1.jpg" title="Consequat massa quis">
                                                    <img class="item-container " src="../assets/images/small/img-1.jpg" alt="7" />
                                                    <div class="item-mask">
                                                        <div class="item-caption">
                                                            <h5 class="text-white">Consequat massa quis</h5>
                                                            <p class="text-white">Branding, Design, Coffee</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div><!--end item-box-->
                                        </div><!--end col-->
                        
                                        <div class="col-lg-4 col-md-6 p-0 nf-item photo spacing">
                                            <div class="item-box">
                                                <a class="cbox-gallary1 mfp-image" href="../assets/images/small/img-2.jpg" title="Vivamus elementum semper">
                                                    <img class="item-container mfp-fade" src="../assets/images/small/img-2.jpg" alt="2" />
                                                    <div class="item-mask">
                                                        <div class="item-caption">
                                                            <h5 class="text-light">Vivamus elementum semper</h5>
                                                            <p class="text-light">Photo</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div><!--end item-box-->
                                        </div><!--end col-->
                        
                                        <div class="col-lg-4 col-md-6 p-0 nf-item branding coffee spacing">
                                            <div class="item-box">
                                                <a class="cbox-gallary1 mfp-image" href="../assets/images/small/img-3.jpg" title="Quisque rutrum">
                                                    <img class="item-container" src="../assets/images/small/img-3.jpg" alt="4" />
                                                    <div class="item-mask">
                                                        <div class="item-caption">
                                                            <h5 class="text-light">Quisque rutrum</h5>
                                                            <p class="text-light">Branding, Design, Coffee</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div><!--end item-box-->
                                        </div><!--end col-->
                        
                                        <div class="col-lg-4 col-md-6 p-0 nf-item branding design spacing">
                                            <div class="item-box">
                                                <a class="cbox-gallary1 mfp-image" href="../assets/images/small/img-4.jpg" title="Tellus eget condimentum">
                                                    <img class="item-container" src="../assets/images/small/img-4.jpg" alt="5" />
                                                    <div class="item-mask">
                                                        <div class="item-caption">
                                                            <h5 class="text-light">Tellus eget condimentum</h5>
                                                            <p class="text-light">Design</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div><!--end item-box-->
                                        </div><!--end col-->
                        
                                        <div class="col-lg-4 col-md-6 p-0 nf-item branding design spacing">
                                            <div class="item-box">
                                                <a class="cbox-gallary1 mfp-image" href="../assets/images/small/img-5.jpg" title="Nullam quis ant">
                                                    <img class="item-container" src="../assets/images/small/img-5.jpg" alt="6" />
                                                    <div class="item-mask">
                                                        <div class="item-caption">
                                                            <h5 class="text-light">Nullam quis ant</h5>
                                                            <p class="text-light">Branding, Design</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div><!--end item-box-->
                                        </div><!--end col-->
                        
                                        <div class="col-lg-4 col-md-6 p-0 nf-item photo spacing">
                                            <div class="item-box">
                                                <a class="cbox-gallary1 mfp-image" href="{{ asset('assets/images/small/img-6.jpg') }}" title="Sed fringilla mauris">
                                                    <img class="item-container" src="{{ asset('assets/images/small/img-6.jpg') }}" alt="1" />
                                                    <div class="item-mask">
                                                        <div class="item-caption">
                                                            <h5 class="text-light">Sed fringilla mauris</h5>
                                                            <p class="text-light">Photo</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div><!--end item-box-->
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                        <div class="col-lg-4">
                            <div class="card ">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h4><i class="fas fa-quote-left text-primary"></i></h4>
                                    </div>                                            
                                    <div id="carouselExampleFade2" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item">
                                                <div class="text-center">
                                                    <p class="text-muted px-4">
                                                        It is a long established fact that a reader will be distracted by 
                                                        the readable content of a page when looking at its layout. 
                                                        The point of using Lorem Ipsum is that it has a more-or-less 
                                                        normal distribution of letters, as opposed to using.
                                                    </p>
                                                    <div class="">
                                                        <img src="{{ asset('assets/images/users/user-10.jpg') }}" alt="" class="rounded-circle thumb-lg mb-2">
                                                        <p class="mb-0 text-primary"><b>- Mary K. Myers</b></p>
                                                        <small class="text-muted">CEO Facebook</small>
                                                    </div>                                                            
                                                </div>
                                            </div>
                                            <div class="carousel-item active">
                                                <div class="text-center">
                                                    <p class="text-muted px-4">                                                                
                                                        Where does it come from?
                                                        Contrary to popular belief, Lorem Ipsum is not simply random text. 
                                                        It has roots in a piece of classical Latin literature from 45 BC, 
                                                        making it over 2000 years  popular belief,old.
                                                    </p>
                                                    <div class="">
                                                        <img src="{{ asset('assets/images/users/user-4.jpg') }}" alt="" class="rounded-circle  thumb-lg mb-2">
                                                        <p class="mb-0 text-primary"><b>- Michael C. Rios</b></p>
                                                        <small class="text-muted">CEO Facebook</small>
                                                    </div>                                                            
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class="text-center">
                                                    <p class="text-muted px-4">
                                                        There are many variations of passages of Lorem Ipsum available, 
                                                        but the majority have suffered alteration in some form, by injected humour, 
                                                        or randomised words which don't look even slightly believable. 
                                                        If you are going to use a passage of Lorem Ipsum. 
                                                    </p>
                                                    <div class="">
                                                        <img src="{{ asset('assets/images/users/user-5.jpg') }}" alt="" class="rounded-circle thumb-lg mb-2">
                                                        <p class="mb-0 text-primary"><b>- Lisa D. Pullen</b></p>
                                                        <small class="text-muted">CEO Facebook</small>
                                                    </div>                                                            
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end row-->
                </div><!--end portfolio detail-->
                
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
<script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}"></script>
<script src="{{ asset('assets/pages/jquery.profile.init.js') }}"></script>

<script src="{{ asset('assets/plugins/filter/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/plugins/filter/masonry.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/plugins/filter/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/pages/jquery.gallery.inity.js') }}"></script>

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
        url: "{{ route('host.account.dob') }}",
        success: function(response, newValue) {
            if(response=='error') {
                return 'Something went wrong. Please try later.';
            }else{
                getAge(new Date(newValue));
            }
        }
    });

    $('#inline-city').editable({
        validate: function (value) {
            if ($.trim(value) == '') return 'This field is required';
        },
        mode: 'inline',
        inputclass: 'form-control-sm',
        url: "{{ route('host.account.city') }}",
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
        url: "{{ route('host.account.occupation') }}",
        success: function(response, newValue) {
            if(response=='error') {
                return 'Something went wrong. Please try later.';
            }else{
                getOccupation(newValue);
            }
        }
    });

    $('#inline-business').editable({
        validate: function (value) {
            if ($.trim(value) == '') return 'This field is required';
        },
        mode: 'inline',
        inputclass: 'form-control-sm',
        url: "{{ route('host.account.business') }}",
        success: function(response, newValue) {
            if(response=='error') {
                return 'Something went wrong. Please try later.';
            }
        }
    });

    $('#inline-desc').editable({
        showbuttons: 'bottom',
        mode: 'inline',
        inputclass: 'form-control-sm',
        url: "{{ route('host.account.description') }}",
        success: function(response, newValue) {
            if(response=='error') {
                return 'Something went wrong. Please try later.';
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
            url: "{{ route('host.password.change') }}",
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
            url: "{{ route('host.profile.photo') }}", 
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