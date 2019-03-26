<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\SubForums\Application\FindAll;

use Tests\TestCase;
use Tests\TrophyForum\SubForums\Infrastructure\InMemorySubForumRepository;
use TrophyForum\SubForums\Application\FindAll\AllSubForumsFinder;
use TrophyForum\SubForums\Application\FindAll\FindAllSubForumsQuery;
use TrophyForum\SubForums\Application\FindAll\FindAllSubForumsQueryHandler;

final class FindAllSubForumsQueryHandlerTest extends TestCase
{
    /** @test */
    function try_build()
    {
        $handler = new FindAllSubForumsQueryHandler(
            new AllSubForumsFinder(
                new InMemorySubForumRepository()
            )
        );

        $this->assertInstanceOf(FindAllSubForumsQueryHandler::class, $handler);
        $this->assertNotNull($handler->handle(new FindAllSubForumsQuery()));
    }
}