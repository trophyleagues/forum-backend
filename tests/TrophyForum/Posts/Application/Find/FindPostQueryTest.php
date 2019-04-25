<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\Posts\Application\Find;

use Tests\TestCase;
use Tests\TrophyForum\Posts\Domain\PostIdStub;
use TrophyForum\Posts\Application\Find\FindPostQuery;

final class FindPostQueryTest extends TestCase
{
    /** @test */
    function try_build()
    {
        $postId = PostIdStub::random();

        $query = new FindPostQuery($postId->value());

        $this->assertSame($postId->value(), $query->id());
    }
}
