<?php

declare(strict_types = 1);

namespace Tests\Shared\Domain\ValueObject;

use Shared\Domain\ValueObject\Slug;

final class SlugStub
{
    public static function create(string $slug)
    {
        return new Slug($slug);
    }

    public static function random()
    {
        return self::create(StubCreator::random()->slug);
    }
}
