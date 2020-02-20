<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\Responses\Domain;

use Shared\Domain\ValueObject\CreatedAt;
use Shared\Domain\ValueObject\UpdatedAt;
use Tests\Shared\Domain\ValueObject\ContentStub;
use Tests\TestCase;
use Tests\TrophyForum\Authors\Domain\AuthorStub;
use Tests\TrophyForum\Posts\Domain\PostStub;
use TrophyForum\Responses\Domain\Response;

final class ResponseTest extends TestCase
{
    /** @test */
    function tryBuild(): void
    {
        $stub = ResponseStub::random(PostStub::random(), AuthorStub::random());

        $subForum = new Response(
            $stub->id(),
            $stub->post(),
            $stub->author(),
            $stub->content(),
            $stub->createdAt(),
            $stub->updatedAt()
        );

        $this->assertSame($stub->id()->value(), $subForum->id()->value());
        $this->assertSame($stub->post()->id()->value(), $subForum->post()->id()->value());
        $this->assertSame($stub->author()->id()->value(), $subForum->author()->id()->value());
        $this->assertSame($stub->content()->value(), $subForum->content()->value());
        $this->assertSame($stub->createdAt()->value(), $subForum->createdAt()->value());
        $this->assertSame($stub->updatedAt()->value(), $subForum->updatedAt()->value());
    }

    /** @test */
    function tryCreate(): void
    {
        $stub = ResponseStub::random(PostStub::random(), AuthorStub::random());

        $subForum = Response::create(
            $stub->id(),
            $stub->post(),
            $stub->author(),
            $stub->content()
        );

        $this->assertSame($stub->id()->value(), $subForum->id()->value());
        $this->assertSame($stub->post()->id()->value(), $subForum->post()->id()->value());
        $this->assertSame($stub->author()->id()->value(), $subForum->author()->id()->value());
        $this->assertSame($stub->content()->value(), $subForum->content()->value());
        $this->assertInstanceOf(CreatedAt::class, $subForum->createdAt());
        $this->assertInstanceOf(UpdatedAt::class, $subForum->updatedAt());
    }

    /** @test */
    function tryUpdateContent(): void
    {
        $stub       = ResponseStub::random(PostStub::random(), AuthorStub::random());
        $newContent = ContentStub::random();

        $subForum = Response::create(
            $stub->id(),
            $stub->post(),
            $stub->author(),
            $stub->content()
        );

        $this->assertSame($stub->content()->value(), $subForum->content()->value());

        $subForum->updateContent($newContent);

        $this->assertSame($newContent->value(), $subForum->content()->value());
    }
}
