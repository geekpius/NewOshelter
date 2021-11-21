<?php

namespace App\Observers;

use App\Models\LandRequest;

class LandRequestObserver
{
    /**
     * Handle the land request "created" event.
     *
     * @param  \App\Models\LandRequest  $landRequest
     * @return void
     */
    public function created(LandRequest $landRequest)
    {
        $landRequest->update([
            'external_id' => uniqid(),
        ]);
    }

    /**
     * Handle the land request "updated" event.
     *
     * @param  \App\Models\LandRequest  $landRequest
     * @return void
     */
    public function updated(LandRequest $landRequest)
    {
        //
    }

    /**
     * Handle the land request "deleted" event.
     *
     * @param  \App\Models\LandRequest  $landRequest
     * @return void
     */
    public function deleted(LandRequest $landRequest)
    {
        //
    }

    /**
     * Handle the land request "restored" event.
     *
     * @param  \App\Models\LandRequest  $landRequest
     * @return void
     */
    public function restored(LandRequest $landRequest)
    {
        //
    }

    /**
     * Handle the land request "force deleted" event.
     *
     * @param  \App\Models\LandRequest  $landRequest
     * @return void
     */
    public function forceDeleted(LandRequest $landRequest)
    {
        //
    }
}
