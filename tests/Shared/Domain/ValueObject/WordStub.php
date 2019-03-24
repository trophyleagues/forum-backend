<?php

declare(strict_types = 1);

namespace Tests\Shared\Domain\ValueObject;

final class WordStub
{
    public static function random()
    {
        return StubCreator::random()->word;
    }
}
