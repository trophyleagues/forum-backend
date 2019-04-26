<?php

declare(strict_types = 1);

namespace TrophyForum\SubForums\Application;

use TrophyForum\SubForums\Domain\SubForums;

final class SubForumsResponse
{
    public function __invoke(SubForums $subForums): array
    {
        $response = [];

        foreach ($subForums as $subForum) {
            $subForumResponse = (new SubForumResponse())->__invoke($subForum);
            unset($subForumResponse['posts']);

            $response[] = $subForumResponse;
        }

        return $response;
    }
}
