<?php

namespace App\Services;

use App\Models\Task;
use App\Repositories\TaskRepository;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class TaskService
{
    private TaskRepository $taskRepository;
    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }
    public function getTasks(int $pagination = 0)
    {
        $tasks = $this->taskRepository->getAll($pagination);
        return $tasks;
    }

    public function createTask(array $data)
    {

        $task = $this->taskRepository->create($data);
        return $task;
    }

    public function getByIdTask(int $id)
    {
        $task = $this->taskRepository->getById($id);
        return $task;
    }

    public function updateTask(int $id, array $data)
    {
        $task = $this->taskRepository->update($id, $data);
        return $task;
    }
    public function deleteTask(int $id)
    {
        $this->taskRepository->delete($id);
    }
}
