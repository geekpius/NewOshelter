<?php

namespace App\Providers;


use App\Models\AuctionRequest;
use App\Models\HostelRequest;
use App\Models\RentRequest;
use App\Models\SaleRequest;
use App\Models\ShortStayRequest;
use App\Models\ShowInterest;
use App\Models\UserRequest;
use App\Observers\AuctionRequestObserver;
use App\Observers\HostelRequestObserver;
use App\Observers\RentRequestObserver;
use App\Observers\SaleRequestObserver;
use App\Observers\ShortStayRequestObserver;
use App\Observers\ShowInterestObserver;
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
        ShortStayRequest::observe(ShortStayRequestObserver::class);
        SaleRequest::observe(SaleRequestObserver::class);
        AuctionRequest::observe(AuctionRequestObserver::class);
        HostelRequest::observe(HostelRequestObserver::class);
        ShowInterest::observe(ShowInterestObserver::class);
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
