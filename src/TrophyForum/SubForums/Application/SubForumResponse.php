<?php

declare(strict_types = 1);

namespace TrophyForum\SubForums\Application;

use TrophyForum\Authors\Application\AuthorResponse;
use TrophyForum\Posts\Application\PostsResponse;
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
            'total_posts' => $subForum->totalPosts()->value(),
            'posts'       => (new PostsResponse())->__invoke($subForum->posts()),
            'created_at'  => $subForum->createdAt()->value(),
        ];
    }
}
