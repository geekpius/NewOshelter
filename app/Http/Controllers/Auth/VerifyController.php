<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class VerifyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /* public function getEmailVerification()
    {
        if (Auth::user()->email_verify != 1){
            $data['general'] = GeneralSetting::first();
            $data['page_title'] = "Email Verification";
            $data['basic'] = BasicSetting::first();
            $data['menu'] = Menu::all();
            return view('home.email-verify',$data);
        }else{
            return redirect('user/dashboard');
        }

    }
    public function emailVerifySubmit(Request $request)
    {
        $this->validate($request,[
           'code' => 'required',
        ]);

        $user = User::findOrFail(Auth::user()->id);

        if ($user->ev_code == $request->code)
        {
            $useOwner = User::whereOwner_id($user->owner_id)->get();
            foreach ($useOwner as $uw)
            {
                $uw->email_verify = 1;
                $uw->save();
            }

            $basic = BasicSetting::first();
            if ($basic->phone_status == 0)
            {
                return redirect('user/dashboard');
            }else{
                $code = strtoupper(Str::random(10));
                $user->pv_code = $code;
                $user->pv_time = Carbon::parse()->addMinutes(5);
                /*$this->sendSms($to,$txt);*
                return redirect()->route('phone-verify');

            }
        }else{
            session()->flash('message','Verification Code in Invalid');
            return redirect()->route('email-verify');
        }

    }

    public function resendEmail(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        if ($user->ev_time > Carbon::now())
        {
            $tt = Carbon::parse($user->ev_time)->diffInSeconds();
            session()->flash('message',"Please Try Again. After $tt - second.");
            return redirect()->route('email-verify');
        }else{

            $email_code = strtoupper(Str::random(12));
            $text = "Your Verification Code Is: <b>".$email_code."</b>";
            $this->sendMail($user->email,$user->name,'Email verification',$text);
            //$this->sendInvoice($user->email);
            $useOwner = User::whereOwner_id($user->owner_id)->get();
            foreach ($useOwner as $uw)
            {
                $uw->ev_code = $email_code;
                $uw->ev_time = Carbon::parse()->addMinutes(5);
                $uw->save();
            }


            session()->flash('message',"New Email Verification Code Send Your Email Address.");
            return redirect()->route('email-verify');
        }

    }
     */




}
