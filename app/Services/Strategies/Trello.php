<?php

namespace App\Services\Strategies;

use App\Models\TrelloSetting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Trello implements \App\Contracts\TaskTrackingInterface
{
    public function __construct(private readonly TrelloSetting|Model $model)
    {
    }

    public function cards(): array
    {
        $query = [
            'key' => $this->model->api_key,
            'token' => $this->model->api_token,
        ];
        $response = Http::get("https://api.trello.com/1/boards/{$this->model->board_token}/cards", $query);

        return $response->json();
    }
}
