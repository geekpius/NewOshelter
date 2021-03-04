<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\EmailVerify;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Mail\EmailSender;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

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
            return redirect()->route('index');
        }

    }

    public function verify(Request $request)
    {
        $this->validate($request, [
            'verification_code' => 'required|string',
        ]);

        $user = User::findorFail(Auth::user()->id);
        if ($user->email_verification_expired_at < Carbon::now()){
            session()->flash('error', 'Verification code is expired. Resend code.');
        }else{
            if($user->email_verification_token == $request->verification_code){
                $user->verify_email = true;
                $user->verify_email_time = Carbon::now();
                $user->update();
                return redirect()->route('index');
            }else{
                session()->flash('error', 'Verification code is invalid');
            }
        }

        return redirect()->back();
    }


    private function generateEmailVerificationCode(int $length=8) : string
    {
        (string) $characters = '0123456789';
        (int) $charactersLength = strlen($characters);
        (string) $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    
    private function generateToken()
    {
        // This is set in the .env file
        $key = config('app.key');

        // Illuminate\Support\Str;
        if (Str::startsWith($key, 'base64:')) {
            $key = base64_decode(substr($key, 7));
        }
        return hash_hmac('sha256', Str::random(40), $key);
    }

    public function resendCode(Request $request, User $user)
    {
        (string) $token = $this->generateToken();
        $results = DB::select('select * from email_verifies where email = :email', ['email' => $user->email]);
        if(empty($results)){
            $insert = DB::insert('insert into email_verifies (email, token, created_at) values (?, ?, ?)', [$user->email, $token, Carbon::now()]);
        }else{
            $update = DB::update('update email_verifies set token = ?, created_at = ? where email = ?', [$token, Carbon::now(), $user->email]);
        }
        
        $user->email_verification_token = $this->generateEmailVerificationCode();
        $user->email_verification_expired_at = Carbon::now()->addHour();
        $user->update();
        $data = array(
            "name" => current(explode(' ',$user->name)),
            "code" => $user->email_verification_token,
            "expire" => $user->email_verification_expired_at,
            "link" => route('verify.email.activate', ['token'=>$token]),
        );
        Mail::to($user->email)->send(new EmailSender($data, "Verify Email", "emails.verify_email"));
        session()->flash('success', 'Verification code is sent to your mail');
        return redirect()->back();
    }

     
    public function activateEmail(string $token)
    {
        $results = DB::select('select * from email_verifies where token = :token', ['token' => $token]);
        if(empty($results)){
            return view("errors.404");
        }else{
            $user = User::findorFail(Auth::user()->id);
            if ($user->email_verification_expired_at < Carbon::now()){
                session()->flash('error', 'Verification code is expired. Resend code.');
                return redirect()->route('verify.email');
            }else{
                $user->verify_email = true;
                $user->update();
                $deleted = DB::delete('delete from email_verifies where token = :token', ['token'=>$token]);
                return redirect()->route('index');
            }
        }
        
    }




}
