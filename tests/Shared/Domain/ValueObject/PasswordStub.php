<?php

declare(strict_types = 1);

namespace Tests\Shared\Domain\ValueObject;

use Shared\Domain\ValueObject\Password;

final class PasswordStub
{
    public static function create(string $password)
    {
        return new Password($password);
    }

    public static function random()
    {
        return self::create(StubCreator::random()->password);
    }
}
