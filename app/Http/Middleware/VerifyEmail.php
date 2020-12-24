<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class VerifyEmail
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
        if(auth()->check()){
            $user = User::findOrFail(Auth::user()->id);

            if (!$user->verify_email) {
                return redirect()->route('verify.email');
            }
        }

        return $next($request);
    }
}
