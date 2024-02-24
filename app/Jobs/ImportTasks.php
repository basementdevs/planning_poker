<?php

namespace App\Jobs;

use App\Http\Services\TaskService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ImportTasks implements ShouldQueue
{
    private TaskService $taskService;

    private $tasks;

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(array $tasks)
    {
        $this->taskService = new TaskService();
        $this->tasks = $tasks;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->taskService->store(
            tasks: $this->tasks
        );
    }
}
