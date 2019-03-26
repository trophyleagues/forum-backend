<?php

declare(strict_types = 1);

namespace Tests\Shared\Domain\ValueObject;

use Shared\Domain\ValueObject\Title;

final class TitleStub
{
    public static function create(string $title): Title
    {
        return new Title($title);
    }

    public static function random(): Title
    {
        return self::create(StubCreator::random()->title);
    }
}
