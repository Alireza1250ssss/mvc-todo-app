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
        //before : $foo = 'bar'; =>  ['foo' => 'bar']  === compact('foo')
        View::render('main','index',compact('tasks'));
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

    public function destroy()
    {
        $id = Request::getData()['task_id'];
        $task = new Task();
        $result = $task->where('id',$id)->delete();
        if($result)
            redirect('/tasks');
        else
            View::render('main','error',['message' => 'task delete failed']);
    }
}