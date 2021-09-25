<?php

namespace App\Jobs;

use App\Http\Traits\SMSTrait;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendSMSJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    use SMSTrait;

    private $phoneNumber;
    private $message;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $phoneNumber, string $message)
    {
        $this->phoneNumber = $phoneNumber;
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if($this->isSendSMS($this->message, $this->phoneNumber)){
            info('SMS sent to '.$this->phoneNumber);
        }else{
            info('Could not send verification code to '.$this->phoneNumber);
        }
    }
}
