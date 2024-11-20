<?php

namespace App\Repositories\Interfaces;

use App\Models\Task;

interface RepositoryInterface
{
    public function getAll(int $pagination);

    public function create(array $data);

    public function getById(int $id);

    public function update(int $id, array $data);

    public function delete(int $id);
}

