<?php

declare(strict_types = 1);

namespace TrophyForum\Responses\Domain;

use TrophyForum\Posts\Domain\PostId;

interface ResponseRepository
{
    public function byPostId(PostId $postId): ?Responses;
}
