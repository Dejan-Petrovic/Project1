<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $task = Task::all();
        return view('index')->with('task', $task);
    }

    public function add(Request $request)
    {
        $task = new Task;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->due_date = $request->due_date;
        $task->save();
        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $task = Task::find($request->id);
        $task->delete();
        return redirect()->back();
    }

    public function edit(Request $req)
    {
        $task = Task::find($req->id);
        $task->update([
            'title' => $req->title,
            'description' => $req -> description,
            'due_date' => $req->due_date,
        ]);

        return redirect()->back();
    }
}
