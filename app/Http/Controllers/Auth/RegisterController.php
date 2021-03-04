<?php

namespace App\Http\Controllers\Auth;

use DB;
use App\User;
use Carbon\Carbon;
// use App\UserModel\UserWallet;
use App\UserModel\UserNotification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Mail\EmailSender;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function showRegistrationForm()
    {
        $data['page_title'] = 'Sign up';
        return view('auth.register', $data);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:255|unique:users',
            'account_type' => 'required|string',
            'password' => 'required|string|min:6',
        ]);
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

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        try{
            DB::beginTransaction();
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'account_type' => $data['account_type'],
                'login_time' => Carbon::now(),
                'email_verification_token' => $this->generateEmailVerificationCode(),
                'email_verification_expired_at' => Carbon::now()->addHour(),
                'password' => Hash::make($data['password']),
            ]);
            
            UserNotification::create([
                'user_id' => $user->id,
            ]);
            $data = array(
                "name" => current(explode(' ',$user->name)),
                "code" => $user->email_verification_token,
                "expire" => $user->email_verification_expired_at,
                "link" => "",
            );
            Mail::to($user->email)->send(new EmailSender($data, "Verify Email", "emails.verify_email"));
            DB::commit();

            return $user;

        }catch(\Exception $e){
            DB::rollback();
            session()->flash('error','Please login later.');
            return redirect()->back();
        }
    }


}
