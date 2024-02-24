<?php

namespace App\Http\Services;

use App\Models\Task;
use Exception;
use Illuminate\Support\Facades\Log;

class TaskService
{
    public function store(array $tasks): void
    {
        try {
            Task::insert($tasks);
        } catch (Exception $e) {
            Log::error($e->getMessage(), [
                'message' => 'Error creating Tasks',
                'tasks' => json_encode($tasks),
            ]);
        }
    }
}
