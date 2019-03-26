<?php

declare(strict_types = 1);

namespace TrophyForum\Authors\Infrastructure\Persistence;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Shared\Infrastructure\Doctrine\Types\StringType;
use TrophyForum\Authors\Domain\AuthorAvatar;

final class AuthorAvatarType extends StringType
{
    const NAME = 'author_avatar';

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new AuthorAvatar($value);
    }
}
