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
            $response[] = (new SubForumResponse())->__invoke($subForum);
        }

        return $response;
    }
}
