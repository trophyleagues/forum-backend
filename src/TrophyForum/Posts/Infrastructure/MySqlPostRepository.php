<?php

declare(strict_types = 1);

namespace TrophyForum\Posts\Infrastructure;

use Doctrine\ORM\EntityRepository;
use Shared\Domain\ValueObject\Uuid;
use TrophyForum\Posts\Domain\Post;
use TrophyForum\Posts\Domain\PostRepository;
use TrophyForum\Posts\Domain\Posts;

final class MySqlPostRepository extends EntityRepository implements PostRepository
{
    public function byId(Uuid $id): ?Post
    {
        /** @var Post $post */
        $post = $this->findOneBy(['id' => $id->value()]);

        return $post;
    }

    public function bySubForumId(Uuid $subForumId): ?Posts
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
