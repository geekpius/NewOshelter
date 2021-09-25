<?php

namespace App\Providers;


use App\Models\RentRequest;
use App\Models\UserRequest;
use App\Observers\RentRequestObserver;
use App\Observers\UserRequestObserver;
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
        RentRequest::observe(RentRequestObserver::class);
        UserRequest::observe(UserRequestObserver::class);
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
