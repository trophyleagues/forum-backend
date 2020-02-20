<?php

declare(strict_types = 1);

namespace TrophyForum\Responses\Domain;

use Shared\Domain\ValueObject\Uuid;

interface ResponseRepository
{
    public function byId(Uuid $id): ?Response;

    public function byPostId(Uuid $postId): ?Responses;

    public function save(Response $response): void;
}
