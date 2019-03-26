<?php

declare(strict_types = 1);

namespace TrophyForum\SubForums\Infrastructure\Persistence;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Shared\Infrastructure\Doctrine\Types\StringType;
use TrophyForum\SubForums\Domain\SubForumIsAnnounce;

final class SubForumIsAnnounceType extends StringType
{
    const NAME = 'sub_forum_is_announce';

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new SubForumIsAnnounce("1" === $value ? true : false);
    }
}
