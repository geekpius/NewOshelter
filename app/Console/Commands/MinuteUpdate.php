<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class MinuteUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'minute:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update users every minute';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if(User::whereIs_active(false)->exists()){
            User::whereIs_active(false)->update(['is_active' => 1]);
        }else{
            User::whereIs_active(true)->update(['is_active' => 0]);
        }
        $this->info("Deactivated all users");
    }
}
