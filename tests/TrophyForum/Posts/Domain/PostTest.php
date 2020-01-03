<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\Posts\Domain;

use Tests\TestCase;
use TrophyForum\Posts\Domain\Post;

final class PostTest extends TestCase
{
    /** @test */
    function try_build()
    {
        $stub = PostStub::random();

        $post = new Post(
            $stub->id(),
            $stub->subForum(),
            $stub->author(),
            $stub->title(),
            $stub->content(),
            $stub->isOpen(),
            $stub->responses(),
            $stub->slug(),
            $stub->visualization(),
            $stub->createdAt(),
            $stub->updatedAt()
        );

        $this->assertSame($stub->id()->value(), $post->id()->value());
        $this->assertSame($stub->subForum()->id()->value(), $post->subForum()->id()->value());
        $this->assertSame($stub->author()->id()->value(), $post->author()->id()->value());
        $this->assertSame($stub->title()->value(), $post->title()->value());
        $this->assertSame($stub->content()->value(), $post->content()->value());
        $this->assertSame($stub->isOpen()->value(), $post->isOpen()->value());
        $this->assertSame($stub->responses(), $post->responses());
        $this->assertSame($stub->slug()->value(), $post->slug()->value());
        $this->assertSame($stub->visualization()->value(), $post->visualization()->value());
        $this->assertSame($stub->createdAt()->value(), $post->createdAt()->value());
        $this->assertSame($stub->updatedAt()->value(), $post->updatedAt()->value());
    }
}
