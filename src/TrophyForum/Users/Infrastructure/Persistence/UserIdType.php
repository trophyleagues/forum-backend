<?php

declare(strict_types = 1);

namespace TrophyForum\Users\Infrastructure\Persistence;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Shared\Infrastructure\Doctrine\Types\StringType;
use TrophyForum\Users\Domain\UserId;

final class UserIdType extends StringType
{
    const NAME = 'user_id';

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new UserId($value);
    }
}
