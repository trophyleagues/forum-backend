<?php

declare(strict_types = 1);

namespace Shared\Infrastructure\Doctrine\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\BooleanType;

abstract class BoolType extends BooleanType
{
    const NAME = 'boolean';

    public function getName()
    {
        return static::NAME;
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return true === $value ? 1 : 0;
    }
}
