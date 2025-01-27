<?php
namespace classes\Helpers;

class Request{
    //get post file request redirect
    public function get($key){
        return isset($_GET[$key]) ? $_GET[$key] : null;
    }
    public function post($key){
        return isset($_POST[$key]) ? $_POST[$key] : null;
    }
}