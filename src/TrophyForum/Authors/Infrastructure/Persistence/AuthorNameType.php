<?php

declare(strict_types = 1);

namespace TrophyForum\Authors\Infrastructure\Persistence;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Shared\Infrastructure\Doctrine\Types\StringType;
use TrophyForum\Authors\Domain\AuthorName;

final class AuthorNameType extends StringType
{
    const NAME = 'author_name';

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new AuthorName($value);
    }
}
