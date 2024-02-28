<?php

namespace App\Services;

use App\Contracts\TaskTrackingInterface;
use App\Models\TrelloSetting;
use App\Services\Strategies\Trello;
use Illuminate\Database\Eloquent\Model;

class TaskTrackingService implements TaskTrackingInterface
{
    private Model $model;

    /**
     * @return $this
     */
    public function from(Model $model): static
    {
        $this->model = $model;

        return $this;
    }

    /**
     * @throws \Exception
     */
    public function cards(): array
    {
        if (! $this->model->exists) {
            //TODO: create exception
            throw new \Exception('You must define de model first, you must use from method');
        }

        return match (get_class($this->model)) {
            TrelloSetting::class => (new Trello($this->model))->cards(),
            default => [],
        };
    }

    public function getModel(): Model
    {
        return $this->model;
    }
}
