<?php

namespace App;

use App\Controllers\LoginController;

class App {
    public  $router;

    protected $request;

    public static $basePath ;
    public function __construct($basePath)
    {
        $this->request = new Request();
        $this->router = new Router($this->request);
        self::$basePath = $basePath;
    }

    public function run()
    {
        $callback = $this->router->resolve();
        if (is_array($callback)){
            $obj = new $callback[0];
            $method = $callback[1]; //registerView
            call_user_func([$obj,$method]);
        }
        else{
            $callback();
        }

    }
}