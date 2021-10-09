<?php

namespace App\Listeners;

use App\Events\ContactUsEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactUsListener
{
    /**
     * Handle the event.
     *
     * @param  ContactUsEvent  $event
     * @return void
     */
    public function handle(ContactUsEvent $event)
    {
        //dispatch email
    }
}
