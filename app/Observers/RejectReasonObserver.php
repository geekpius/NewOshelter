<?php

namespace App\Observers;

use App\RejectReason;

class RejectReasonObserver
{
    /**
     * Handle the reject reason "created" event.
     *
     * @param  \App\RejectReason  $rejectReason
     * @return void
     */
    public function created(RejectReason $rejectReason)
    {
        $rejectReason->update([
            'external_id' => uniqid(),
        ]);
    }

    /**
     * Handle the reject reason "updated" event.
     *
     * @param  \App\RejectReason  $rejectReason
     * @return void
     */
    public function updated(RejectReason $rejectReason)
    {
        //
    }

    /**
     * Handle the reject reason "deleted" event.
     *
     * @param  \App\RejectReason  $rejectReason
     * @return void
     */
    public function deleted(RejectReason $rejectReason)
    {
        //
    }

    /**
     * Handle the reject reason "restored" event.
     *
     * @param  \App\RejectReason  $rejectReason
     * @return void
     */
    public function restored(RejectReason $rejectReason)
    {
        //
    }

    /**
     * Handle the reject reason "force deleted" event.
     *
     * @param  \App\RejectReason  $rejectReason
     * @return void
     */
    public function forceDeleted(RejectReason $rejectReason)
    {
        //
    }
}
