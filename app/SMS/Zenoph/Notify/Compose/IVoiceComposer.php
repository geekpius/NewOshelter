<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    namespace Zenoph\Notify\Compose;
    
    interface IVoiceComposer {
        function setOfflineVoice($fileName, $saveRef = null);
        function getOfflineVoice();
        function setTemplateReference($ref);
        function getTemplateReference();
        function isOfflineVoice();
    }