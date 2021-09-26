<?php

namespace App\Observers;

use App\Models\SaleRequest;

class SaleRequestObserver
{
    /**
     * Handle the sale request "created" event.
     *
     * @param  \App\Models\SaleRequest  $saleRequest
     * @return void
     */
    public function created(SaleRequest $saleRequest)
    {
        $saleRequest->update([
            'external_id' => uniqid(),
        ]);
    }

    /**
     * Handle the sale request "updated" event.
     *
     * @param  \App\Models\SaleRequest  $saleRequest
     * @return void
     */
    public function updated(SaleRequest $saleRequest)
    {
        //
    }

    /**
     * Handle the sale request "deleted" event.
     *
     * @param  \App\Models\SaleRequest  $saleRequest
     * @return void
     */
    public function deleted(SaleRequest $saleRequest)
    {
        //
    }

    /**
     * Handle the sale request "restored" event.
     *
     * @param  \App\Models\SaleRequest  $saleRequest
     * @return void
     */
    public function restored(SaleRequest $saleRequest)
    {
        //
    }

    /**
     * Handle the sale request "force deleted" event.
     *
     * @param  \App\Models\SaleRequest  $saleRequest
     * @return void
     */
    public function forceDeleted(SaleRequest $saleRequest)
    {
        //
    }
}
