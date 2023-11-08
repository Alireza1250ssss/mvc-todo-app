<?php

use App\App;
use App\Controllers\AuthController;
use App\Controllers\TestController;
use App\Controllers\UserController;
use App\View;

require_once dirname(__DIR__)."/vendor/autoload.php";

$basePath = dirname(__DIR__);
$app = new App($basePath);


$app->router->get('/test',[TestController::class,'getTestPage']);
//$app->router->get('/',[\App\Controllers\TestController::class,'getTestPage']);
$app->router->get('/register',[AuthController::class,'registerView']);
$app->router->post('/register',[AuthController::class,'registerPost']);


$app->router->get('/user',[UserController::class,'index']);





$app->router->get('/contact-us',function(){
    echo "this is contact us page";
});

$app->run();