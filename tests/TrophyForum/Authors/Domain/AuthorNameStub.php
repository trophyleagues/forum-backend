<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\Authors\Domain;

use Tests\Shared\Domain\ValueObject\WordStub;
use TrophyForum\Authors\Domain\AuthorName;

final class AuthorNameStub
{
    public static function create(string $name): AuthorName
    {
        return new AuthorName($name);
    }

    public static function random(): AuthorName
    {
        return self::create(WordStub::random());
    }
}
