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

         $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);

        $user = new User();
        $result = $user->create($data);
        if($result){
            $_SESSION['user'] = [
                'full_name' => $data['full_name'],
                'phone' => $data['phone'],
            ];
            $_SESSION['logged_in_time'] = time();
            redirect('/tasks');
        }
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
        $user = $user->where('phone', $phone)->get();
        $hashedPassword = password_hash($password,PASSWORD_DEFAULT);

        if($user && password_verify($password,$user[0]['password'])){
//            setcookie("login-todo-app",
//                json_encode(['phone' => $phone , 'password' => $password]),
//               time() + 3600
//            );
            $_SESSION['user'] = $user[0];
            $_SESSION['user']['id'];
            $_SESSION['logged_in_time'] = time();
            redirect('/tasks');
        }

        else
            View::render('main','error',['message' => 'authentication failed']);
    }

    public function logout()
    {
        session_destroy();
        session_regenerate_id();
//        setcookie("login-todo-app", null,time() - 3600);
        redirect('/login');
    }
}