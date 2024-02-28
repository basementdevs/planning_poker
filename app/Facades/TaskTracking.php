<?php

namespace App\Facades;

use App\Contracts\TaskTrackingInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Facade;

/**
 * @method TaskTrackingInterface from(Model $model)
 */
class TaskTracking extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'TaskTracking';
    }
}
