<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Interfaces\RepositoryInterface;

class CategoryRepository implements Interfaces\RepositoryInterface
{

    public function getAll(int $pagination)
    {
        return Category::paginate($pagination);
    }

    public function create(array $data)
    {
        $category = Category::create($data);
        return $category;
    }

    public function getById(int $id)
    {
        return Category::find($id);
    }

    public function update(int $id, array $data)
    {
        $category = $this->getById($id);

        $category->update([
            'name' => $data['name'],
            'description' => $data['description'],
        ]);

        return $category;
    }

    public function delete(int $id)
    {
        $category = $this->getById($id);
        $category->delete();
    }
}
