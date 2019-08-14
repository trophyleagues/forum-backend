<?php

declare(strict_types = 1);

namespace Shared\Infrastructure\Persistence;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Shared\Domain\ValueObject\Email;
use Shared\Infrastructure\Doctrine\Types\StringType;

final class EmailType extends StringType
{
    const NAME = 'email';

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new Email($value);
    }
}
