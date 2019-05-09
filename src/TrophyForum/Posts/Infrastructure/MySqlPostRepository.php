<?php

declare(strict_types = 1);

namespace TrophyForum\Posts\Infrastructure;

use Doctrine\ORM\EntityRepository;
use TrophyForum\Posts\Domain\Post;
use TrophyForum\Posts\Domain\PostId;
use TrophyForum\Posts\Domain\PostRepository;
use TrophyForum\Posts\Domain\Posts;
use TrophyForum\SubForums\Domain\SubForumId;

final class MySqlPostRepository extends EntityRepository implements PostRepository
{
    public function byId(PostId $id): ?Post
    {
        /** @var Post $post */
        $post = $this->findOneBy(['id' => $id->value()]);

        return $post;
    }

    public function bySubForumId(SubForumId $subForumId): ?Posts
    {
        $posts = $this->findBy(['subForum' => $subForumId->value()]);

        return null === $posts ? null : new Posts($posts);
    }

    public function save(Post $post): void
    {
        $this->_em->persist($post);
        $this->_em->flush();
    }
}
