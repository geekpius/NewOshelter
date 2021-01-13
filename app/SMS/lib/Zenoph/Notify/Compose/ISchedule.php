<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    namespace Zenoph\Notify\Compose;
    
    interface ISchedule {
        function getTemplateId();
        function schedule();
        function isScheduled();
        function getScheduleInfo();
        function setScheduleDateTime($dateTime, $val1 = null, $val2 = null);
        function refreshScheduledDestinationsUpdate($destsList);
    }