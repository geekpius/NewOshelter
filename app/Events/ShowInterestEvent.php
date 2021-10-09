<?php

namespace App\Events;

use App\Models\ShowInterest;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ShowInterestEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $showInterest;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(ShowInterest $showInterest)
    {
        $this->showInterest = $showInterest;
    }

}
