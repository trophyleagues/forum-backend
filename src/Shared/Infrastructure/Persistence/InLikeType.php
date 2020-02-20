<?php

declare(strict_types = 1);

namespace Shared\Infrastructure\Persistence;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Shared\Domain\ValueObject\InLike;
use Shared\Infrastructure\Doctrine\Types\IntType;

final class InLikeType extends IntType
{
    const NAME = 'in_like';

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new InLike((int) $value);
    }
}
