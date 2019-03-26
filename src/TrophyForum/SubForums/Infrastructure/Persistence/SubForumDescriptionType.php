<?php

declare(strict_types = 1);

namespace TrophyForum\SubForums\Infrastructure\Persistence;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Shared\Infrastructure\Doctrine\Types\StringType;
use TrophyForum\SubForums\Domain\SubForumDescription;

final class SubForumDescriptionType extends StringType
{
    const NAME = 'sub_forum_description';

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new SubForumDescription($value);
    }
}
