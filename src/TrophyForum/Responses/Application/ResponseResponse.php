<?php

declare(strict_types = 1);

namespace TrophyForum\Responses\Application;

use TrophyForum\Authors\Application\AuthorResponse;
use TrophyForum\Responses\Domain\Response;

final class ResponseResponse
{
    public function __invoke(Response $response): array
    {
        return [
            'id'         => $response->id()->value(),
            'author'     => (new AuthorResponse())->__invoke($response->author()),
            'content'    => $response->content()->value(),
            'created_at' => $response->createdAt()->value(),
            'updated_at' => $response->updatedAt()->value(),
        ];
    }
}
