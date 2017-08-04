<?php

namespace App\Http\Controllers;

use App\Transformers\TaskTransformer;
use Illuminate\Http\Request;
use App\Task;
use Symfony\Component\HttpFoundation\Response;

class TasksController extends Controller
{
    //

    public  function index()
    {
        $tasks=Task::all();
        $transformer = new TaskTransformer();
        return $this->renderJsonArray($tasks, $transformer);

        //return view('tasks.index',compact('tasks'));
        //return $this->renderJsonArray($tasks,new TaskTransformer());
//        return $tasks;
    }


    public function show(Task $task)
    {
        //$task = Task::find($task);
//{{{{{

        return $task;

        $transformer = new TaskTransformer();

        //return $this->renderJson($task, $transformer);
        //return view('tasks.show',compact('task'));

    }


    public function create()
}
