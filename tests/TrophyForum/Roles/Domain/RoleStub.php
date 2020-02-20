<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\Roles\Domain;

use Shared\Domain\ValueObject\Uuid;
use Tests\Shared\Domain\ValueObject\UuidStub;
use Tests\TrophyForum\Authors\Domain\AuthorStub;
use TrophyForum\Authors\Domain\Author;
use TrophyForum\Roles\Domain\Role;
use TrophyForum\Roles\Domain\RoleName;

final class RoleStub
{
    public static function create(Uuid $id, RoleName $name, Author $author): Role
    {
        return new Role($id, $name, $author);
    }

    public static function random(): Role
    {
        return self::create(
            UuidStub::random(),
            RoleNameStub::random(),
            AuthorStub::random()
        );
    }
}
