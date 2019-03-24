<?php

declare(strict_types = 1);

namespace Shared\Infrastructure\Doctrine\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\DateTimeType as DoctrineDateTimeType;

abstract class DateTimeType extends DoctrineDateTimeType
{
    const NAME = 'datetime';

    public function getName()
    {
        return static::NAME;
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return is_string($value) ? $value : $value->value();
    }
}
