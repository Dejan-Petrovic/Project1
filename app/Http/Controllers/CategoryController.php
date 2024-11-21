<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categoryService = new categoryService();
        $categories = $categoryService->getCategories($request->get('pagination', 5));

        return view('index');
    }

    public function add(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $categoryService = new categoryService();
        $category = $categoryService->createCategory($validated);

        return view('index');
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


        return view('edit')->with('task', $task);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $categoryService = new categoryService();

        $category = $categoryService->updateCategory($id, $validated);

        return redirect()->route('index')->with('success', 'Category updated successfully!');
    }
}
