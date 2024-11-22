<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use App\Services\CategoryService;
use App\Services\TaskService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class TaskController extends Controller

{
    private TaskService $taskService;
    private CategoryService $categoryService;
    public function __construct(TaskService $taskService, CategoryService $categoryService)
    {
        $this->taskService = $taskService;
        $this->categoryService = $categoryService;
    }
    public function index(Request $request)
    {
        $categories = $this->categoryService->getCategories();

        $tasks = $this->taskService->getTasks($request->get('pagination', 5));


        return view('index')->with('tasks', $tasks)->with('categories', $categories);
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
            'category_id' => 'required|exists:categories,id'
        ]);

        $task = $this->taskService->createTask($validated);

        $task->categories()->attach($validated['category_id']);// $task je prikljucen na relation categories iz modela

        return redirect()->route('index')->with('success', 'Task created successfully!');
    }

    public function delete(Request $request, int $id)
    {
        if (Auth::guest()){
            return redirect('/login');
        }


        $this->taskService->deleteTask($id);

        return redirect()->back()->with('success', 'Task deleted successfully!');
    }

    public function edit(Request $request)
    {
        if (Auth::guest()){
            return redirect('/login');
        }

        $id=$request->id;
        $task = $this->taskService->getByIdTask($id);


        return view('edit')->with('task', $task);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date',
        ]);

        $this->taskService->updateTask($id, $validated);

        return redirect()->route('index')->with('success', 'Task updated successfully!');
    }
}
