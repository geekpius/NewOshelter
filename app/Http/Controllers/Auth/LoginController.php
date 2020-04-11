<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/user/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        $data['page_title'] = 'Sign in';
        return view('auth.login', $data);
    }

    protected function credentials(Request $request)
    {
        //return $request->only($this->username(), 'password');
        if(filter_var($request->{$this->username()}, FILTER_VALIDATE_EMAIL)){
            return ['email'=>$request->{$this->username()}, 'password'=>$request->password];
        }else{
            return ['membership'=>$request->{$this->username()}, 'password'=>$request->password];
        }
    }

    public function updateLoginTime($id){
        $find_user = User::findorFail($id);
        $find_user->login_time= Carbon::now();
        $find_user->update();
    }

    protected function authenticated(Request $request, $user)
    {
        /* if($user->active==2){
            $this->updateLoginTime($user->id);
        } */
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }

    /**
     * The user has logged out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    protected function loggedOut(Request $request)
    {
        session()->flash('success','Just Logged Out.');
    }

    public function username()
    {
        return 'username';
    }

    protected function guard()
    {
        return Auth::guard();
    }


    
}
