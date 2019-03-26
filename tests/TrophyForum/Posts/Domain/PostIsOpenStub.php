<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\Posts\Domain;

use Tests\Shared\Domain\ValueObject\StubCreator;
use TrophyForum\Posts\Domain\PostIsOpen;

final class PostIsOpenStub
{
    public static function create(bool $isOpen): PostIsOpen
    {
        return new PostIsOpen($isOpen);
    }

    public static function random(): PostIsOpen
    {
        return self::create(StubCreator::random()->boolean);
    }
}
