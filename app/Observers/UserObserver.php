<?php

namespace App\Observers;

use App\User;
use App\UserModel\UserNotification;
use App\UserModel\UserProfile;


use DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Mail\EmailSender;
use Illuminate\Support\Facades\Mail;

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

        // Illuminate\Support\Str;
        if (Str::startsWith($key, 'base64:')) {
            $key = base64_decode(substr($key, 7));
        }
        return hash_hmac('sha256', Str::random(40), $key);
    }

    public function created(User $user)
    {
        UserProfile::create([
            'user_id' => $user->id,
        ]);

        UserNotification::create([
            'user_id' => $user->id,
        ]);

        (string) $token = $this->generateToken();
        $results = DB::select('select * from email_verifies where email = :email', ['email' => $user->email]);
        if(empty($results)){
            $insert = DB::insert('insert into email_verifies (email, token, created_at) values (?, ?, ?)', [$user->email, $token, Carbon::now()]);
        }else{
            $update = DB::update('update email_verifies set token = ?, created_at = ? where email = ?', [$token, Carbon::now(), $user->email]);
        }

        $data = array(
            "name" => current(explode(' ',$user->name)),
            "code" => $user->email_verification_token,
            "expire" => $user->email_verification_expired_at,
            "link" => route('verify.email.activate', ['token'=>$token]),
        );
        Mail::to($user->email)->send(new EmailSender($data, "Verify Email", "emails.verify_email"));
        
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
