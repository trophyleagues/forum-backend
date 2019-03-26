<?php

declare(strict_types = 1);

namespace TrophyForum\Posts\Infrastructure\Persistence;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Shared\Infrastructure\Doctrine\Types\StringType;
use TrophyForum\Posts\Domain\PostId;

final class PostIdType extends StringType
{
    const NAME = 'post_id';

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new PostId($value);
    }
}
