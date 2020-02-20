<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\Authors\Application\Find;

use Tests\TestCase;
use Tests\TrophyForum\Authors\Domain\AuthorIdStub;
use Tests\TrophyForum\Authors\Infrastructure\InMemoryAuthorRepository;
use TrophyForum\Authors\Application\Find\AuthorFinder;
use TrophyForum\Authors\Domain\Author;
use TrophyForum\Authors\Domain\AuthorId;
use TrophyForum\Authors\Domain\AuthorNotExist;

final class AuthorFinderTest extends TestCase
{
    /** @test */
    function tryFindAuthor(): void
    {
        $finder = new AuthorFinder(new InMemoryAuthorRepository());

        $author = $finder->__invoke(AuthorIdStub::random());

        $this->assertInstanceOf(Author::class, $author);
    }

    /** @test */
    function tryFindNotExistentAuthor(): void
    {
        $this->expectException(AuthorNotExist::class);

        $finder = new AuthorFinder(new InMemoryAuthorRepository());

        $finder->__invoke(new AuthorId('6b17b10a-4660-49f1-b02b-e3a7e9b12fce'));
    }
}
