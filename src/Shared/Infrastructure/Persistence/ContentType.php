<?php

declare(strict_types = 1);

namespace Shared\Infrastructure\Persistence;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Shared\Domain\ValueObject\Content;
use Shared\Infrastructure\Doctrine\Types\DateTimeType;

final class ContentType extends DateTimeType
{
    const NAME = 'content';

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new Content($value);
    }
}
