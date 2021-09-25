<?php

namespace App\Observers;

use App\Models\UserRequest;

class UserRequestObserver
{
    /**
     * Handle the user request "created" event.
     *
     * @param  \App\Models\UserRequest  $userRequest
     * @return void
     */
    public function created(UserRequest $userRequest)
    {
        $userRequest->update([
            'external_id' => uniqid(),
        ]);
    }

    /**
     * Handle the user request "updated" event.
     *
     * @param  \App\Models\UserRequest  $userRequest
     * @return void
     */
    public function updated(UserRequest $userRequest)
    {
        //
    }

    /**
     * Handle the user request "deleted" event.
     *
     * @param  \App\Models\UserRequest  $userRequest
     * @return void
     */
    public function deleted(UserRequest $userRequest)
    {
        //
    }

    /**
     * Handle the user request "restored" event.
     *
     * @param  \App\Models\UserRequest  $userRequest
     * @return void
     */
    public function restored(UserRequest $userRequest)
    {
        //
    }

    /**
     * Handle the user request "force deleted" event.
     *
     * @param  \App\Models\UserRequest  $userRequest
     * @return void
     */
    public function forceDeleted(UserRequest $userRequest)
    {
        //
    }
}
