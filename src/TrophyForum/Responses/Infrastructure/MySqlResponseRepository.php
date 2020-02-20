<?php

declare(strict_types = 1);

namespace TrophyForum\Responses\Infrastructure;

use Doctrine\ORM\EntityRepository;
use Shared\Domain\ValueObject\Uuid;
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

    public function save(Response $response): void
    {
        $this->_em->persist($response);
        $this->_em->flush();
    }
}
