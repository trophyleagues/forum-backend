<?php

declare(strict_types = 1);

namespace TrophyForum\Authors\Domain;

use Shared\Domain\ValueObject\Uuid;

interface AuthorRepository
{
    public function save(Author $author): void;

    public function byId(Uuid $id): ?Author;
}
