<?php

declare(strict_types = 1);

namespace TrophyForum\Roles\Infrastructure\Persistence;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Shared\Infrastructure\Doctrine\Types\StringType;
use TrophyForum\Roles\Domain\RoleName;

final class RoleNameType extends StringType
{
    const NAME = 'role_name';

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new RoleName($value);
    }
}
