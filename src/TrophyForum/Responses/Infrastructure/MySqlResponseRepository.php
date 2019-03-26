<?php

declare(strict_types = 1);

namespace TrophyForum\Responses\Infrastructure;

use Doctrine\ORM\EntityRepository;
use TrophyForum\Posts\Domain\PostId;
use TrophyForum\Responses\Domain\ResponseRepository;
use TrophyForum\Responses\Domain\Responses;

final class MySqlResponseRepository extends EntityRepository implements ResponseRepository
{
    public function byPostId(PostId $postId): ?Responses
    {
        $responses = $this->findBy(['post' => $postId->value()]);

        if (true === empty($responses)) {
            return null;
        }

        return new Responses($responses);
    }
}
