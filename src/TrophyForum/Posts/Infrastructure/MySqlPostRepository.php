<?php

declare(strict_types = 1);

namespace TrophyForum\Posts\Infrastructure;

use Doctrine\ORM\EntityRepository;
use TrophyForum\Posts\Domain\Post;
use TrophyForum\Posts\Domain\PostId;
use TrophyForum\Posts\Domain\PostRepository;

final class MySqlPostRepository extends EntityRepository implements PostRepository
{
    public function byId(PostId $id): ?Post
    {
        /** @var Post $post */
        $post = $this->findOneBy(['id' => $id->value()]);

        return $post;
    }
}
