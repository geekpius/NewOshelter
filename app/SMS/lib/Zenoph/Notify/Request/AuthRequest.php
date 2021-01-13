<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    namespace Zenoph\Notify\Request;
    
    use Zenoph\Notify\Enums\AuthModel;
    use Zenoph\Notify\Store\AuthProfile;
    use Zenoph\Notify\Utils\MessageUtil;
    
    class AuthRequest extends Request {
        public function __construct() {
            parent::__construct();
            $this->_loadaps = true;
        }
  
        public function authenticate(){
            $this->setRequestResource('auth');
            $this->initRequest();
            $dataWriter = $this->createDataWriter();
            $this->_requestData = &$dataWriter->writeAuthRequest();
            
            $response = parent::submit();
            $authProfile = null;
            
            if ($this->_loadaps){
                // Authentication profile
                $authProfile = new AuthProfile();
                $authProfile->setAuthModel($this->_authModel);

                if ($this->_authModel == AuthModel::PORTAL_PASS){
                    $authProfile->setAuthLogin($this->_authLogin);
                    $authProfile->setAuthPassword($this->_authPsswd);
                }
                else if ($this->_authModel == AuthModel::API_KEY) {
                    $authProfile->setAuthApiKey($this->_authApiKey);
                }

                // defaults
                $dataFragment = $response->getDataFragment();
                $authProfile->extractUserData($dataFragment);
                MessageUtil::extractGeneralSettings($dataFragment);
            }
            
            return $authProfile;
        }
    }
