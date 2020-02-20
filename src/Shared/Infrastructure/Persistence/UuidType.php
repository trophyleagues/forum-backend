<?php

declare(strict_types = 1);

namespace Shared\Infrastructure\Persistence;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Shared\Domain\ValueObject\Uuid;
use Shared\Infrastructure\Doctrine\Types\StringType;

final class UuidType extends StringType
{
    const NAME = 'uuid';

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new Uuid($value);
    }
}
