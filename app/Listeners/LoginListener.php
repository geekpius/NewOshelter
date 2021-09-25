<?php

namespace App\Listeners;

use App\Events\LoginEvent;
use Carbon\Carbon;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LoginListener
{

    /**
     * Handle the event.
     *
     * @param  LoginEvent  $event
     * @return void
     */
    public function handle(LoginEvent $event)
    {
        $event->user->update([
            'login_time' => Carbon::now(),
        ]);

        if($event->user->isUserDifferentDevice($this->getDevice(), $this->getBrowser()))
        {
            $event->user->userLogins()->create([
                'device' => $this->getDevice(),
                'browser' => $this->getBrowser(),
            ]);
        }
    }


    private function getBrowser(): string
    {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $browser = "Unknown Browser";
        $browser_array = array(
            '/msie/i' => 'Internet Explorer',
            '/firefox/i' => 'Firefox',
            '/safari/i' => 'Chrome',
            '/edge/i' => 'Edge',
            '/opera/i' => 'Opera',
            '/netscape/i' => 'Netscape',
            '/maxthon/i' => 'Maxthon',
            '/konqueror/i' => 'Konqueror',
            '/mobile/i' => 'Handheld Browser',
        );
        foreach($browser_array as $regex => $value){
            if(preg_match($regex, $user_agent)){
                $browser = $value;
            }
        }

        return  $browser;

    }


    private function getDevice(): string
    {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $os_platform = 'Unknown OS Platform';
        $os_array = array(
            '/windows nt 10/i' => 'Windows 10',
            '/windows nt 6.3/i' => 'Windows 8.1',
            '/windows nt 6.2/i' => 'Windows 8',
            '/windows nt 6.1/i' => 'Windows 7',
            '/windows nt 6.0/i' => 'Windows Vista',
            '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
            '/windows nt 5.1/i' => 'Windows XP',
            '/windows nt xp/i' => 'Windows XP',
            '/macintosh|mac os x/i' => 'Mac OS X',
            '/mac_powerpc/i' => 'Mac OS 9',
            '/linux/i' => 'Linux',
            '/ubuntu/i' => 'Ubuntu',
            '/iphone/i' => 'iPhone',
            '/ipod/i' => 'iPod',
            '/ipad/i' => 'iPad',
            '/android/i' => 'Android',
            '/blackberry/i' => 'BlackBerry',
            '/webos/i' => 'Mobile',
        );
        foreach($os_array as $regex => $value){
            if(preg_match($regex, $user_agent)){
                $os_platform = $value;
            }
        }

        return $os_platform;
    }


}
