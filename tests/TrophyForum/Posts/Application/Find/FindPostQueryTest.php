<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\Posts\Application\Find;

use Shared\Domain\ValueObject\Uuid;
use Tests\TestCase;
use TrophyForum\Posts\Application\Find\FindPostQuery;

final class FindPostQueryTest extends TestCase
{
    /** @test */
    function tryBuild(): void
    {
        $postId = Uuid::random();

        $query = new FindPostQuery($postId->value());

        $this->assertSame($postId->value(), $query->id());
    }
}
