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
    public function send($message){
        echo "Sending SMS";
    }
}

$notification = new Notification;

$notification->sendNotification();