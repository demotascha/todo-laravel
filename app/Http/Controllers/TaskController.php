<?php

namespace App\Http\Controllers;

use App\Task;
use Carbon\Carbon;
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task();
        $task->title = $request->title;
        $task->completed = 0;
        $task->created_at = Carbon::now();
        $task->updated_at = Carbon::now();
        $task->save();

        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(int $id)
    {
        $task = Task::find($id);
        $task->update([
            'completed' => true,
        ]);

        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $task = Task::find($id);
        $task->delete();

        return redirect('/');
    }
}
