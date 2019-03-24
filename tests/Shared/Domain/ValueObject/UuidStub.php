<?php

declare(strict_types = 1);

namespace Tests\Shared\Domain\ValueObject;

final class UuidStub
{
    public static function random(): string
    {
        return StubCreator::random()->unique()->uuid;
    }
}
