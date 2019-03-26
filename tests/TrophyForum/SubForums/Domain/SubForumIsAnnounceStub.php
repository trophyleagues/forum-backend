<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\SubForums\Domain;

use Tests\Shared\Domain\ValueObject\StubCreator;
use TrophyForum\SubForums\Domain\SubForumIsAnnounce;

final class SubForumIsAnnounceStub
{
    public static function create(bool $isAnnounce)
    {
        return new SubForumIsAnnounce($isAnnounce);
    }

    public static function random()
    {
        return self::create(StubCreator::random()->boolean);
    }
}
