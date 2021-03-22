<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Auth;
use Config;

trait SMSTrait
{
    public function isSendSMS(string $message, string $phone): bool
    {
        $key = env('SMS_API_KEY');
        $url = 'https://api.smsonlinegh.com/v3/message/sms/send';

        $data = array(
            "auth" => array(
                "model" => "key",
                // "apiKey" => "2d2adc5cb5edf9d1b090dd97d37e2c5688adff43c8c3882c739dbffd29c3baa2"
                "apiKey" => $key
            ),
            "data" => array(
                "messages" => [
                    array(
                        "text" => $message,
                        "type" => 0,
                        "sender" => "OSHELTER",
                        "destinations" => [
                            array(
                                "to" => $phone
                            )
                        ]
                    )
                ]
            )
        );

        try {
            $postData = json_encode(array("request" => $data));
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Accept: application/json'));
            $result = curl_exec($ch);
            curl_close($ch);
            $response = json_decode($result);
            if($response->response->data){
                return true;
            }else{
                return false;
            }
        } catch (\Exception $e) {
            return false;
        }
    }
}