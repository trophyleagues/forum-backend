<?php

declare(strict_types = 1);

namespace Shared\Infrastructure\Persistence;

use Shared\Infrastructure\Doctrine\Types\DateTimeType;
use Shared\Domain\ValueObject\UpdatedAt;
use Doctrine\DBAL\Platforms\AbstractPlatform;

final class UpdatedAtType extends DateTimeType
{
    const NAME = 'updated_at';

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new UpdatedAt(new \DateTime($value));
    }
}
