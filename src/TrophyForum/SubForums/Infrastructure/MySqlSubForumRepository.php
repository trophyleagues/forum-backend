<?php

declare(strict_types = 1);

namespace TrophyForum\SubForums\Infrastructure;

use Doctrine\ORM\EntityRepository;
use Shared\Domain\ValueObject\Uuid;
use TrophyForum\SubForums\Domain\SubForum;
use TrophyForum\SubForums\Domain\SubForumRepository;
use TrophyForum\SubForums\Domain\SubForums;

final class MySqlSubForumRepository extends EntityRepository implements SubForumRepository
{
    public function all(): SubForums
    {
        return new SubForums($this->findAll());
    }

    public function bySubForumId(Uuid $id): ?SubForum
    {
        /** @var SubForum $subForum */
        $subForum = $this->findOneBy(['id' => $id->value()]);

        return $subForum;
    }
}
