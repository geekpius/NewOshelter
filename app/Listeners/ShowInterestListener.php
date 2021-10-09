<?php

namespace App\Listeners;

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
        //
    }
}
