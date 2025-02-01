<?php

interface Imessage{
    public function send($message);
} 
Class Notification{
    private $Message;
    private function _construct(Imessage $imessage){
        $this->Message = new $imessage;
    }
    public function sendNotification(){
      $this->Message->send();
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