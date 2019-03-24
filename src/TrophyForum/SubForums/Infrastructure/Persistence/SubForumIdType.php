<?php

declare(strict_types = 1);

namespace TrophyForum\SubForums\Infrastructure\Persistence;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Shared\Infrastructure\Doctrine\Types\StringType;
use TrophyForum\SubForums\Domain\SubForumId;

final class SubForumIdType extends StringType
{
    const NAME = 'sub_forum_id';

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new SubForumId($value);
    }
}
