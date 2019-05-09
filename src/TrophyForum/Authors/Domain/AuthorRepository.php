<?php

declare(strict_types = 1);

namespace TrophyForum\Authors\Domain;

interface AuthorRepository
{
    public function byAuthorId(AuthorId $id): ?Author;
}
