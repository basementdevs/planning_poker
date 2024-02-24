<?php

namespace App\Http\Entities;

class Task
{
    public function __construct(
        public string $id,
        public string $name,
        public ?string $description,
        public ?int $story_points,
    ) {
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description ?? '',
            'story_points' => $this->story_points,
        ];
    }
}
