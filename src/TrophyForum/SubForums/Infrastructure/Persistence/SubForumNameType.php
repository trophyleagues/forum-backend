<?php

declare(strict_types = 1);

namespace TrophyForum\SubForums\Infrastructure\Persistence;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Shared\Infrastructure\Doctrine\Types\StringType;
use TrophyForum\SubForums\Domain\SubForumName;

final class SubForumNameType extends StringType
{
    const NAME = 'sub_forum_name';

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new SubForumName($value);
    }
}
