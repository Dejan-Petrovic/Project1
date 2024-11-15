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

    public function edit(Request $request)
    {
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
