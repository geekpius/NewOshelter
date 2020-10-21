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
    protected $redirectTo = 'user/dashboard';

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
            'digital_address' => 'required|string',
            'password' => 'required|string|min:6',
        ]);
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
            $membership = date('ymdHis');
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'digital_address' => $data['digital_address'],
                'membership' => $membership,
                'login_time' => Carbon::now(),
                'password' => Hash::make($data['password']),
            ]);
            
            // UserWallet::create([
            //     'user_id' => $user->id,
            //     'balance' => 0,
            // ]);
            UserNotification::create([
                'user_id' => $user->id,
            ]);
            DB::commit();

            return $user;

        }catch(\Exception $e){
            DB::rollback();
            session()->flash('error','Please login later.');
            return redirect()->back();
        }
    }


}
