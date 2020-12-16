@extends('admin.layouts.app')

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
                                        <img src="{{ (empty(Auth::user()->image))? asset('assets/images/user.svg'):asset('assets/images/users/'.Auth::user()->image) }}" alt="{{ Auth::user()->name }}" width="130" height="130" class="rounded-circle img_preview" />
                                        <span class="fro-profile_main-pic-change" onclick="getFile();">
                                            <i class="fas fa-camera">
                                                <div style='height: 0px;width:0px; overflow:hidden;'><input id="upfile" type="file" name="photo" data-href="{{ route('profile.photo') }}" /></div></i>
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
                            <a class="nav-link" id="payment_detail_tab" data-toggle="pill" href="#payment_detail">Payments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="notification_detail_tab" data-toggle="pill" href="#notification_detail">Notifications</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" id="privacy_sharing_tab" data-toggle="pill" href="#privacy_sharing">Privacy & Sharing</a>
                        </li> --}}
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
                                            <form class="form-horizontal form-material mb-0" id="formChangePassword" data-action="{{ route('password.change') }}">
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
                                            {{-- <h5 class="text-primary mb-3">Social Account</h5>
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
                                            </div> --}}
                                        </div>

                                        <div class="col-sm-4">
                                            <h5 class="text-primary">Device History</h5>
                                            @php $userLogs = Auth::user()->userLogins()->orderBy('id', 'DESC')->paginate(5); @endphp
                                            @foreach ($userLogs as $log)
                                                <div>
                                                    <div class="float-left mr-3">
                                                        <i class="fa fa-desktop fa-2x"></i>
                                                    </div>
                                                    <div class="">
                                                        <p>{{ $log->device }} - {{ $log->browser }} <br>
                                                            {{ (trim($log->location)==',')?'Unknown Location':$log->location }} - {{ \Carbon\Carbon::parse($log->created_at)->diffForHumans() }}
                                                        </p>
                                                    </div>
                                                    <hr>
                                                </div>
                                            @endforeach
                                            {{ $userLogs->links() }}
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
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-4">
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
                                        <div class="col-sm-1"></div>
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

                                        {{-- <!-- <div class="col-sm-5 pb-5 pl-3 pr-3">
                                            <h5 class="text-primary mb-3">Taxes</h5>
                                            <div class="p-4">
                                                <strong class="">VAT / TIN</strong><br>
                                                If you are registered for VAT ID/TIN or your stay is for business, you may not be charged VAT on OShelter service fees. 
                                                To get started, enter your business’ VAT ID Number/TIN. <a href="javascript:void(0)" class="text-primary">Learn more about VAT</a>.
                                                
                                                <button class="btn btn-primary btn-sm text-light px-4 mt-5 float-right mb-5 btnVatModal" data-toggle="modal" data-target="#VatModal"><i class="fa fa-plus-circle"></i> Add TIN / VAT ID</button>
                                                
                                                <div style="display: none" class="mt-4 myTableDiv" data-href="{{ route('profile.vat') }}">
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
                                        </div> --> --}}
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
                                            @php $myPhone = substr(Auth::user()->phone, -4); @endphp
                                            <p>{{ '******'.$myPhone }} &nbsp; &nbsp; <small class="{{ Auth::user()->verify_sms? 'text-success':'text-danger' }}">{{ Auth::user()->verify_sms? 'Verified':'Not Verified' }}</small></p>
                                            <p>{{ Auth::user()->email }} &nbsp; &nbsp; <small class="{{ Auth::user()->verify_email? 'text-success':'text-danger' }}">{{ Auth::user()->verify_email? 'Verified':'Not Verified' }}</small></p>
                                        </div>
                                        <div class="col-sm-8 pl-3 pr-3">
                                            <h5 class="text-primary mb-3">Notifications</h5>
                                            <table class="table table-responsive">
                                                <tr>
                                                    <td class="no-border" width="400"></td>
                                                    <td class="no-border" width="100">Email</td>
                                                    {{-- <td class="no-border" width="100">SMS</td> --}}
                                                </tr>

                                                <tr>
                                                    <td class="no-border">
                                                        <i class="fa fa-envelope text-primary"></i> <b>Messages</b><br>
                                                        Receive messages from owners and guests as well as booking requests.
                                                    </td>
                                                    <td class="no-border">
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="checkbox1" type="checkbox" class="checkMessage" data-value="email" {{ (Auth::user()->userNotification->message_email)? 'checked':'' }} name="message_email" data-href="{{ route('profile.message.notify') }}" />
                                                            <label for="checkbox1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td class="no-border">
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="checkbox2" type="checkbox" class="checkMessage" data-value="sms" {{ (Auth::user()->userNotification->message_sms)? 'checked':'' }} name="message_sms" data-href="{{ route('profile.message.notify') }}" />
                                                            <label for="checkbox2"></label>
                                                        </div>
                                                    </td> --}}
                                                </tr>
                                                <tr>
                                                    <td class="">
                                                        <i class="typcn typcn-support font-20 text-primary"></i> <b>Account Support</b><br>
                                                        Receive messages about your account, your tickets, legal notifications, security and privacy.
                                                    </td>
                                                    <td class="">
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="checkbox3" type="checkbox" class="checkSupport" data-value="email" {{ (Auth::user()->userNotification->support_email)? 'checked':'' }} name="account_email" data-href="{{ route('profile.support.notify') }}" />
                                                            <label for="checkbox3"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td class="">
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="checkbox4" type="checkbox" class="checkSupport" data-value="sms" {{ (Auth::user()->userNotification->support_sms)? 'checked':'' }} name="account_sms" data-href="{{ route('profile.support.notify') }}" />
                                                            <label for="checkbox4"></label>
                                                        </div>
                                                    </td> --}}
                                                </tr>
                                                <tr>
                                                    <td class="">
                                                        <i class="fa fa-bell text-primary"></i> <b>Reminders</b><br>
                                                        Receive messages booking reminders, review requests and other reminders related to your activities 
                                                        on OShelter.
                                                    </td>
                                                    <td class="">
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="checkbox5" type="checkbox" class="checkReminder" data-value="email" {{ (Auth::user()->userNotification->reminder_email)? 'checked':'' }} name="reminder_email" data-href="{{ route('profile.reminder.notify') }}" />
                                                            <label for="checkbox5"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td class="">
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="checkbox6" type="checkbox" class="checkReminder" data-value="sms" {{ (Auth::user()->userNotification->reminder_sms)? 'checked':'' }} name="reminder_sms" data-href="{{ route('profile.reminder.notify') }}" />
                                                            <label for="checkbox6"></label>
                                                        </div>
                                                    </td> --}}
                                                </tr>
                                                <tr>
                                                    <td class="">
                                                        <i class="fa fa-file text-primary"></i> <b>Policy</b><br>
                                                        Receive updates on property sharing and advocacy efforts. 
                                                    </td>
                                                    <td class="">
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="checkbox7" type="checkbox" class="checkPolicy" data-value="email" {{ (Auth::user()->userNotification->policy_email)? 'checked':'' }} name="policy_email" data-href="{{ route('profile.policy.notify') }}" />
                                                            <label for="checkbox7"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td class="">
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="checkbox8" type="checkbox" class="checkPolicy" data-value="sms" {{ (Auth::user()->userNotification->policy_sms)? 'checked':'' }} name="policy_sms" data-href="{{ route('profile.policy.notify') }}" />
                                                            <label for="checkbox8"></label>
                                                        </div>
                                                    </td> --}}
                                                </tr>
                                                <tr>
                                                    <td class="">
                                                        <i class="fa fa-bell-slash text-primary"></i> <b>Unsuscribe from all marketing emails</b><br>
                                                        This includes recomendations, deals, travel inspirations, how OShelter works, listing tips, promotions, 
                                                        booking tips, research and study.
                                                    </td>
                                                    <td colspan="2">
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input checkUnsubscribe" {{ (Auth::user()->userNotification->unsubscribe_email)? 'checked':'' }} id="customSwitch1" data-href="{{ route('profile.unsubscribe.notify') }}" />
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

                {{-- <div class="tab-pane fade" id="privacy_sharing">
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
                </div><!--end activity detail--> --}}


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
                            <div style='height: 0px;width:0px; overflow:hidden;'><input id="front_file" type="file" name="front_file" data-href="{{ route('profile.front.card') }}" /></div>
                        </a>
                    </div>
                </div>
                <div class="mt-4 text-center" onclick="getBackFile();" style="cursor:pointer">
                    <div>
                        <img src="{{ asset('assets/images/iconmonstr-credit-card-15.svg') }}" alt="Front" width="100" height="100">    
                    </div>
                    <div>
                        <a href="javascript:void(0);"> <span id="msgStatus2">Click to upload ID back</span>
                            <div style='height: 0px;width:0px; overflow:hidden;'><input id="back_file" type="file" name="back_file" data-href="{{ route('profile.back.card') }}" /></div>
                        </a>
                    </div>
                </div>             
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->  


{{-- <!-- payment modal -->
<div id="VatModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="VatModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="VatModalLabel">Add VAT/TIN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <p class="text-primary">Confirmation takes 48 hours. Email will be sent when its confirmed.</p>
                <form class="form-horizontal form-material mb-0" id="formVat" data-action="{{ route('profile.vat.submit') }}">
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
</div><!-- /.modal -->  --}}


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

</script>
<script src="{{ asset('assets/pages/account.js') }}"></script>
@endsection