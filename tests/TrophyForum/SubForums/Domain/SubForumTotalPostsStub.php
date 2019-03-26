<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\SubForums\Domain;

use Tests\Shared\Domain\ValueObject\StubCreator;
use TrophyForum\SubForums\Domain\SubForumTotalPosts;

final class SubForumTotalPostsStub
{
    public static function create(int $totalPost)
    {
        return new SubForumTotalPosts($totalPost);
    }

    public static function random()
    {
        return self::create(StubCreator::random()->randomNumber());
    }
}
