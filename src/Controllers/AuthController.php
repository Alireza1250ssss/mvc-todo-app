<?php
namespace App\Controllers;

use App\Request;
use App\View;

class AuthController {
    public function registerView()
    {
        View::render('footer','register',[]);
    }

    public function registerPost()
    {
        $full_name = Request::postData()['full_name'];
        $phone = Request::postData()['phone'];

        $dsn = "mysql:host=localhost;dbname=todo_app";
        try {
            $dbConnect = new \PDO($dsn,"alireza",'alireza369369');
            $dbConnect->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
//            $dbConnect->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE,\PDO::FETCH_OBJ);
        }catch (\Exception $e) {
            echo "error happened while connecting".$e->getMessage();
            exit;
        }
//        $result = $dbConnect->query(' SELECT * FROM users')->fetchAll();
        $sql= "insert into users(full_name,phone) VALUES('$full_name','$phone')";
//        $sql = 'SELECT * FROM users';
        var_dump($sql);
        $insertQuery = $dbConnect->query($sql);
//        foreach ($insertQuery->fetchAll(\PDO::FETCH_ASSOC) as $record)
//            echo "<h3><i>".$record['full_name']."</i></h3>";
        echo "<pre>";
//        var_dump($dbConnect->lastInsertId(),$insertQuery);
    }
}