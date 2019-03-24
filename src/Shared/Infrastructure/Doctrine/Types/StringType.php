<?php

declare(strict_types = 1);

namespace Shared\Infrastructure\Doctrine\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType as DoctrineStringType;

abstract class StringType extends DoctrineStringType
{
    const NAME = 'string';

    public function getName()
    {
        return static::NAME;
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return is_string($value) ? $value : $value->value();
    }
}
