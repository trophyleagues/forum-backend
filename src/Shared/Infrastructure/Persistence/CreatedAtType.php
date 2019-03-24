<?php

declare(strict_types = 1);

namespace Shared\Infrastructure\Persistence;

use Shared\Domain\ValueObject\CreatedAt;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Shared\Infrastructure\Doctrine\Types\DateTimeType;

final class CreatedAtType extends DateTimeType
{
    const NAME = 'created_at';

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new CreatedAt(new \DateTime($value));
    }
}
