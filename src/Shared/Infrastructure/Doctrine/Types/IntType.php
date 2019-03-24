<?php

declare(strict_types = 1);

namespace Shared\Infrastructure\Doctrine\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\IntegerType;

abstract class IntType extends IntegerType
{
    const NAME = 'integer';

    public function getName()
    {
        return static::NAME;
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return is_int($value) ? $value : $value->value();
    }
}
