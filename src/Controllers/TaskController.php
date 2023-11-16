<?php

namespace App\Controllers;

use App\Models\Task;
use App\Request;
use App\View;

class TaskController
{
    public function index()
    {
        $taskModel = new Task();
        $tasks = $taskModel->where('user_id',$_SESSION['user']['id'])->get();
//        customDump($tasks); die;
        View::render('main','index');
    }

    public function createTask()
    {
        $data = Request::postData();

        $task = new Task();
        $data['user_id'] = $_SESSION['user']['id'];

        $result = $task->create($data);
        if($result){
            redirect('/tasks');
        }else{
            View::render('main','error',['message' => 'task did not create successfully']);
        }
//        customDump($data);
    }
}