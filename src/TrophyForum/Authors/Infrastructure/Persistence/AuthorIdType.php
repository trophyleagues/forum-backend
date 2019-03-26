<?php

declare(strict_types = 1);

namespace TrophyForum\Authors\Infrastructure\Persistence;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Shared\Infrastructure\Doctrine\Types\StringType;
use TrophyForum\Authors\Domain\AuthorId;

final class AuthorIdType extends StringType
{
    const NAME = 'author_id';

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new AuthorId($value);
    }
}
