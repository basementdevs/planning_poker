<?php

namespace App\Http\Services\Integrations;

use App\Contracts\TaskApiInterface;
use App\Http\Entities\Task;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Pusher\ApiErrorException;

/**
 * Create a new anonymous resource collection.
 *
 * @param  mixed  $resource
 * @return array<Task>
 */
class TrelloService implements TaskApiInterface
{

    public function getTasks(string $boardId): array
    {
        $tasks = [];

        $response = Client::getBoardCardsById($boardId);

        if($response->successful()) {
            foreach($response->json() as $task) {
                $tasks[] = (new Task(
                    id: $task["id"],
                    name: $task["name"],
                    description: $task["desc"],
                    story_points: null
                ))->toArray();
            }

            return $tasks;
        }

        throw new ApiErrorException(
            message: $response->getReasonPhrase(), 
            code: $response->getCode()
        );
    }
}

class Client 
{
    const BASE_URL = "https://api.trello.com/1/";

    static function getBoardCardsById(string $boardId): Response {
        return Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->get(self::BASE_URL . "boards/" . $boardId . "/cards", [
            "key" => env("TRELLO_KEY"),
            "token" => env("TRELLO_TOKEN"),
            "filter" => "open"
        ]);
    }

}
