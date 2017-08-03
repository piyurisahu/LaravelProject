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
        return view('tasks.index',compact('tasks'));
    }


    public function show($task)
    {
        $task = Task::find($task);
//{{{{{

        $transformer = new TaskTransformer();

        //return $this->renderJson($task, $transformer);
        return view('tasks.show',compact('task'));

    }
}
