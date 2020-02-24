<?php

declare(strict_types = 1);

namespace TrophyForum\Posts\Domain;

use Shared\Domain\ValueObject\Uuid;
use TrophyForum\Authors\Domain\Author;

interface PostRepository
{
    public function byId(Uuid $id): ?Post;

    public function bySubForumId(Uuid $subForumId): ?Posts;

    public function byKeywordAndAuthor(int $page, string $keyword = null, Author $author = null): ?Posts;

    public function save(Post $post): void;
}
