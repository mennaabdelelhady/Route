<?php

namespace User\Tue;

Class App{
    private $url;
    private $controller;
    private $method;
    public function __construct($request)
    {
        $this->url = $request->getQueryString();
    }
}