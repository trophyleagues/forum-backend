<?php

declare(strict_types = 1);

namespace TrophyForum\Responses\Domain;

use TrophyForum\Posts\Domain\PostId;

interface ResponseRepository
{
    public function byId(ResponseId $id): ?Response;

    public function byPostId(PostId $postId): ?Responses;

    public function save(Response $response): void;
}
