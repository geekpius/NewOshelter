@extends('layouts.app')

@section('styles')
<!-- X-editable css -->
<link type="text/css" href="{{ asset('assets/plugins/x-editable/css/bootstrap-editable.css') }}" rel="stylesheet">
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
                            <div class="col-lg-8 align-self-center mb-3 mb-lg-0">
                                <div class="met-profile-main">
                                    <div class="met-profile-main-pic">
                                        <img src="{{ (empty(Auth::user()->image))? asset('assets/images/user.svg'):asset('assets/images/users/'.Auth::user()->image) }}" alt="{{ Auth::user()->name }}" width="130" height="130" class="rounded-circle img_preview">
                                        <span class="fro-profile_main-pic-change" onclick="getFile();">
                                            <i class="fas fa-camera">
                                                <div style='height: 0px;width:0px; overflow:hidden;'><input id="upfile" type="file" name="photo" /></div></i>
                                        </span>
                                    </div>
                                    <div class="met-profile_user-detail ml-3">
                                        <h5 class="met-user-name"><span id="myLegalName">{{ Auth::user()->name }}</span> <small>({{ Auth::user()->membership }})</small></h5>                                                        
                                        <p class="mb-0 met-user-name-post" id="myOccupation">{{ empty(Auth::user()->profile->occupation)? 'N/A':Auth::user()->profile->occupation }}</p>
                                    </div>
                                </div>                                                
                            </div><!--end col-->
                            <div class="col-lg-4">
                                <ul class="list-unstyled personal-detail">
                                    <li class=""><i class="dripicons-phone mr-2 text-info font-18"></i> <b> Phone </b> : {{ Auth::user()->phone }}</li>
                                    <li class="mt-2"><i class="dripicons-mail text-info font-18 mt-2 mr-2"></i> <b> Email </b> : {{ Auth::user()->email }}</li>
                                    <li class="mt-2"><i class="dripicons-location text-info font-18 mt-2 mr-2"></i> <b>Location</b> : <span id="myCity">{{ empty(Auth::user()->profile->city)? 'N/A':Auth::user()->profile->city }}</span></li>
                                    <li class="mt-2"><i class="fas fa-map-pin text-info font-18 mt-2 mr-2"></i> <b>Digital Address</b> : <span class="text-white">{{ Auth::user()->digital_address }}</span></li>
                                    <li class="mt-2"><i class="fa fa-clock text-info font-18 mt-2 mr-2"></i> <b>Login Time</b> : {{ Auth::user()->login_time }}</li>
                                </ul>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end f_profile-->                                                                                
                </div><!--end card-body-->
                <div class="card-body">
                    <ul class="nav nav-pills mb-0" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="profile_detail_tab" data-toggle="pill" href="#profile_detail">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="login_detail_tab" data-toggle="pill" href="#login_detail">Logins & Password</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="payment_detail_tab" data-toggle="pill" href="#payment_detail">Payments & Taxes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="notification_detail_tab" data-toggle="pill" href="#notification_detail">Notifications</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="privacy_sharing_tab" data-toggle="pill" href="#privacy_sharing">Privacy & Sharing</a>
                        </li>
                    </ul>        
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
    </div><!--end row-->
    <div class="row">
        <div class="col-12">
            <div class="tab-content detail-list" id="pills-tabContent">
                <div class="tab-pane fade show active" id="profile_detail">
                    <div class="row">
                        <div class="col-12">                                            
                            <div class="card">
                                <div class="card-body">
                                   <div class="row">
                                       <div class="col-md-8 table-responsive">
                                           <span class="ml-2 text-primary">OShelter cares for your privacy. Therefore we releases contact information of owners and guests after booking is confirmed.</span>
                                            <table class="table mb-0" id="profileTable">
                                                <thead>
                                                <tr>
                                                    <th colspan="2" class="text-uppercase text-primary">Update Profile</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Legal Name</td>
                                                        <td>
                                                            <a href="#" id="inline-name" data-type="text" data-emptytext="Your legal name" data-value="{{ Auth::user()->name }}" data-placement="right" data-placeholder="Required" data-title="Enter your legal name" data-pk="1"></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Gender</td>
                                                        <td>
                                                            <a href="#" id="inline-gender" data-type="select" data-value="{{ empty(Auth::user()->profile->gender)? '':Auth::user()->profile->gender }}" data-placement="right" data-placeholder="Required" data-title="Select your gender" data-pk="1"></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Date of Birth</td>
                                                        <td>
                                                            <a href="#" id="inline-dob" data-emptytext="Your legal date of birth" data-type="combodate" data-value="{{ empty(Auth::user()->profile->dob)? '':Auth::user()->profile->dob }}" data-format="YYYY-MM-DD" data-viewformat="DD/MM/YYYY" data-template="D / MMM / YYYY" data-pk="1"  data-title="Select Date of birth"></a> &nbsp; <span id="myAge">({{ Auth::user()->getAgeAttribute() }})</span>
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
                                                            <a href="#" id="inline-city" data-emptytext="Your current city" data-type="text" data-value="{{ empty(Auth::user()->profile->city)? '':Auth::user()->profile->city }}" data-placement="right" data-placeholder="Required" data-title="Enter your city" data-pk="1"></a>  <strong>{{ empty(Auth::user()->profile->country)? '':' - '.Auth::user()->profile->country }}</strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Occupation/Profession</td>
                                                        <td>
                                                            <a href="#" id="inline-occupation" data-emptytext="Your current occupation" data-type="text" data-pk="1" data-value="{{ empty(Auth::user()->profile->occupation)? '':Auth::user()->profile->occupation }}" data-placement="right" data-placeholder="Required" data-title="Enter your occupation"></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Emergency Contact</td>
                                                        <td>
                                                            <a href="#" id="inline-emergency" data-emptytext="Your emergency contact" data-type="text" data-pk="1" data-value="{{ empty(Auth::user()->profile->emergency)? '':Auth::user()->profile->emergency }}" data-placement="right" data-placeholder="Required" data-title="Enter your emergency contact"></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Valid ID</td>
                                                        <td>
                                                            @if (empty(Auth::user()->profile->id_front) && empty(Auth::user()->profile->id_back))
                                                            <a href="javascript:void(0);" class="text-primary btnAddNewID">Add New Government ID Approve</a>
                                                            @else
                                                            <i class="fa fa-check text-success"></i> ID is checked
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table><!--end table-->                                             
                                       </div>
                                       <div class="col-md-4">
                                            <div class="text-center mt-4">
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


                                       <div class="col-md-12">
                                           <div class="text-center mt-5">
                                               Would you like to deactivate your account?
                                               <a href="{{ route('profile.deactivate') }}" class="text-danger ml-2">Deactivate Account</a>
                                           </div>
                                       </div>
                                   </div>  
                                   
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end row-->                                             
                </div><!--end general detail-->

                <div class="tab-pane fade" id="login_detail">
                    <div class="row">
                        <div class="col-sm-12 mx-auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h5 class="text-primary">Change Password</h5>
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
                                                    <button class="btn btn-gradient-primary btn-sm text-light px-4 mt-3 float-right mb-5 btnChangePassword"><i class="mdi mdi-refresh fa-lg"></i> Change Password</button>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="col-sm-4 pb-5 pl-3 pr-3">
                                            <h5 class="text-primary mb-3">Social Account</h5>
                                            <div>
                                                <h6><strong>Facebook</strong></h6>
                                                <a href="javascript:void(0);" class="float-right text-primary mr-5">Connect</a>
                                                <p>Not Connected</p>
                                                <hr>
                                            </div>
                                            <div>
                                                <h6><strong>Google</strong></h6>
                                                <a href="javascript:void(0);" class="float-right text-primary mr-5">Connect</a>
                                                <p>Not Connected</p>
                                                <hr>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <h5 class="text-primary">Device History</h5>
                                            <div>
                                                <div class="float-left mr-3">
                                                    <i class="fa fa-desktop fa-2x"></i>
                                                </div>
                                                <div class="">
                                                    <p>Linux - Chrome <br>Accra, Ghana - 14-April-2020 at 11:05am</p>
                                                </div>
                                                <hr>
                                            </div>
                                            <div>
                                                <div class="float-left mr-3">
                                                    <i class="fa fa-desktop fa-2x"></i>
                                                </div>
                                                <div class="">
                                                    <p>Linux - Chrome <br>Accra, Ghana - 14-April-2020 at 11:05am</p>
                                                </div>
                                                <hr>
                                            </div>
                                            @foreach (Auth::user()->userLogins() as $log)
                                                <div>
                                                    <div class="float-left mr-3">
                                                        <i class="fa fa-desktop fa-2x"></i>
                                                    </div>
                                                    <div class="">
                                                        <p>{{ $log->device }} - {{ $log->browser }} <br>
                                                            {{ $log->location }} - {{ \Carbon\Carbon::parse($log->login_date)->format('d-M-Y') }} at {{ \Carbon\Carbon::parse($log->login_time)->format('h:ia') }}
                                                        </p>
                                                    </div>
                                                    <hr>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>                                            
                            </div>
                        </div> <!--end col-->                                          
                    </div><!--end row-->
                </div><!--end settings detail-->

                <div class="tab-pane fade" id="payment_detail">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p>
                                                <strong class="text-primary">Make all payments through OShelter</strong><br>
                                                Always pay and communicate through OShelter to ensure you're protected under our Terms of Service, 
                                                Payments Terms of Service, cancellation, and other safeguards. <a href="javascript:void(0);" class="text-primary">Learn more</a>
                                            </p>
                                            <p>
                                                <strong class="text-primary">Payout</strong><br>
                                                When you receive a payment for a reservation, we call that payment to you a "payout." Our secure payment system 
                                                supports several payment methods. <br>
                                                To get paid, you need to set up a payment method OShelter releases payouts about 24 hours after a guest’s scheduled 
                                                check-in time. The time it takes for the funds to appear in your account depends on your payment method. <a href="javascript:void(0);" class="text-primary">Learn more</a>
                                            </p>
                                        </div>
                                        <div class="col-sm-4 pl-3 pr-3">
                                            <h5 class="text-primary mb-3">Payments</h5>
                                            <div class="p-4">
                                                <strong>Payment methods</strong><br>
                                                <p>OShelter do not store your payment details on our system. You only enter payment details when making a 
                                                    transaction. It is a way of sure that your payment info is protected and only you knows. All our transactions 
                                                    are heavily encrypted which makes you save and secure. Start planning your next trip.</p>

                                                {{-- <button class="btn btn-primary btn-sm text-light px-4" data-toggle="modal" data-target="#PaymentMethodModal"><i class="fa fa-plus-circle"></i> Payment Method</button> --}}
                                            </div>
                                            
                                            <div class="p-4">
                                                <strong class="">Coupons</strong><br>
                                                <p>Add a coupon and save on your next trip.</p>
                                                <p>Your coupon <span class="ml-5">0</span></p>
                                                <form class="form-horizontal form-material mb-0" id="formCoupon" style="display: none">
                                                    <div class="form-group validate">
                                                        <input type="text" name="coupon_code" id="coupon_code" placeholder="Enter coupon code" class="form-control">
                                                        <span class="text-danger small mySpan" role="alert"></span>                                  
                                                    </div>
                                                    <div class="form-group">
                                                        <button class="btn btn-gradient-primary btn-sm text-light px-4 btnSaveCoupon">Redeem Coupon</button>
                                                        <button type="button" class="btn btn-default btn-sm text-light px-4 ml-4 btnSaveCouponCancel text-dark">Cancel</button>
                                                    </div>
                                                </form>
                                                <button class="btn btn-primary btn-sm text-light px-4 mb-5 btnAddCoupon"><i class="fa fa-plus-circle"></i> Add Coupon</button>
                                            </div>
                                        </div>

                                        <div class="col-sm-5 pb-5 pl-3 pr-3">
                                            <h5 class="text-primary mb-3">Taxes</h5>
                                            <div class="p-4">
                                                <strong class="">VAT / TIN</strong><br>
                                                If you are registered for VAT ID/TIN or your stay is for business, you may not be charged VAT on OShelter service fees. 
                                                To get started, enter your business’ VAT ID Number/TIN. <a href="javascript:void(0)" class="text-primary">Learn more about VAT</a>.
                                                
                                                <button class="btn btn-primary btn-sm text-light px-4 mt-5 float-right mb-5 btnVatModal" data-toggle="modal" data-target="#VatModal"><i class="fa fa-plus-circle"></i> Add TIN / VAT ID</button>
                                                
                                                <div style="display: none" class="mt-4 myTableDiv">
                                                    <table class="table table-responsive">        
                                                        <tr class="text-primary">
                                                            <td class="no-border">VAT ID/TIN</td>
                                                            <td class="no-border">Name on registration</td>
                                                            <td class="no-border">Status</td>
                                                        </tr>
                                                        <tr class="myTableRow"></tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                            
                            </div>
                        </div> <!--end col-->                                          
                    </div><!--end row-->
                </div><!--end activity detail-->

                <div class="tab-pane fade" id="notification_detail">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <p>
                                                <strong class="text-primary">SMS messages and Email messages are sent here.</strong><br>
                                                By checking SMS box or Email box, you agree to receive autodialed promotional texts and email messages from OShelter respectively.
                                            </p>
                                            @php
                                                $myPhone = substr(Auth::user()->phone, -4);
                                            @endphp
                                            <p>{{ '******'.$myPhone }} &nbsp; &nbsp; <small class="{{ Auth::user()->verify_sms? 'text-success':'text-danger' }}">{{ Auth::user()->verify_sms? 'Verified':'Not Verified' }}</small></p>
                                            <p>{{ Auth::user()->email }} &nbsp; &nbsp; <small class="{{ Auth::user()->verify_email? 'text-success':'text-danger' }}">{{ Auth::user()->verify_email? 'Verified':'Not Verified' }}</small></p>
                                        </div>
                                        <div class="col-sm-8 pl-3 pr-3">
                                            <h5 class="text-primary mb-3">Notifications</h5>
                                            <table class="table table-responsive">
                                                <tr>
                                                    <td class="no-border" width="400"></td>
                                                    <td class="no-border" width="100">Email</td>
                                                    <td class="no-border" width="100">SMS</td>
                                                </tr>

                                                <tr>
                                                    <td class="no-border">
                                                        <i class="fa fa-envelope text-primary"></i> <b>Messages</b><br>
                                                        Receive messages from owners and guests as well as booking requests.
                                                    </td>
                                                    <td class="no-border">
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="checkbox1" type="checkbox" class="checkMessage" data-value="email" {{ (Auth::user()->userNotification->message_email)? 'checked':'' }} name="message_email">
                                                            <label for="checkbox1"></label>
                                                        </div>
                                                    </td>
                                                    <td class="no-border">
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="checkbox2" type="checkbox" class="checkMessage" data-value="sms" {{ (Auth::user()->userNotification->message_sms)? 'checked':'' }} name="message_sms">
                                                            <label for="checkbox2"></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="">
                                                        <i class="typcn typcn-support font-20 text-primary"></i> <b>Account Support</b><br>
                                                        Receive messages about your account, your tickets, legal notifications, security and privacy.
                                                    </td>
                                                    <td class="">
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="checkbox3" type="checkbox" class="checkSupport" data-value="email" {{ (Auth::user()->userNotification->support_email)? 'checked':'' }} name="account_email">
                                                            <label for="checkbox3"></label>
                                                        </div>
                                                    </td>
                                                    <td class="">
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="checkbox4" type="checkbox" class="checkSupport" data-value="sms" {{ (Auth::user()->userNotification->support_sms)? 'checked':'' }} name="account_sms">
                                                            <label for="checkbox4"></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="">
                                                        <i class="fa fa-bell text-primary"></i> <b>Reminders</b><br>
                                                        Receive messages booking reminders, review requests and other reminders related to your activities 
                                                        on OShelter.
                                                    </td>
                                                    <td class="">
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="checkbox5" type="checkbox" class="checkReminder" data-value="email" {{ (Auth::user()->userNotification->reminder_email)? 'checked':'' }} name="reminder_email">
                                                            <label for="checkbox5"></label>
                                                        </div>
                                                    </td>
                                                    <td class="">
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="checkbox6" type="checkbox" class="checkReminder" data-value="sms" {{ (Auth::user()->userNotification->reminder_sms)? 'checked':'' }} name="reminder_sms">
                                                            <label for="checkbox6"></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="">
                                                        <i class="fa fa-file text-primary"></i> <b>Policy</b><br>
                                                        Receive updates on property sharing and advocacy efforts. 
                                                    </td>
                                                    <td class="">
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="checkbox7" type="checkbox" class="checkPolicy" data-value="email" {{ (Auth::user()->userNotification->policy_email)? 'checked':'' }} name="policy_email">
                                                            <label for="checkbox7"></label>
                                                        </div>
                                                    </td>
                                                    <td class="">
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="checkbox8" type="checkbox" class="checkPolicy" data-value="sms" {{ (Auth::user()->userNotification->policy_sms)? 'checked':'' }} name="policy_sms">
                                                            <label for="checkbox8"></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="">
                                                        <i class="fa fa-bell-slash text-primary"></i> <b>Unsuscribe from all marketing emails</b><br>
                                                        This includes recomendations, deals, travel inspirations, how OShelter works, listing tips, promotions, 
                                                        booking tips, research and study.
                                                    </td>
                                                    <td colspan="2">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input checkUnsubscribe" {{ (Auth::user()->userNotification->unsubscribe_email)? 'checked':'' }} id="customSwitch1">
                                                            <label class="custom-control-label" for="customSwitch1"></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>                                            
                            </div>
                        </div> <!--end col-->                                          
                    </div><!--end row-->
                </div><!--end activity detail-->

                <div class="tab-pane fade" id="privacy_sharing">
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <p>
                                                <strong class="text-primary">Your Social Sharing.</strong><br>
                                                With OShelter, you are allowed to controll your privacy and sharing. How do you want your sharing to be?
                                            </p>
                                        </div>
                                        <div class="col-sm-8 pl-3 pr-3">
                                            <h5 class="text-primary mb-3">Privacy And Sharing</h5>
                                            <table class="table table-responsive">
                                                <tr>
                                                    <td class="no-border">
                                                        <b>Share on Facebook</b><br>
                                                        Turning this on means your activities on OShelter will be shared on Facebook, which include username, 
                                                        profile photo and property booked and confirmed.
                                                    </td>
                                                    <td class="no-border">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="customSwitch2">
                                                            <label class="custom-control-label" for="customSwitch2"></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="no-border">
                                                        <b>Share saves on Facebook</b><br>
                                                        Turning this on means your saves will be shared of Facebook.
                                                    </td>
                                                    <td class="no-border">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="customSwitch3">
                                                            <label class="custom-control-label" for="customSwitch3"></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
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


<!-- payment modal -->
<div id="VatModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="VatModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="VatModalLabel">Add VAT/TIN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <p class="text-primary">Confirmation takes 48 hours. Email will be sent when its confirmed.</p>
                <form class="form-horizontal form-material mb-0" id="formVat">
                    <div class="form-group validate">
                        <select name="country" id="country" class="form-control">
                            <option value="">Country</option>
                            <option value="ghana">Ghana</option>
                        </select>
                        <span class="text-danger small mySpan" role="alert"></span>                                  
                    </div>
                    <div class="form-group validate">
                        <input type="text" name="vat_id" id="vat_id" placeholder="Enter TIN/VAT ID" class="form-control">
                        <span class="text-danger small mySpan" role="alert"></span>                                  
                    </div>
                    <div class="form-group validate">
                        <input type="text" name="name_on_registration" id="name_on_registration" placeholder="Enter name on registration" class="form-control">
                        <span class="text-danger small mySpan" role="alert"></span>                                  
                    </div>
                    <div class="form-group validate">
                        <input type="text" name="address" id="address" placeholder="Enter res. address/digital add./street add." class="form-control">
                        <span class="text-danger small mySpan" role="alert"></span>                                  
                    </div>
                    <div class="form-group validate">
                        <input type="text" name="city" id="city" placeholder="Enter city" class="form-control">
                        <span class="text-danger small mySpan" role="alert"></span>                                  
                    </div>
                    <div class="form-group validate">
                        <input type="text" name="region_or_province" id="region_or_province" placeholder="Enter region/province" class="form-control">
                        <span class="text-danger small mySpan" role="alert"></span>                                  
                    </div>

                    <div class="form-group validate">
                        <input type="text" name="zip_postal_code" id="zip_postal_code" placeholder="Enter zip/postal code" class="form-control">
                        <span class="text-danger small mySpan" role="alert"></span>                                  
                    </div>
                    <div class="form-group">
                        <button class="btn btn-gradient-primary btn-sm text-light px-4 mt-3 btnStoreVat">Submit</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal --> 


@endsection

@section('scripts')
<!-- XEditable Plugin -->
<script src="{{ asset('assets/plugins/moment/moment.js') }}"></script>
<script src="{{ asset('assets/plugins/x-editable/js/bootstrap-editable.min.js') }}"></script>
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


    $('#inline-name').editable({
        validate: function (value) {
            if ($.trim(value) == '') return 'This field is required';
        },
        mode: 'inline',
        inputclass: 'form-control-sm',
        url: "{{ route('account.name') }}",
        success: function(response, newValue) {
            if(response=='error') {
                return 'Something went wrong. Please try later.';
            }
            else{
                getLegalName(newValue);
            }
        }
    });


    $('#inline-gender').editable({
        prepend: "-Select Gender-",
        mode: 'inline',
        inputclass: 'form-control-sm',
        source: [
            {value: "male", text: 'Male'},
            {value: "female", text: 'Female'}
        ],
        url: "{{ route('account.gender') }}",
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

    $('#inline-emergency').editable({
        validate: function (value) {
            if ($.trim(value) == '') return 'This field is required';
        },
        mode: 'inline',
        inputclass: 'form-control-sm',
        url: "{{ route('account.emergency') }}",
        success: function(response, newValue) {
            if(response=='error') {
                return 'Something went wrong. Please try later.';
            }
            else if(response=='fail'){
                alert("Enter emergency phone number");
            }
        }
    });

});

$(".btnAddNewID").on("click", function(e){
    e.preventDefault();
    e.stopPropagation();
    $("#idModal").modal("show");
    return false;
});


function getLegalName(name) { 
    document.getElementById('myLegalName').innerText = name;
}

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


//coupon
$(".btnAddCoupon").on("click", function(e){
    e.preventDefault();
    e.stopPropagation();
    $(this).hide();
    $("#formCoupon").fadeIn('slow');
    return false;
});

$("#formCoupon").on("submit", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    var valid = true;
    $('#formCoupon input').each(function() {
        var $this = $(this);
        
        if(!$this.val()) {
            valid = false;
            $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
        }
    });
    if(valid){
        alert('saved');
    }
    return false;
});

$(".btnSaveCouponCancel").on("click", function(e){
    e.preventDefault();
    e.stopPropagation();
    $("#formCoupon").hide();
    $('.btnAddCoupon').fadeIn('slow');
    return false;
});

///vat/tin
$("#formVat").on("submit", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    var valid = true;
    $('#formVat input, #formVat select').each(function() {
        var $this = $(this);
        
        if(!$this.val()) {
            valid = false;
            $this.parents('.validate').find('.mySpan').text('The '+$this.attr('name').replace(/[\_]+/g, ' ')+' field is required');
        }
    });
    if(valid){
        var data = $('#formVat').serialize();
        $(".btnStoreVat").html('<i class="fa fa-spin fa-spinner"></i> Submitting..').attr('disabled', true);
        $.ajax({
            url: "{{ route('profile.vat.submit') }}", 
            type: 'POST',
            data: data,
            success: function (resp) {
                if(resp=='success'){
                    swal("Submitted", "Submitted successful. Wait for confirmation.", "success");
                    getVatInfo();
                }else if(resp=='confirm'){
                    swal("Exists", "Already have a confirmed VAT/TIN.", "success");
                }
                else{
                    swal("Opps", resp, "error");
                }

                $("#formVat")[0].reset();
                $(".btnStoreVat").html('Submit').attr('disabled', false);
            },
            error: function(resp){
                alert('Something went wrong.');
                $(".btnStoreVat").html('Submit').attr('disabled', false);
            }
            
        });
    }
    return false;
});

$("#formVat input, #formCoupon input").on('input', function(){
    if($(this).val()!=''){
        $(this).parents('.validate').find('.mySpan').text('');
    }else{ $(this).parents('.validate').find('.mySpan').text('The '+$(this).attr('name').replace(/[\_]+/g, ' ')+' field is required'); }
});

$("#formVat select").on('input', function(){
    if($(this).val()!=''){
        $(this).parents('.validate').find('.mySpan').text('');
    }else{ $(this).parents('.validate').find('.mySpan').text('The '+$(this).attr('name').replace(/[\_]+/g, ' ')+' field is required'); }
});

function getVatInfo(){
    $.ajax({
        url: "{{ route('profile.vat') }}", 
        type: 'GET',
        dataType: 'json',
        success: function (resp) {
            if(resp.msg=='empty'){
                console.log('Empty');
            }else{
                var confirm = (resp.confirm==1)? 'Cofirmed':'Not confirmed';
                $(".myTableRow").append('<td>'+resp.vat_id+'</td><td>'+resp.name+'</td><td>'+confirm+'</td>');
                $(".myTableDiv").show('fast');
                $(".btnVatModal").hide('fast');
            }
        },
        error: function(resp){
            alert('Something went wrong.');
        }
        
    });
}

getVatInfo();


//check notifications
$(".checkMessage").on("change", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    var data = {
        message : $this.data('value')
    }

    $.ajax({
        url: "{{ route('profile.message.notify') }}", 
        type: 'POST',
        data: data,
        success: function (resp) {
            
        },
        error: function(resp){
            console.log('Request error.');
        }
        
    });
    return false;
});

$(".checkSupport").on("change", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    var data = {
        support : $this.data('value')
    }

    $.ajax({
        url: "{{ route('profile.support.notify') }}", 
        type: 'POST',
        data: data,
        success: function (resp) {
            
        },
        error: function(resp){
            console.log('Request error.');
        }
        
    });
    return false;
});

$(".checkReminder").on("change", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    var data = {
        reminder : $this.data('value')
    }

    $.ajax({
        url: "{{ route('profile.reminder.notify') }}", 
        type: 'POST',
        data: data,
        success: function (resp) {
            
        },
        error: function(resp){
            console.log('Request error.');
        }
        
    });
    return false;
});

$(".checkPolicy").on("change", function(e){
    e.preventDefault();
    e.stopPropagation();
    var $this = $(this);
    var data = {
        policy : $this.data('value')
    }

    $.ajax({
        url: "{{ route('profile.policy.notify') }}", 
        type: 'POST',
        data: data,
        success: function (resp) {
            
        },
        error: function(resp){
            console.log('Request error.');
        }
        
    });
    return false;
});

$(".checkUnsubscribe").on("change", function(e){
    e.preventDefault();
    e.stopPropagation();
    $.ajax({
        url: "{{ route('profile.unsubscribe.notify') }}", 
        type: 'POST',
        success: function (resp) {
            
        },
        error: function(resp){
            console.log('Request error.');
        }
        
    });
    return false;
});

</script>
@endsection