<?php

namespace App\Listeners;

use App\Events\SendSMSEvent;
use App\Events\ShowInterestEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShowInterestListener
{

    /**
     * Handle the event.
     *
     * @param  ShowInterestEvent  $event
     * @return void
     */
    public function handle(ShowInterestEvent $event)
    {
        $name = current(explode(' ',$event->showInterest->name));
        $property = $event->showInterest->property->title;
        $smsMessage = "Hi $name, you showed interest in $property property. Oshelter will contact for more info.";
        event(new SendSMSEvent($event->showInterest->phone, $smsMessage));
    }
}
