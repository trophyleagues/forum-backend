<?php

declare(strict_types = 1);

namespace Shared\Infrastructure\Persistence;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Shared\Domain\ValueObject\UnLike;
use Shared\Infrastructure\Doctrine\Types\IntType;

final class UnLikeType extends IntType
{
    const NAME = 'un_like';

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new UnLike((int) $value);
    }
}
