<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller

{
    public function index(Request $request)
    {
        $tasks = Task::paginate(5);
        return view('index')->with('tasks', $tasks);
    }

    public function add(Request $request)
    {
        if (Auth::guest()){
            return redirect('/login');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date',
        ]);

        Task::create($validated);
        //$task = new Task;
        //$task->title = $request->title;
        //$task->description = $request->description;
        //$task->due_date = $request->due_date;
        //$task->save();
        return redirect()->route('index')->with('success', 'Task created successfully!');
    }

    public function delete(Request $request)
    {
        if (Auth::guest()){
            return redirect('/login');
        }

        $task = Task::find($request->id);
        $task->delete();
        return redirect()->back()->with('success', 'Task deleted successfully!');
    }

    public function edit(Request $request)
    {
        if (Auth::guest()){
            return redirect('/login');
        }

        $id=$request->id;
        $task=Task::find($id);

        return view('edit')->with('task', $task);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date',
        ]);

        $task = Task::find($id);

        $task->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'due_date' => $validated['due_date'],
        ]);

        return redirect()->route('index')->with('success', 'Task updated successfully!');
    }
}
