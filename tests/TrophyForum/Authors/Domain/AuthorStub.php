<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\Authors\Domain;

use TrophyForum\Authors\Domain\Author;
use TrophyForum\Authors\Domain\AuthorAvatar;
use TrophyForum\Authors\Domain\AuthorId;
use TrophyForum\Authors\Domain\AuthorName;

final class AuthorStub
{
    public static function create(AuthorId $id, AuthorName $name, AuthorAvatar $avatar)
    {
        return new Author($id, $name, $avatar);
    }

    public static function withId(AuthorId $id): Author
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
            AuthorIdStub::random(),
            AuthorNameStub::random(),
            AuthorAvatarStub::random()
        );
    }
}
