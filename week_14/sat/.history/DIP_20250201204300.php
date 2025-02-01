<?php

interface Imessage{
    public function send($message);
} 
Class Notification{
    private $Message;
    private function _construct(Imessage $Message){
        $this->Message = new SMS;
        $this->email = new Email;
    }
    public function sendNotification(){
        $this->sms->send();
        $this->email->send();
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