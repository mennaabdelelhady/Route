<?php

Class Notification{
    private $sms;
    private function _construct(){
        $this->sms = new SMS;
    }
}

Class SMS{
    public function sendSMS($message){
        echo "Sending SMS";
    }
}