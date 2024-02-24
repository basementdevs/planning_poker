<?php

namespace App\Http\Factory;

use App\Contracts\TaskApiInterface;
use App\Http\Enum\IntegrationType;
use App\Http\Services\Integrations\TrelloService;

class TaskIntegrationFactory
{
    public static function createByType(string $type): ?TaskApiInterface
    {
        return match (true) {
            $type === IntegrationType::TRELLO => new TrelloService(),
            default => null,
        };
    }
}
