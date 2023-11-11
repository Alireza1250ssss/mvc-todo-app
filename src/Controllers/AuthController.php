<?php
namespace App\Controllers;

use App\Models\User;
use App\Request;
use App\View;

class AuthController {
    public function registerView()
    {
        if(!empty($_COOKIE['login-todo-app'])){
            $dataArray = $_COOKIE['login-todo-app'];
            $dataArray = json_decode($dataArray,true);
            $phone = $dataArray['phone'];
            $password = $dataArray['password'];
            $user = new User();
            $user = $user->where('phone', $phone)->where('password', $password)
                ->get();
            if($user){
                setcookie("login-todo-app",
                    json_encode(['phone' => $phone , 'password' => $password]),
                    time() + 3600
                );
                redirect('/tasks');
            }

        }
        View::render('footer','register',[]);
    }

    public function registerPost()
    {
        $data = Request::postData();

        $user = new User();
        $result = $user->create($data);
        if($result)
            header('Location: http://127.0.0.1:8081/tasks');
        else
            View::render('main','error',['message' => 'authentication failed']);
    }

    public function loginView()
    {
        if(!empty($_COOKIE['login-todo-app'])){
            $dataArray = $_COOKIE['login-todo-app'];
            $dataArray = json_decode($dataArray,true);
            $phone = $dataArray['phone'];
            $password = $dataArray['password'];
            $user = new User();
            $user = $user->where('phone', $phone)->where('password', $password)
                ->get();
            if($user){
                setcookie("login-todo-app",
                    json_encode(['phone' => $phone , 'password' => $password]),
                    time() + 3600
                );
                redirect('/tasks');
            }

        }
        echo View::renderView('login');
    }

    public function loginPost()
    {
        $data = Request::postData();
        $phone = $data['phone'];
        $password = $data['password'];

        $user = new User();
        $user = $user->where('phone', $phone)->where('password', $password)
            ->get();
        if($user){
            setcookie("login-todo-app",
                json_encode(['phone' => $phone , 'password' => $password]),
               time() + 3600
            );
            redirect('/tasks');
        }

        else
            View::render('main','error',['message' => 'authentication failed']);
    }
}