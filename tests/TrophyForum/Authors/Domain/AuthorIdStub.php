<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\Authors\Domain;

use Tests\Shared\Domain\ValueObject\UuidStub;
use TrophyForum\Authors\Domain\AuthorId;

final class AuthorIdStub
{
    public static function create(string $id): AuthorId
    {
        return new AuthorId($id);
    }

    public static function random(): AuthorId
    {
        return self::create(UuidStub::random());
    }
}
