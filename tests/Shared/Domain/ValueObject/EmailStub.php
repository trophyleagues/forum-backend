<?php

declare(strict_types = 1);

namespace Tests\Shared\Domain\ValueObject;

use Shared\Domain\ValueObject\Email;

final class EmailStub
{
    public static function create(string $email)
    {
        return new Email($email);
    }

    public static function random()
    {
        return self::create(StubCreator::random()->email);
    }
}
