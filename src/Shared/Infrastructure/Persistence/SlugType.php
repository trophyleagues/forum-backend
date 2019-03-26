<?php

declare(strict_types = 1);

namespace Shared\Infrastructure\Persistence;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Shared\Domain\ValueObject\Slug;
use Shared\Infrastructure\Doctrine\Types\DateTimeType;

final class SlugType extends DateTimeType
{
    const NAME = 'slug';

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new Slug($value);
    }
}
