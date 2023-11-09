<?php
namespace App\Controllers;

use App\Models\User;
use App\Request;
use App\View;

class AuthController {
    public function registerView()
    {
        View::render('footer','register',[]);
    }

    public function registerPost()
    {
        $data = Request::postData();

        $user = new User();
        $result = $user->create($data);
        if($result)
            echo "registered successfully";
        else
            echo "error happened";
    }
}