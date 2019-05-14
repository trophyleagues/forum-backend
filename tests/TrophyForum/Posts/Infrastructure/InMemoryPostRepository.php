<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\Posts\Infrastructure;

use Tests\TrophyForum\Posts\Domain\PostStub;
use TrophyForum\Posts\Domain\Post;
use TrophyForum\Posts\Domain\PostId;
use TrophyForum\Posts\Domain\PostRepository;
use TrophyForum\Posts\Domain\Posts;
use TrophyForum\SubForums\Domain\SubForumId;

final class InMemoryPostRepository implements PostRepository
{
    public function byId(PostId $id): ?Post
    {
        return PostStub::withId($id);
    }

    public function bySubForumId(SubForumId $subForumId): ?Posts
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
        // @todo Implement the awesome save() method!!!
    }
}
