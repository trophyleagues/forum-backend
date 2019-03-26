<?php

declare(strict_types = 1);

namespace TrophyForum\Authors\Application;

use TrophyForum\Authors\Domain\Author;

final class AuthorResponse
{
    public function __invoke(Author $author): array
    {
        return [
            'id'     => $author->id()->value(),
            'name'   => $author->name()->value(),
            'avatar' => $author->avatar()->value(),
        ];
    }
}
