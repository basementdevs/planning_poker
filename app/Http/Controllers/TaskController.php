<?php

namespace App\Http\Controllers;

use App\Http\Factory\TaskIntegrationFactory;
use App\Http\Requests\GetTaskFromIntegrationRequest;
use App\Jobs\ImportTasks;
use Exception;
use Illuminate\Support\Facades\Log;
use Pusher\ApiErrorException;

class TaskController extends Controller
{
    public function getTasksFromIntegration(GetTaskFromIntegrationRequest $request)
    {
        $integrationClient = TaskIntegrationFactory::createByType(
            type: $request->type
        );

        try {
            $tasks = $integrationClient->getTasks(
                boardId: $request->boardId
            );

            ImportTasks::dispatch($tasks);
        } catch (ApiErrorException $apiError) {
            Log::error($apiError->getMessage(), [
                'message' => 'Error consuming api from '.$request->type,
                'code' => $apiError->getCode(),
                'integrationType' => $request->type,
            ]);
        } catch (Exception $e) {
            Log::error($e->getMessage(), [
                'message' => 'Error consuming api from '.$request->type,
                'integrationType' => $request->type,
            ]);
        }

    }
}
