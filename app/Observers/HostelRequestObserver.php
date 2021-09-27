<?php

namespace App\Observers;

use App\Models\HostelRequest;

class HostelRequestObserver
{
    /**
     * Handle the hostel request "created" event.
     *
     * @param  \App\Models\HostelRequest  $hostelRequest
     * @return void
     */
    public function created(HostelRequest $hostelRequest)
    {
        $hostelRequest->update([
            'external_id' => uniqid(),
        ]);
    }

    /**
     * Handle the hostel request "updated" event.
     *
     * @param  \App\Models\HostelRequest  $hostelRequest
     * @return void
     */
    public function updated(HostelRequest $hostelRequest)
    {
        //
    }

    /**
     * Handle the hostel request "deleted" event.
     *
     * @param  \App\Models\HostelRequest  $hostelRequest
     * @return void
     */
    public function deleted(HostelRequest $hostelRequest)
    {
        //
    }

    /**
     * Handle the hostel request "restored" event.
     *
     * @param  \App\Models\HostelRequest  $hostelRequest
     * @return void
     */
    public function restored(HostelRequest $hostelRequest)
    {
        //
    }

    /**
     * Handle the hostel request "force deleted" event.
     *
     * @param  \App\Models\HostelRequest  $hostelRequest
     * @return void
     */
    public function forceDeleted(HostelRequest $hostelRequest)
    {
        //
    }
}
