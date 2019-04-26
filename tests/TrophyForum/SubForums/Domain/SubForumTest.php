<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\SubForums\Domain;

use Shared\Domain\ValueObject\CreatedAt;
use Shared\Domain\ValueObject\UpdatedAt;
use Tests\TestCase;
use TrophyForum\SubForums\Domain\SubForum;

final class SubForumTest extends TestCase
{
    /** @test */
    function try_build()
    {
        $stub = SubForumStub::random();

        $subForum = new SubForum(
            $stub->id(),
            $stub->author(),
            $stub->name(),
            $stub->description(),
            $stub->isAnnounce(),
            $stub->totalPosts(),
            $stub->posts(),
            $stub->roles(),
            $stub->createdAt(),
            $stub->updatedAt()
        );

        $this->assertSame($stub->id()->value(), $subForum->id()->value());
        $this->assertSame($stub->name()->value(), $subForum->name()->value());
        $this->assertSame($stub->createdAt()->value(), $subForum->createdAt()->value());
        $this->assertSame($stub->updatedAt()->value(), $subForum->updatedAt()->value());
    }

    /** @test */
    function try_create()
    {
        $stub = SubForumStub::random();

        $subForum = SubForum::create(
            $stub->id(),
            $stub->author(),
            $stub->name(),
            $stub->description(),
            $stub->isAnnounce(),
            $stub->totalPosts(),
            $stub->posts(),
            $stub->roles()
        );

        $this->assertSame($stub->id()->value(), $subForum->id()->value());
        $this->assertSame($stub->name()->value(), $subForum->name()->value());
        $this->assertInstanceOf(CreatedAt::class, $subForum->createdAt());
        $this->assertInstanceOf(UpdatedAt::class, $subForum->updatedAt());
    }
}
