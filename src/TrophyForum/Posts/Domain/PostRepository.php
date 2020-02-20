<?php

declare(strict_types = 1);

namespace TrophyForum\Posts\Domain;

use Shared\Domain\ValueObject\Uuid;

interface PostRepository
{
    public function byId(Uuid $id): ?Post;

    public function bySubForumId(Uuid $subForumId): ?Posts;

    public function save(Post $post): void;
}
