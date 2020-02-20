<?php

declare(strict_types = 1);

namespace Tests\Shared\Domain\ValueObject;

use Shared\Domain\ValueObject\Uuid;

final class UuidStub
{
    public static function create(string $uuid): Uuid
    {
        return new Uuid($uuid);
    }

    public static function random(): Uuid
    {
        return new Uuid(StubCreator::random()->unique()->uuid);
    }
}
