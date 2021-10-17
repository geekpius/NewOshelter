<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;
use App\PaymentModel\Transaction;
use App\Subscription;

class Subscribe
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
            $lastSubscription = Auth::user()->transactions->where('transactable_type', 'App\Subscription')->where('status', Transaction::SUCCESS)->sortByDesc('id')->first();
            if($lastSubscription)
            {
                if($lastSubscription->transactable->hasExpired()){
                    return redirect()->route('payment.index');
                }
            }
        }

        return $next($request);
    }
}
