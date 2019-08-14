<?php

declare(strict_types = 1);

namespace Shared\Infrastructure\Persistence;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Shared\Domain\ValueObject\Password;
use Shared\Infrastructure\Doctrine\Types\StringType;

final class PasswordType extends StringType
{
    const NAME = 'password';

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new Password($value);
    }
}
