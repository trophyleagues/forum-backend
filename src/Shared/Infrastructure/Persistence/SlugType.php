<?php

declare(strict_types = 1);

namespace Shared\Infrastructure\Persistence;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Shared\Domain\ValueObject\Slug;
use Shared\Infrastructure\Doctrine\Types\StringType;

final class SlugType extends StringType
{
    const NAME = 'slug';

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new Slug($value);
    }
}
