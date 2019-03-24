<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\SubForums\Domain;

use Tests\Shared\Domain\ValueObject\WordStub;
use TrophyForum\SubForums\Domain\SubForumName;

final class SubForumNameStub
{
    public static function create(string $name)
    {
        return new SubForumName($name);
    }

    public static function random()
    {
        return self::create(WordStub::random());
    }
}
