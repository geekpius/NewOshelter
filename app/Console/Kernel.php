<?php

namespace App\Console;

use App\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\MinuteUpdate::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
//        $schedule->command('minute:update')
//                 ->everyMinute();
        $schedule->call(function () {
            if(User::whereIs_active(false)->exists()){
                User::whereIs_active(false)->update(['is_active' => 1]);
                info("Activated all users");
            }else{
                User::whereIs_active(true)->update(['is_active' => 0]);
                info("Deactivated all users");
            }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
