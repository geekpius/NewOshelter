<?php

namespace App\Listeners;

use App\Events\UserRegisteredEvent;
use App\Jobs\SendEmailJob;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Str;

class RegisteredUserEmailListener
{
    /**
     * Handle the event.
     *
     * @param  UserRegisteredEvent  $event
     * @return void
     */
    public function handle(UserRegisteredEvent $event)
    {
        (string) $token = $this->generateToken();
        $data = array(
            "name" => current(explode(' ',$event->user->name)),
            "code" => $event->user->email_verification_token,
            "expire" => $event->user->email_verification_expired_at,
            "link" => route('verify.email.activate', ['token'=>$event->token]),
        );

        SendEmailJob::dispatch($event->user, $data)->delay(5);
    }

    private function generateToken()
    {
        // This is set in the .env file
        $key = config('app.key');

        if (Str::startsWith($key, 'base64:')) {
            $key = base64_decode(substr($key, 7));
        }
        return hash_hmac('sha256', Str::random(40), $key);
    }


}
