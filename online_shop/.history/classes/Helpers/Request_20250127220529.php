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
    public function file($key){
        return isset($_FILES[$key]) ? $_FILES[$key] : null;
    }

    public function IsPost(){
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }
    public function request($key){
        return isset($_REQUEST[$key]) ? $_REQUEST[$key] : null;
    }
    public function redirect($url){
        header("Location: $url");
        exit;
    }
}