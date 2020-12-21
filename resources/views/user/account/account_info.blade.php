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
                                            <input type="number" name="emergency_contact" id="emergency_contact" value="{{ empty(Auth::user()->profile->emergency)? '':Auth::user()->profile->emergency }}" placeholder="Enter emergency contact" class="form-control">
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
                <div class="col-sm-8 offset-4">
                    <div class="text-center mt-2">
                        Would you like to deactivate your account?
                        <a href="{{ route('profile.deactivate') }}" class="text-danger ml-2">Deactivate Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>

@endsection

@section('scripts')
<script src="{{ asset('assets/pages/account/all-groups.js') }}"></script>
<script>
$("#formProfileUpdate select[name='gender']").val("{{ empty(Auth::user()->profile->gender)? '':Auth::user()->profile->gender }}");
$("#formProfileUpdate select[name='marital_status']").val("{{ empty(Auth::user()->profile->marital_status)? '':Auth::user()->profile->marital_status }}");
</script>
@endsection