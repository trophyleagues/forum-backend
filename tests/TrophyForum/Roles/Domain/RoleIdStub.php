<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\Roles\Domain;

use Tests\Shared\Domain\ValueObject\UuidStub;
use TrophyForum\Roles\Domain\RoleId;

final class RoleIdStub
{
    public static function create(string $id): RoleId
    {
        return new RoleId($id);
    }

    public static function random(): RoleId
    {
        return self::create(UuidStub::random());
    }
}
