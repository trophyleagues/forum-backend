<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\SubForums\Application\Find;

use Shared\Domain\ValueObject\Uuid;
use Tests\TestCase;
use TrophyForum\SubForums\Application\Find\FindSubForumQuery;

final class FindSubForumQueryTest extends TestCase
{
    /** @test */
    function tryBuild(): void
    {
        $subForumId = Uuid::random();

        $query = new FindSubForumQuery($subForumId->value());

        $this->assertSame($subForumId->value(), $query->id());
    }
}
