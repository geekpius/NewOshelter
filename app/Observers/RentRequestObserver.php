<?php

namespace App\Observers;

use App\Models\RentRequest;

class RentRequestObserver
{
    /**
     * Handle the rent request "created" event.
     *
     * @param  \App\Models\RentRequest  $rentRequest
     * @return void
     */
    public function created(RentRequest $rentRequest)
    {
        $rentRequest->update([
            'external_id' => uniqid(),
        ]);
    }

    /**
     * Handle the rent request "updated" event.
     *
     * @param  \App\Models\RentRequest  $rentRequest
     * @return void
     */
    public function updated(RentRequest $rentRequest)
    {
        //
    }

    /**
     * Handle the rent request "deleted" event.
     *
     * @param  \App\Models\RentRequest  $rentRequest
     * @return void
     */
    public function deleted(RentRequest $rentRequest)
    {
        //
    }

    /**
     * Handle the rent request "restored" event.
     *
     * @param  \App\Models\RentRequest  $rentRequest
     * @return void
     */
    public function restored(RentRequest $rentRequest)
    {
        //
    }

    /**
     * Handle the rent request "force deleted" event.
     *
     * @param  \App\Models\RentRequest  $rentRequest
     * @return void
     */
    public function forceDeleted(RentRequest $rentRequest)
    {
        //
    }
}
