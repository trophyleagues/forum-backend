<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\SubForums\Domain;

use Tests\Shared\Domain\ValueObject\WordStub;
use TrophyForum\SubForums\Domain\SubForumDescription;

final class SubForumDescriptionStub
{
    public static function create(string $description)
    {
        return new SubForumDescription($description);
    }

    public static function random()
    {
        return self::create(WordStub::random());
    }
}
