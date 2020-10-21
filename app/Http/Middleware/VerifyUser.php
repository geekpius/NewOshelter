<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class VerifyUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $user = User::findOrFail(Auth::user()->id);

        if ($user->active==1) {
            Auth::guard()->logout();
            $request->session()->invalidate();
            session()->flash('error','Your Account Is Blocked.');
            return redirect()->route('login');
        }
        else if ($user->active==0) {
            Auth::guard()->logout();
            $request->session()->invalidate();
            return redirect()->route('account.deactivated');
        }



        return $next($request);
    }
}
