<?php

declare(strict_types = 1);

namespace Shared\Infrastructure\Persistence;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Shared\Domain\ValueObject\Title;
use Shared\Infrastructure\Doctrine\Types\DateTimeType;

final class TitleType extends DateTimeType
{
    const NAME = 'title';

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new Title($value);
    }
}
