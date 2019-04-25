<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\Authors\Domain;

use Tests\TestCase;
use TrophyForum\Authors\Domain\Author;

final class AuthorTest extends TestCase
{
    /** @test */
    function try_build()
    {
        $stub = AuthorStub::random();

        $author = new Author($stub->id(), $stub->name(), $stub->avatar());

        $this->assertSame($stub->id()->value(), $author->id()->value());
        $this->assertSame($stub->name()->value(), $author->name()->value());
        $this->assertSame($stub->avatar()->value(), $author->avatar()->value());
    }
}
