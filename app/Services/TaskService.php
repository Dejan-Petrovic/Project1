<?php

namespace App\Services;

use App\Models\Task;
use App\Repositories\TaskRepository;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class TaskService
{
    public function getTasks(int $pagination)
    {
        $taskRepository = new TaskRepository();
        $tasks = $taskRepository->getAll($pagination);

        return $tasks;
    }

    public function createTask(array $data)
    {

        $taskRepository = new TaskRepository(); //ovo je instanciranje - pravljenje novog objekta
        $task = $taskRepository->create($data);

        return $task;
    }

    public function getByIdTask(int $id)
    {
        $taskRepository = new TaskRepository();
        $task = $taskRepository->getById($id);

        return $task;
    }

    public function updateTask(int $id, array $data)
    {
        $taskRepository = new TaskRepository();
        $task = $taskRepository->update($id, $data);

        return $task;
    }
    public function deleteTask(int $id)
    {
        $taskRepository = new TaskRepository();
        $taskRepository->delete($id);
    }
}
