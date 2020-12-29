<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    namespace Zenoph\Notify\Store;
    
    use Zenoph\Notify\Enums\MessageValidation;
    
    class MessageReport {
        private $_messageValidation = MessageValidation::MV_NONE;
        private $_messageValidationTag = null;
        private $_templateId = null;
        private $_destinations = null;
        private $_destsCount = 0;
        
        private function __construct() {
            $this->_destinations = array();
        }
 
        public static function create(&$p){
            $msgReport = new MessageReport();
            
            if (array_key_exists('templateId', $p))
            $msgReport->_templateId = $p['templateId'];
            
            // When message validation fails, there won't be any destinations.
            if (array_key_exists('destinations', $p))
                $msgReport->_destinations = $p['destinations'];
            
            if (array_key_exists('validation', $p)) {
                $msgReport->_messageValidation = $p['validation'];
                
                if (array_key_exists('validationTag', $p))
                    $msgReport->_messageValidationTag = $p['validationTag'];
            }
            
            if (array_key_exists('destsCount', $p)) {
                $msgReport->_destsCount = $p['destsCount'];
            }
            else {
                $msgReport->_destsCount = $msgReport->_destinations->getCount();
            }
            
            // return message report
            return $msgReport;
        }
        
        public function getValidation(){
            return $this->_messageValidation;
        }
        
        public function getValidationTag(){
            return $this->_messageValidationTag;
        }
        
        public function getDestiniationsCount(){
            return $this->_destsCount;
        }
        
        public function getDestinations(){
            return $this->_destinations;
        }
        
        public function getTemplateId(){
            return $this->_templateId;
        }
    }