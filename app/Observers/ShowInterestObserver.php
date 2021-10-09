<?php

namespace App\Observers;

use App\Models\ShowInterest;

class ShowInterestObserver
{
    /**
     * Handle the show interest "created" event.
     *
     * @param  \App\Models\ShowInterest  $showInterest
     * @return void
     */
    public function created(ShowInterest $showInterest)
    {
        $showInterest->update([
            'external_id' => uniqid(),
        ]);
    }

    /**
     * Handle the show interest "updated" event.
     *
     * @param  \App\Models\ShowInterest  $showInterest
     * @return void
     */
    public function updated(ShowInterest $showInterest)
    {
        //
    }

    /**
     * Handle the show interest "deleted" event.
     *
     * @param  \App\Models\ShowInterest  $showInterest
     * @return void
     */
    public function deleted(ShowInterest $showInterest)
    {
        //
    }

    /**
     * Handle the show interest "restored" event.
     *
     * @param  \App\Models\ShowInterest  $showInterest
     * @return void
     */
    public function restored(ShowInterest $showInterest)
    {
        //
    }

    /**
     * Handle the show interest "force deleted" event.
     *
     * @param  \App\Models\ShowInterest  $showInterest
     * @return void
     */
    public function forceDeleted(ShowInterest $showInterest)
    {
        //
    }
}
