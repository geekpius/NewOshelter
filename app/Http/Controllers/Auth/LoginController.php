<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Carbon\Carbon;
use App\UserModel\UserLogin;
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
    protected $redirectTo = '/';

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
        return $request->only($this->username(), 'password');
    }

    public function updateLoginTime($id) : void
    {
        $find_user = User::findorFail($id);
        $find_user->login_time= Carbon::now();
        $find_user->update();
    }

    public function trackUserOnLogin(int $id) : void
    {
        (string) $ip = "";
        if(filter_var($ip, FILTER_VALIDATE_IP)===FALSE)
        {
            if(filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP)){
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
            elseif(filter_var(@$_SERVER['HTTP_X_FORWARDED'], FILTER_VALIDATE_IP)){
                $ip = $_SERVER['HTTP_X_FORWARDED'];
            }
            elseif(filter_var(@$_SERVER['HTTP_FORWARDED_FOR'], FILTER_VALIDATE_IP)){
                $ip = $_SERVER['HTTP_FORWARDED_FOR'];
            }
            elseif(filter_var(@$_SERVER['HTTP_FORWARDED'], FILTER_VALIDATE_IP)){
                $ip = $_SERVER['HTTP_FORWARDED'];
            }
            elseif(filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP)){
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            }
            elseif(filter_var(@$_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP)){
                $ip = $_SERVER['REMOTE_ADDR'];
            }else{
                $ip = 'UNKNOWN';
            }
        }

        $url = "http://www.geoplugin.net/json.gp?ip=".$ip;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $result = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($result);
        $country = $json->geoplugin_countryName;
        $city = $json->geoplugin_city;

        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        (string) $os_platform = 'Unknown OS Platform';
        $os_array = array(
            '/windows nt 10/i' => 'Windows 10',
            '/windows nt 6.3/i' => 'Windows 8.1',
            '/windows nt 6.2/i' => 'Windows 8',
            '/windows nt 6.1/i' => 'Windows 7',
            '/windows nt 6.0/i' => 'Windows Vista',
            '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
            '/windows nt 5.1/i' => 'Windows XP',
            '/windows nt xp/i' => 'Windows XP',
            '/macintosh|mac os x/i' => 'Mac OS X',
            '/mac_powerpc/i' => 'Mac OS 9',
            '/linux/i' => 'Linux',
            '/ubuntu/i' => 'Ubuntu',
            '/iphone/i' => 'iPhone',
            '/ipod/i' => 'iPod',
            '/ipad/i' => 'iPad',
            '/android/i' => 'Android',
            '/blackberry/i' => 'BlackBerry',
            '/webos/i' => 'Mobile',
        );
        foreach($os_array as $regex => $value){
            if(preg_match($regex, $user_agent)){
                $os_platform = $value;
            }
        }

        (string) $browser = "Unknown Browser";
        $browser_array = array(
            '/msie/i' => 'Internet Explorer',
            '/firefox/i' => 'Firefox',
            '/safari/i' => 'Chrome',
            '/edge/i' => 'Edge',
            '/opera/i' => 'Opera',
            '/netscape/i' => 'Netscape',
            '/maxthon/i' => 'Maxthon',
            '/konqueror/i' => 'Konqueror',
            '/mobile/i' => 'Handheld Browser',
        );
        foreach($browser_array as $regex => $value){
            if(preg_match($regex, $user_agent)){
                $browser = $value;
            }
        }

        //update 
        $login = new UserLogin;
        $login->user_id = $id;
        $login->ip = $ip;
        $login->device = $os_platform;
        $login->browser = $browser;
        $login->location = $city. ', '.$country;
        $login->save();
    }

    protected function authenticated(Request $request, $user)
    {
        if($user->is_active){
            $this->updateLoginTime($user->id);
            $this->trackUserOnLogin($user->id);
        } 
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
        return 'email';
    }

    protected function guard()
    {
        return Auth::guard();
    }


    
}
