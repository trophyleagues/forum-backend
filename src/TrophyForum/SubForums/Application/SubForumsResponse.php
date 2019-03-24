<?php

declare(strict_types = 1);

namespace TrophyForum\SubForums\Application;

use TrophyForum\SubForums\Domain\SubForums;

final class SubForumsResponse
{
    public static function response(SubForums $subForums): array
    {
        $response = [];

        foreach ($subForums as $subForum) {
            $response[] = SubForumResponse::response($subForum);
        }

        return $response;
    }
}
