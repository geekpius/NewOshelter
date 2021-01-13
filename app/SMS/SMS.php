<?php
namespace App\SMS;

include_once (__DIR__.'/lib/Zenoph/Notify/AutoLoader.php');

use Zenoph\Notify\Enums\AuthModel;
use Zenoph\Notify\Enums\TextMessageType;
use Zenoph\Notify\Request\Request;
use Zenoph\Notify\Request\SMSRequest;

class SMS
{

    public $sender;
    public $phone;
    public $message;
    public function __construct($sender, $phone, $message)
    {
        $this->sender = $sender;
        $this->phone = $phone;
        $this->message = $message;
    }

    public function send()
    {
        try {
            // Request host domain
            Request::setHost('smsonlinegh.com');
            
            // create request subject
            $smsReq = new SMSRequest();
            $smsReq->setAuthModel(AuthModel::API_KEY);
            $smsReq->setAuthApiKey('2d2adc5cb5edf9d1b090dd97d37e2c5688adff43c8c3882c739dbffd29c3baa2');
            
            // set message properties
            $smsReq->setMessage($this->message);
            $smsReq->setSender($this->sender);
            $smsReq->setMessageType(TextMessageType::TEXT);
            
            // add message destinations. 
            $smsReq->adddestination($this->phone);
            
            // submit message for response
            $msgResp = $smsReq->submit();
            $smsReq->clearDestinations();
            // return $msgResp->getHTTPStatusCode();
        } 
        
        catch (Exception $ex) {
            return ($ex->getMessage());
        }
    }


}

