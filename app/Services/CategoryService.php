<?php

namespace App\Services;
use App\Models\Category;
use App\Repositories\CategoryRepository;

class CategoryService
{
    public function getCategories(int $pagination = 0)
    {
        $categoryRepository = new CategoryRepository();
        $categories = $categoryRepository->getAll($pagination);

        return $categories;
    }

    public function createCategory(array $data)
    {
        $categoryRepository = new CategoryRepository();
        $category = $categoryRepository->create($data);

        return $category;
    }

    public function getByIdCategory(int $id)
    {
        $categoryRepository = new CategoryRepository();
        $category = $categoryRepository->getById($id);

        return $category;
    }

    public function updateCategory(int $id, array $data)
    {
        $categoryRepository = new CategoryRepository();
        $category = $categoryRepository->update($id, $data);
    }

    public function deleteCategory(int $id)
    {
        $categoryRepository = new CategoryRepository();
        $category = $categoryRepository->delete($id);
    }

}
