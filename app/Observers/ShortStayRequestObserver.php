<?php

namespace App\Observers;

use App\Models\ShortStayRequest;

class ShortStayRequestObserver
{
    /**
     * Handle the short stay request "created" event.
     *
     * @param  \App\Models\ShortStayRequest  $shortStayRequest
     * @return void
     */
    public function created(ShortStayRequest $shortStayRequest)
    {
        $shortStayRequest->update([
            'external_id' => uniqid(),
        ]);
    }

    /**
     * Handle the short stay request "updated" event.
     *
     * @param  \App\Models\ShortStayRequest  $shortStayRequest
     * @return void
     */
    public function updated(ShortStayRequest $shortStayRequest)
    {
        //
    }

    /**
     * Handle the short stay request "deleted" event.
     *
     * @param  \App\Models\ShortStayRequest  $shortStayRequest
     * @return void
     */
    public function deleted(ShortStayRequest $shortStayRequest)
    {
        //
    }

    /**
     * Handle the short stay request "restored" event.
     *
     * @param  \App\Models\ShortStayRequest  $shortStayRequest
     * @return void
     */
    public function restored(ShortStayRequest $shortStayRequest)
    {
        //
    }

    /**
     * Handle the short stay request "force deleted" event.
     *
     * @param  \App\Models\ShortStayRequest  $shortStayRequest
     * @return void
     */
    public function forceDeleted(ShortStayRequest $shortStayRequest)
    {
        //
    }
}
