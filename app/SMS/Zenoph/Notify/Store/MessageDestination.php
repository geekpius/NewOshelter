<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    namespace Zenoph\Notify\Store;
    
    use Zenoph\Notify\Utils\MessageUtil;
    use Zenoph\Notify\Enums\DestinationStatus;
    use Zenoph\Notify\Enums\DestinationValidation;
    
    class MessageDestination {
        private $_phoneNumber = null;
        private $_messageId = null;
        private $_status = null;
        private $_validation = null;
        private $_submitDateTime = null;
        private $_reportDateTime = null;
        private $_messageCount = 0;
        private $_dataObject = null;
        
        public function __construct() {
            $this->_status = DestinationStatus::DS_UNKNOWN;
            $this->_validation = DestinationValidation::DV_UNKNOWN;
        }
        
        public static function create(&$data){
            $msgDest = new MessageDestination();
            
            if (isset($data['phoneNumber']) && !empty($data['phoneNumber']))
                $msgDest->_phoneNumber = $data['phoneNumber'];
            
            if (isset($data['messageId']) && !empty($data['messageId']))
                $msgDest->_messageId = $data['messageId'];
            
            if (isset($data['destStatus']) && is_numeric($data['destStatus']))
                $msgDest->_status = $data['destStatus'];
            
            if (isset($data['destValidation']) && is_numeric($data['destValidation']))
                $msgDest->_validation = $data['destValidation'];
            
            if (isset($data['messageCount']) && is_numeric($data['messageCount']))
                $msgDest->_messageCount = $data['messageCount'];
            
            if (isset($data['psndValues']))
                $msgDest->_dataObject = $data['psndValues'];
            
            // The dateTime properties.
            if (isset($data['submitDateTime']) && !is_null($data['submitDateTime'])){
                $msgDest->_submitDateTime = \DateTime::createFromFormat(MessageUtil::DATETIME_FORMAT, 
                    $data['submitDateTime'], new \DateTimeZone(date_default_timezone_get()));
            }
            
            // delivery report dateTime, if available
            if (isset($data['reportDateTime']) && !is_null($data['reportDateTime'])){
                $dateTime = \DateTime::createFromFormat(MessageUtil::DATETIME_FORMAT, $data['reportDateTime']); // new \DateTimeZone(date_default_timezone_get()));
                $msgDest->_reportDateTime = $dateTime;
            }
            
            // return it.
            return $msgDest;
        }
        
        public function getMessageCount(){
            return $this->_messageCount;
        }
        
        public function getPhoneNumber(){
            return $this->_phoneNumber;
        }
        
        public function getMessageId(){
            return $this->_messageId;
        }
        
        public function getStatus(){
            return $this->_status;
        }
        
        public function getValidation(){
            return $this->_validation;
        }
        
        public function getSubmitDateTime(){
            return $this->_submitDateTime;
        }
        
        public function getReportDateTime(){
            return $this->_reportDateTime;
        }
        
        public function getData(){
            return $this->_dataObject;
        }
    }