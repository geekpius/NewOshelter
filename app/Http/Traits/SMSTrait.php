<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Auth;
use Config;

trait SMSTrait
{
    public function isSendSMS(string $message, string $phone): bool
    {
        $key = env('FAYA_SMS_API_KEY');
        $url = 'https://devapi.fayasms.com/messages';

        $params = [
            'sender' => 'VibTech-GH',
            'message' => $message,
            'recipients' => explode(',', $phone),
        ];
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($params, 1),
            CURLOPT_HTTPHEADER => [
                "fayasms-developer: $key",
            ],
        ]);
        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response, 1);
        if ($response['status'] == 200) {
            return true;
        }
        return false;
    }

//    public function isSendSMS(string $message, string $phone): bool
//    {
//        $key = env('SMS_API_KEY');
//        $url = 'https://api.smsonlinegh.com/v3/message/sms/send';
//
//        $data = array(
//            "auth" => array(
//                "model" => "key",
//                "apiKey" => $key
//            ),
//            "data" => array(
//                "messages" => [
//                    array(
//                        "text" => $message,
//                        "type" => 0,
//                        "sender" => "OSHELTER",
//                        "destinations" => [
//                            array(
//                                "to" => $phone
//                            )
//                        ]
//                    )
//                ]
//            )
//        );
//
//        try {
//            $postData = json_encode(array("request" => $data));
//            $ch = curl_init($url);
//            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//            curl_setopt($ch, CURLOPT_POST, 1);
//            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
//            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
//            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Accept: application/json'));
//            $result = curl_exec($ch);
//            curl_close($ch);
//            $response = json_decode($result);
//            if($response->response->data){
//                return true;
//            }else{
//                return false;
//            }
//        } catch (\Exception $e) {
//            return false;
//        }
//    }
}
