<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\SubForums\Application\Find;

use Tests\TestCase;
use Tests\TrophyForum\SubForums\Domain\SubForumIdStub;
use TrophyForum\SubForums\Application\Find\FindSubForumQuery;

final class FindSubForumQueryTest extends TestCase
{
    /** @test */
    function try_build()
    {
        $subForumId = SubForumIdStub::random();

        $query = new FindSubForumQuery($subForumId->value());

        $this->assertSame($subForumId->value(), $query->id());
    }
}
