<?php

namespace App\Providers;

use App\Observers\RejectReasonObserver;
use App\RejectReason;
use Illuminate\Support\ServiceProvider;
use App\User;
use App\Observers\UserObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        RejectReason::observe(RejectReasonObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
