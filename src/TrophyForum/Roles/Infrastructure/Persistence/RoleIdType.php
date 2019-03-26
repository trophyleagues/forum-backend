<?php

declare(strict_types = 1);

namespace TrophyForum\Roles\Infrastructure\Persistence;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Shared\Infrastructure\Doctrine\Types\StringType;
use TrophyForum\Roles\Domain\RoleId;

final class RoleIdType extends StringType
{
    const NAME = 'role_id';

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new RoleId($value);
    }
}
