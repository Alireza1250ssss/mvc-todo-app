<?php

namespace App\Controllers;

use App\View;

class TaskController
{
    public function index()
    {
        View::render('main','index');
    }
}