<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
//        'App\Events\Event' => [
//            'App\Listeners\EventListener',
//        ],

        'App\Events\UserRegisteredEvent' => [
            'App\Listeners\RegisteredUserEmailListener'
        ],

        'App\Events\LoginEvent' => [
            'App\Listeners\LoginListener'
        ],

        'App\Events\SendSMSEvent' => [
            'App\Listeners\SendSMSListener'
        ],

        'App\Events\ShowInterestEvent' => [
            'App\Listeners\ShowInterestListener'
        ],

        'App\Events\ContactUsEvent' => [
            'App\Listeners\ContactUsListener'
        ],


    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
