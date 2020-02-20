<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\Posts\Application\Find;

use Shared\Domain\ValueObject\Uuid;
use Tests\TestCase;
use Tests\TrophyForum\Posts\Infrastructure\InMemoryPostRepository;
use TrophyForum\Posts\Application\Find\FindPostQuery;
use TrophyForum\Posts\Application\Find\FindPostQueryHandler;
use TrophyForum\Posts\Application\Find\PostFinder;

final class FindPostQueryHandlerTest extends TestCase
{
    /** @test */
    function tryBuildAndResponseArray(): void
    {
        $postId = Uuid::random();

        $query = new FindPostQuery($postId->value());

        $handler = new FindPostQueryHandler(new PostFinder(new InMemoryPostRepository()));
        $array   = $handler->handle($query);

        $this->assertArrayHasKey('id', $array);
        $this->assertArrayHasKey('title', $array);
        $this->assertArrayHasKey('content', $array);
        $this->assertArrayHasKey('author', $array);
        $this->assertArrayHasKey('is_open', $array);
        $this->assertArrayHasKey('total_responses', $array);
        $this->assertArrayHasKey('responses', $array);
        $this->assertArrayHasKey('slug', $array);
        $this->assertArrayHasKey('visualization', $array);
        $this->assertArrayHasKey('created_at', $array);
        $this->assertArrayHasKey('updated_at', $array);
    }
}
