<?php

namespace App\Observers;

use App\Models\AuctionRequest;

class AuctionRequestObserver
{
    /**
     * Handle the auction request "created" event.
     *
     * @param  \App\Models\AuctionRequest  $auctionRequest
     * @return void
     */
    public function created(AuctionRequest $auctionRequest)
    {
        $auctionRequest->update([
            'external_id' => uniqid(),
        ]);
    }

    /**
     * Handle the auction request "updated" event.
     *
     * @param  \App\Models\AuctionRequest  $auctionRequest
     * @return void
     */
    public function updated(AuctionRequest $auctionRequest)
    {
        //
    }

    /**
     * Handle the auction request "deleted" event.
     *
     * @param  \App\Models\AuctionRequest  $auctionRequest
     * @return void
     */
    public function deleted(AuctionRequest $auctionRequest)
    {
        //
    }

    /**
     * Handle the auction request "restored" event.
     *
     * @param  \App\Models\AuctionRequest  $auctionRequest
     * @return void
     */
    public function restored(AuctionRequest $auctionRequest)
    {
        //
    }

    /**
     * Handle the auction request "force deleted" event.
     *
     * @param  \App\Models\AuctionRequest  $auctionRequest
     * @return void
     */
    public function forceDeleted(AuctionRequest $auctionRequest)
    {
        //
    }
}
