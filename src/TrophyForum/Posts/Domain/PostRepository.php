<?php

declare(strict_types = 1);

namespace TrophyForum\Posts\Domain;

use TrophyForum\SubForums\Domain\SubForumId;

interface PostRepository
{
    public function byId(PostId $id): ?Post;

    public function bySubForumId(SubForumId $subForumId): ?Posts;
}
