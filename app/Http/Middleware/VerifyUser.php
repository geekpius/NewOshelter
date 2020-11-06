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

        if (!$user->is_active) {
            Auth::guard()->logout();
            $request->session()->invalidate();
            session()->flash('error','Your Account Is Deactivated.');
            return redirect()->route('login');
        }



        return $next($request);
    }
}
