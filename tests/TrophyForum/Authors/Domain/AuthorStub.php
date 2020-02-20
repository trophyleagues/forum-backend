<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\Authors\Domain;

use Shared\Domain\ValueObject\Uuid;
use Tests\Shared\Domain\ValueObject\UuidStub;
use TrophyForum\Authors\Domain\Author;
use TrophyForum\Authors\Domain\AuthorAvatar;
use TrophyForum\Authors\Domain\AuthorName;

final class AuthorStub
{
    public static function create(Uuid $id, AuthorName $name, AuthorAvatar $avatar)
    {
        return new Author($id, $name, $avatar);
    }

    public static function withId(Uuid $id): Author
    {
        return self::create(
            $id,
            AuthorNameStub::random(),
            AuthorAvatarStub::random()
        );
    }

    public static function random(): Author
    {
        return self::create(
            UuidStub::random(),
            AuthorNameStub::random(),
            AuthorAvatarStub::random()
        );
    }
}
