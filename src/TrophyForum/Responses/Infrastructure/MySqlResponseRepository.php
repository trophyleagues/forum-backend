<?php

declare(strict_types = 1);

namespace TrophyForum\Responses\Infrastructure;

use Doctrine\ORM\EntityRepository;
use Shared\Domain\ValueObject\Uuid;
use TrophyForum\Authors\Domain\Author;
use TrophyForum\Posts\Domain\Posts;
use TrophyForum\Responses\Domain\Response;
use TrophyForum\Responses\Domain\ResponseRepository;
use TrophyForum\Responses\Domain\Responses;

final class MySqlResponseRepository extends EntityRepository implements ResponseRepository
{
    public function byId(Uuid $id): ?Response
    {
        /** @var Response $response */
        $response = $this->findOneBy(['id' => $id->value()]);

        return $response;
    }

    public function byPostId(Uuid $postId): ?Responses
    {
        $responses = $this->findBy(['post' => $postId->value()]);

        if (true === empty($responses)) {
            return null;
        }

        return new Responses($responses);
    }

    public function byKeywordAndAuthor(int $page, string $keyword = null, Author $author = null): ?Responses
    {
        $query = $this->createQueryBuilder('p');

        if ($keyword !== null) {
            $query->where('p.content LIKE :keyword')
                ->setParameter('keyword', '%'.$keyword.'%');
        }

        if ($author !== null) {
            $query->where('p.author_id = :authorId')
                ->setParameter('authorId', $author->id()->value());
        }

        $responses = $query->getQuery()->getResult();

        return null === $responses ? null : new Responses($responses);
    }

    public function save(Response $response): void
    {
        $this->_em->persist($response);
        $this->_em->flush();
    }
}
