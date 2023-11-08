<?php
namespace App;

class Request {
    public static function getData()
    {
        return filter_input_array(INPUT_GET,FILTER_SANITIZE_STRING);

    }

    public static function postData()
    {
        return filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
    }

    public static function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function getUrl()
    {
        return explode('?', $_SERVER['REQUEST_URI'])[0];
    }
}