<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\Roles\Domain;

use Tests\Shared\Domain\ValueObject\WordStub;
use TrophyForum\Roles\Domain\RoleName;

final class RoleNameStub
{
    public static function create(string $name): RoleName
    {
        return new RoleName($name);
    }

    public static function random(): RoleName
    {
        return self::create(WordStub::random());
    }
}
