<?php

namespace App\Contracts;

interface TaskApiInterface
{
    public function getTasks(string $boardId): array;
}
