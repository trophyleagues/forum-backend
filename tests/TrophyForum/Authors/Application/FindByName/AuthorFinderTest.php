<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\Authors\Application\FindByName;

use Tests\TestCase;
use Tests\TrophyForum\Authors\Domain\AuthorNameStub;
use Tests\TrophyForum\Authors\Infrastructure\InMemoryAuthorRepository;
use TrophyForum\Authors\Application\FindByName\AuthorFinder;
use TrophyForum\Authors\Domain\Author;
use TrophyForum\Authors\Domain\AuthorName;
use TrophyForum\Authors\Domain\AuthorNotExist;

final class AuthorFinderTest extends TestCase
{
    /** @test */
    function tryFindAuthor(): void
    {
        $finder = new AuthorFinder(new InMemoryAuthorRepository());

        $author = $finder->__invoke(AuthorNameStub::random());

        $this->assertInstanceOf(Author::class, $author);
    }

    /** @test */
    function tryFindNotExistentAuthor(): void
    {
        $this->expectException(AuthorNotExist::class);

        $finder = new AuthorFinder(new InMemoryAuthorRepository());

        $finder->__invoke(new AuthorName('non-existent'));
    }
}
