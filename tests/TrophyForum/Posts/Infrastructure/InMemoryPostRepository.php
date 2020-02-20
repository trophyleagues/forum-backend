<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\Posts\Infrastructure;

use Shared\Domain\ValueObject\Uuid;
use Tests\TrophyForum\Posts\Domain\PostStub;
use TrophyForum\Posts\Domain\Post;
use TrophyForum\Posts\Domain\PostRepository;
use TrophyForum\Posts\Domain\Posts;

final class InMemoryPostRepository implements PostRepository
{
    public function byId(Uuid $id): ?Post
    {
        return PostStub::withId($id);
    }

    public function bySubForumId(Uuid $subForumId): ?Posts
    {
        return new Posts(
            [
                PostStub::random(),
                PostStub::random(),
                PostStub::random(),
            ]
        );
    }

    public function save(Post $post): void
    {
        return;
    }
}
