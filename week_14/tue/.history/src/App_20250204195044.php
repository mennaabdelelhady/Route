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
}