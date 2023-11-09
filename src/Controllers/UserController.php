<?php

namespace App\Controllers;

use App\Models\User;
use App\Request;

class UserController
{
    public function delete()
    {
        $userId = Request::getData()['user_id'];
        $user = new User();
        $result = $user->where('id','16')->get();
        if($result) {
            echo "<pre>"; print_r($result);
        }
        else
            echo "error!";
    }
}