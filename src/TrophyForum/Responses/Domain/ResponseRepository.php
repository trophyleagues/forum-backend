<?php

declare(strict_types = 1);

namespace TrophyForum\Responses\Domain;

use Shared\Domain\ValueObject\Uuid;
use TrophyForum\Authors\Domain\Author;

interface ResponseRepository
{
    public function byId(Uuid $id): ?Response;

    public function byPostId(Uuid $postId): ?Responses;

    public function byKeywordAndAuthor(int $page, string $keyword = null, Author $author = null): ?Responses;

    public function save(Response $response): void;
}
