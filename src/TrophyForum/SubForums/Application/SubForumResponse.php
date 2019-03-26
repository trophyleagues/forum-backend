<?php

declare(strict_types = 1);

namespace TrophyForum\SubForums\Application;

use TrophyForum\SubForums\Domain\SubForum;

final class SubForumResponse
{
    public function __invoke(SubForum $subForum): array
    {
        return [
            'id'         => $subForum->id()->value(),
            'name'       => $subForum->name()->value(),
            'created_at' => $subForum->createdAt()->value(),
        ];
    }
}
