<?php

namespace User\Tue;

Class App{
    private $url;
    private $controller;
    private $method;
    public function __construct($request)
    {
        $this->url = $request->getQueryString();
        $this->bootUrl();
       
    }
    public function bootUrl()
    {
        $urlArray = explode('/', $this->url);
        $this->controller = $urlArray[0];
        $this->method = $urlArray[1];
    }
    public function CallMethod(){
        $this->controller = 'User\Tue\Controller\\'.$this->controller;
        if(class_exists($this->controller)){
            $this->controller = new $this->controller();
            if(method_exists($this->controller, $this->method)){
                $this->controller->{$this->method}();
            }else{
                echo 'Method not found';
            }
    }}
}