<?php

declare(strict_types = 1);

namespace TrophyForum\Posts\Infrastructure\Persistence;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Shared\Infrastructure\Doctrine\Types\StringType;
use TrophyForum\Posts\Domain\PostIsOpen;

final class PostIsOpenType extends StringType
{
    const NAME = 'post_is_open';

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new PostIsOpen("1" === $value ? true : false);
    }
}
