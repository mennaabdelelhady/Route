<?php

Class Notification{
    private $sms;
    private function _construct(){
        $this->sms = new SMS;
    }
    public static function sendNotification(){
        $this->sms->send();
    }
}

Class SMS{
    public function sendSMS($message){
        echo "Sending SMS";
    }
}