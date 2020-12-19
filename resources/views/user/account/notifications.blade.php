@extends('layouts.site')

@section('content')

<div class="pxp-content pull-content-down">
    <div class="container">
        <h2>Payments</h2>  
        <p>
            <strong>{{ Auth::user()->name }},</strong> account owner 
        </p>
        <div id="" class="pt-4">
            @include('includes.gobackroute')
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-bordered-blue">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4 mb-4">
                                    <p>
                                        <strong class="text-primary">SMS messages and Email messages are sent here.</strong><br>
                                        By checking SMS box or Email box, you agree to receive autodialed promotional texts and email messages from OShelter respectively.
                                    </p>
                                    @php $myPhone = substr(Auth::user()->phone, -4); @endphp
                                    <p>{{ '******'.$myPhone }} &nbsp; &nbsp; <small class="{{ Auth::user()->verify_sms? 'text-success':'text-danger' }}">{{ Auth::user()->verify_sms? 'Verified':'Not Verified' }}</small></p>
                                    <p>{{ Auth::user()->email }} &nbsp; &nbsp; <small class="{{ Auth::user()->verify_email? 'text-success':'text-danger' }}">{{ Auth::user()->verify_email? 'Verified':'Not Verified' }}</small></p>
                                </div>
                                <div class="col-sm-8">
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
                </div>
            </div>
        </div>
    </div>    
</div>

@endsection

@section('scripts')
<script src="{{ asset('assets/pages/account/all-groups.js') }}"></script>
@endsection