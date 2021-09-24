<?php

namespace App\Observers;

use App\Events\UserRegisteredEvent;
use App\User;

use DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */


    private function generateToken()
    {
        // This is set in the .env file
        $key = config('app.key');

        if (Str::startsWith($key, 'base64:')) {
            $key = base64_decode(substr($key, 7));
        }
        return hash_hmac('sha256', Str::random(40), $key);
    }

    public function created(User $user)
    {
        $user->profile()->create();
        $user->userNotification()->create();

        (string) $token = $this->generateToken();
        $results = DB::select('select * from email_verifies where email = :email', ['email' => $user->email]);
        if(empty($results)){
            DB::insert('insert into email_verifies (email, token, created_at) values (?, ?, ?)', [$user->email, $token, Carbon::now()]);
        }else{
            DB::update('update email_verifies set token = ?, created_at = ? where email = ?', [$token, Carbon::now(), $user->email]);
        }

        event(new UserRegisteredEvent($user, $token));

    }

    /**
     * Handle the user "updated" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
