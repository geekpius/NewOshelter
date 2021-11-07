<?php

namespace App\Listeners;

use App\Events\SendSMSEvent;
use App\Jobs\SendSMSJob;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendSMSListener
{

    /**
     * Handle the event.
     *
     * @param  SendSMSEvent  $event
     * @return void
     */
    public function handle(SendSMSEvent $event)
    {
        SendSMSJob::dispatch($event->phoneNumber, $event->message)->delay(now()->addSecond());
    }
}
