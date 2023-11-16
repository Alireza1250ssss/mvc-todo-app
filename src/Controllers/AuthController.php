<?php
namespace App\Controllers;

use App\Models\User;
use App\Request;
use App\Session;
use App\View;

class AuthController {
    public function registerView()
    {
        if($user = Session::get('user')){
            redirect('/tasks');
        }
        View::render('footer','register',[]);
    }

    public function registerPost()
    {
        $data = Request::postData();

         $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);

        $user = new User();
        $user = $user->create($data);
        if($user){
            Session::set('user',$user) ;
            redirect('/tasks');
        }
        else
            View::render('main','error',['message' => 'authentication failed']);
    }

    public function loginView()
    {
        if($user = Session::get('user')){
            redirect('/tasks');
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
            Session::set('user',$user[0]);
//            $_SESSION['user'] = $user[0];
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