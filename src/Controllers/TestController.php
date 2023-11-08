<?php

namespace App\Controllers;

use App\View;

class TestController
{
    public function getTestPage()
    {
        $name = 'alireza';
        View::render('main','test',[
            'message' => 'this is test message content',
            'name' => $name
        ]);
        //        View::renderView('register');

    }
}