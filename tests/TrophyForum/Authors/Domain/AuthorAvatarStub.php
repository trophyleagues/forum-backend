<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\Authors\Domain;

use Tests\Shared\Domain\ValueObject\WordStub;
use TrophyForum\Authors\Domain\AuthorAvatar;

final class AuthorAvatarStub
{
    public static function create(string $name): AuthorAvatar
    {
        return new AuthorAvatar($name);
    }

    public static function random(): AuthorAvatar
    {
        return self::create(WordStub::random());
    }
}
