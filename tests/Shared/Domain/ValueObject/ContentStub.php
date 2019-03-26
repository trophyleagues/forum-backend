<?php

declare(strict_types = 1);

namespace Tests\Shared\Domain\ValueObject;

use Shared\Domain\ValueObject\Content;

final class ContentStub
{
    public static function create(string $content): Content
    {
        return new Content($content);
    }

    public static function random(): Content
    {
        return self::create(StubCreator::random()->randomHtml());
    }
}
