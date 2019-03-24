<?php

declare(strict_types = 1);

namespace Tests\Shared\Domain\ValueObject;

final class BooleanStub
{
    public static function random()
    {
        return StubCreator::random()->boolean;
    }
}
