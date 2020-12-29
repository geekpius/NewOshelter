<?php
namespace App\SMS;

use Zenoph\Notify\Enums\AuthModel;
use Zenoph\Notify\Enums\TextMessageType;
use Zenoph\Notify\Enums\RequestHandshake;
use Zenoph\Notify\Request\Request;
use Zenoph\Notify\Request\SMSRequest;
use Zenoph\Notify\Request\RequestException;

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
            // set host
            Request::setHost("smsonlinegh.com");
        
            // Initialise request object
            $smsReq = new SMSRequest();
        
            // set authentication details.
            $smsReq->setAuthModel(AuthModel::API_KEY);
            $smsReq->setAuthApiKey("6838284f3e4e207b2e947548ee161352494a06c490120d868ee0875f855c821f");
        
            // message properties
            $smsReq->setMessage($this->message);
            $smsReq->setMessageType(TextMessageType::TEXT);
            $smsReq->setSender($this->sender);     // should be registered
        
            // add message destination
            $smsReq->addDestination($this->phone);
        
            // send message
            $response = $smsReq->submit();
            return $response;
        }
        
        catch (\Exception $ex){
            // output error message
            return ("Error: " . $ex->getMessage());
        }
    }


}

