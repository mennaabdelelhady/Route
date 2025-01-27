<?php
namespace classes\Helpers;

class Session{
    //get push unset destroy
    public function ___construct(){
        session_start();
    }
    public function get($key){
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }
    public function push($key, $value){
        if(!isset($_SESSION[$key])){
            $_SESSION[$key] = [];
        }
        $_SESSION[$key][]= $value;
    }
}