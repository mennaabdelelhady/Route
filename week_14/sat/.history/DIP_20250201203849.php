<?php

Class Notification{
    private $sms;
    private $email;
    private function _construct(){
        $this->sms = new SMS;
        $this->email = new Email;
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

class Email{
    public function send($message){
        echo "Sending Email";
    }
}
$notification = new Notification;

$notification->sendNotification();