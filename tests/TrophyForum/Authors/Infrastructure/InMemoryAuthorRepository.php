<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\Authors\Infrastructure;

use Tests\TrophyForum\Authors\Domain\AuthorStub;
use TrophyForum\Authors\Domain\Author;
use TrophyForum\Authors\Domain\AuthorId;
use TrophyForum\Authors\Domain\AuthorRepository;

final class InMemoryAuthorRepository implements AuthorRepository
{
    public function save(Author $author): void
    {
        return;
    }

    public function byAuthorId(AuthorId $id): ?Author
    {
        if ($id->value() === '6b17b10a-4660-49f1-b02b-e3a7e9b12fce') {
            return null;
        }

        return AuthorStub::withId($id);
    }
}
