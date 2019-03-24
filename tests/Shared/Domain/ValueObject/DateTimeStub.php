<?php

declare(strict_types = 1);

namespace Tests\Shared\Domain\ValueObject;

final class DateTimeStub
{
    public static function random()
    {
        return StubCreator::random()->dateTime;
    }
}
