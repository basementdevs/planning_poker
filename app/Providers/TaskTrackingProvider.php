<?php

namespace App\Providers;

use App\Services\TaskTrackingService;
use Illuminate\Support\ServiceProvider;

class TaskTrackingProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('TaskTracking', function () {
            return new TaskTrackingService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
