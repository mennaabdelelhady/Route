<?php

namespace User\Tue;

require_once '/../vendor/autoload.php';
use User\Tue\App\Request;
use User\Tue\App\App;


$request = new Request();
$app = new App($request);
