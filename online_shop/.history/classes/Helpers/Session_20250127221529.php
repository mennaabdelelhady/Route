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
    public function push($key, $value,$flag = false){
        if(!isset($_SESSION[$key])){
            $_SESSION[$key] = [];
        }
        if($flag){
            $_SESSION[$key] = $value;
        }
        $_SESSION[$key][]= $value;
    }

    public function remove($key){
        unset($_SESSION[$key]);
    }

    public function destroy(){
        session_destroy();
    }
}