<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class TaskController extends Controller

{
    public function index(Request $request)
    {
        $categories = Category::all('id', 'name');

        $taskService = new TaskService();
        $tasks = $taskService->getTasks($request->get('pagination', 5));


        return view('index')->with('tasks', $tasks)->with('categories', $categories);
    }


    public function add(Request $request)
    {
        if (Auth::guest()){
            return redirect('/login');
        }

        $categories = Category::all();

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date',
            'category_id' => 'required|exists:categories,id'
        ]);



        $taskService = new TaskService();
        $task = $taskService->createTask($validated);

        $task->categories()->attach($validated['category_id']);// $task je prikljucen na relation categories iz modela

        return redirect()->route('index')->with('success', 'Task created successfully!');
    }

    public function delete(Request $request, int $id)
    {
        if (Auth::guest()){
            return redirect('/login');
        }

        $taskService = new TaskService();

        $taskService->deleteTask($id);

        return redirect()->back()->with('success', 'Task deleted successfully!');
    }

    public function edit(Request $request)
    {
        if (Auth::guest()){
            return redirect('/login');
        }

        $id=$request->id;
        $taskService = new TaskService();
        $task = $taskService->getByIdTask($id);


        return view('edit')->with('task', $task);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date',
        ]);

        $taskService = new TaskService();

        $task = $taskService->updateTask($id, $validated);

        return redirect()->route('index')->with('success', 'Task updated successfully!');
    }
}
