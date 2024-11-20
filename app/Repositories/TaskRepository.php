<?php

namespace App\Repositories;

use App\Models\Task;
use App\Repositories\Interfaces\RepositoryInterface;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class TaskRepository implements Interfaces\RepositoryInterface
{

    public function getAll(int $pagination)
    {
        return QueryBuilder::for(Task::class)->allowedFilters([AllowedFilter::exact('completed_status')])
            ->allowedSorts('due_date')->paginate($pagination);
    }

    public function create(array $data)
    {
        $task = Task::create($data);

        return $task;
    }

    public function getById(int $id)
    {
        return Task::find($id);
    }

    public function update(int $id, array $data)
    {

        $task = $this->getById($id);

        $task->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'due_date' => $data['due_date'],
        ]);

        return $task;
    }

    public function delete(int $id)
    {
        $task = $this->getById($id);
        $task->delete();
    }
}
