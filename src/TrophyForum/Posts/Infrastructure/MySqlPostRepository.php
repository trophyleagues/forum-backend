<?php

declare(strict_types = 1);

namespace TrophyForum\Posts\Infrastructure;

use Doctrine\ORM\EntityRepository;
use LaravelDoctrine\ORM\Pagination\PaginatesFromParams;
use Shared\Domain\ValueObject\Uuid;
use TrophyForum\Authors\Domain\Author;
use TrophyForum\Posts\Domain\Post;
use TrophyForum\Posts\Domain\PostRepository;
use TrophyForum\Posts\Domain\Posts;

final class MySqlPostRepository extends EntityRepository implements PostRepository
{
    use PaginatesFromParams;

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

    public function byKeywordAndAuthor(int $page, string $keyword = null, Author $author = null): ?Posts
    {
        $query = $this->createQueryBuilder('p');

        if ($keyword !== null) {
            $query->where('p.title LIKE :keyword OR p.content LIKE :keyword')
                ->setParameter('keyword', '%'.$keyword.'%');
        }

        if ($author !== null) {
            $query->where('p.author_id = :authorId')
                ->setParameter('authorId', $author->id()->value());
        }

        $posts = $query->getQuery()->getResult();

        return null === $posts ? null : new Posts($posts);
    }


    public function save(Post $post): void
    {
        $this->_em->persist($post);
        $this->_em->flush();
    }
}
