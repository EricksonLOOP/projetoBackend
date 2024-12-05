<?php

namespace App\Repositories;

use App\Models\TaskModel;

class TaskRepository
{
    public function getTasksByStatus($status = null)
    {
        $query = TaskModel::query();

        if ($status) {
            $query->where('status', $status);
        }

        return $query->get();
    }


    public function findById($id)
    {
        return TaskModel::findOrFail($id);
    }

    public function create(array $data)
    {
        return TaskModel::create($data);
    }

    public function update($id, array $data)
    {
        $task = TaskModel::findOrFail($id);
        $task->update($data);
        return $task;
    }

    public function delete($id)
    {
        $task = TaskModel::findOrFail($id);
        $task->delete();
    }
}
