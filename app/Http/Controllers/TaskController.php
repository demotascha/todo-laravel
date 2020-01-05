<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('id', 'DESC')->get();
        $data = [
            'tasks' => $tasks,
        ];
        return view('index', $data);
    }

}
