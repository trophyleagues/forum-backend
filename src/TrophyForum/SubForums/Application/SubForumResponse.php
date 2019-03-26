<?php

declare(strict_types = 1);

namespace TrophyForum\SubForums\Application;

use TrophyForum\Authors\Application\AuthorResponse;
use TrophyForum\Roles\Application\RolesResponse;
use TrophyForum\SubForums\Domain\SubForum;

final class SubForumResponse
{
    public function __invoke(SubForum $subForum): array
    {
        return [
            'id'          => $subForum->id()->value(),
            'author'      => (new AuthorResponse())->__invoke($subForum->author()),
            'name'        => $subForum->name()->value(),
            'description' => $subForum->description()->value(),
            'is_announce' => $subForum->isAnnounce()->value(),
            'roles'       => (new RolesResponse())->__invoke($subForum->roles()),
            'posts'       => $subForum->totalPosts()->value(),
            'created_at'  => $subForum->createdAt()->value(),
        ];
    }
}
