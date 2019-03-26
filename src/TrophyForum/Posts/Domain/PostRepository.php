<?php

declare(strict_types = 1);

namespace TrophyForum\Posts\Domain;

interface PostRepository
{
    public function byId(PostId $id): ?Post;
}
