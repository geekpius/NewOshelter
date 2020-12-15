<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Mail\EmailSender;
use Illuminate\Support\Facades\Mail;

class VerifyController extends Controller
{
    public function __construct()
    {
        $this->middleware('verify-user');
        $this->middleware('auth');
    }


    public function verfiyEmail()
    {
        if (!Auth::user()->verify_email){
            $data['page_title'] = 'Email verification';
            return view('auth.verify_email',$data);
        }else{
            return redirect()->route('dashboard');
        }

    }

    public function verify(Request $request)
    {
        $this->validate($request, [
            'verification_code' => 'required|string',
        ]);

        $user = User::findorFail(Auth::user()->id);
        if($user->email_verification_token == $request->verification_code){
            $user->verify_email = true;
            $user->update();
            return redirect()->route('dashboard');
        }else{
            if ($user->verify_email_time < Carbon::now()){
                session()->flash('error', 'Verification code is expired');
            }else{
                session()->flash('error', 'Verification code is invalid');
            }
            return redirect()->back();
        }

    }

    public function resendCode(Request $request, User $user)
    {
        $user->email_verification_token = $this->generateEmailVerificationCode();
        $user->verify_email_time = Carbon::now()->addHour();
        $user->update();
        $data = array(
            "name" => current(explode(' ',$user->name)),
            "code" => $user->email_verification_token,
            "expire" => $user->verify_email_time,
        );
        Mail::to($user->email)->send(new EmailSender($data), "Verify Email", "emails.verify_email");
        session()->flash('success', 'Verification code is sent to you email');
        return redirect()->back();
    }

    public function generateEmailVerificationCode(int $length=8) : string
    {
        (string) $characters = '0123456789';
        (int) $charactersLength = strlen($characters);
        (string) $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

     
     




}
