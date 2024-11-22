<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\CategoryService;
use App\Services\TaskService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(private readonly TaskService $taskService)
    {}
    public function index(Request $request)
    {

        $sort = $request->query('sort', 'asc');

        $categoryService = new categoryService();
        $categories = $categoryService->getCategories($request->get('pagination', 5));
        $tasks = $this->taskService->getTasks();
        return view('category')->with('categories', $categories)->with('tasks', $tasks);
    }

    public function add(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'task_id' => 'required|exists:tasks,id'
        ]);

        $categoryService = new categoryService();
        $category = $categoryService->createCategory($validated);

        $category->tasks()->attach($validated['task_id']);

        return redirect()->route('category')->with('success', 'Category created succesfully!');
    }

    public function delete(Request $request, int $id)
    {
        $categoryService = new categoryService();

        $categoryService->deleteCategory($id);

        return redirect()->back()->with('success', 'Category deleted successfully!');
    }

    public function edit(Request $request)
    {
        $id=$request->id;
        $categoryService = new categoryService();
        $category = $categoryService->getByIdCategory($id);


        return view('edit-category')->with('category', $category);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $categoryService = new categoryService();

        $category = $categoryService->updateCategory($id, $validated);

        return redirect()->route('category')->with('success', 'Category updated successfully!');
    }
}
