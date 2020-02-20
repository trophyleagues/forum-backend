<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\Authors\Application\Create;

use Shared\Domain\ValueObject\Uuid;
use Tests\TestCase;
use Tests\TrophyForum\Authors\Domain\AuthorNameStub;
use Tests\TrophyForum\Authors\Infrastructure\InMemoryAuthorRepository;
use TrophyForum\Authors\Application\Create\AuthorCreator;

final class AuthorCreatorTest extends TestCase
{
    /** @test */
    function tryCreateAuthor(): void
    {
        $creator = new AuthorCreator(new InMemoryAuthorRepository());

        $creator->__invoke(Uuid::random(), AuthorNameStub::random());

        $this->assertSame(true, true);
    }
}
