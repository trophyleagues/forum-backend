<?php

declare(strict_types = 1);

namespace TrophyForum\SubForums\Infrastructure;

use Doctrine\ORM\EntityRepository;
use TrophyForum\SubForums\Domain\SubForum;
use TrophyForum\SubForums\Domain\SubForumId;
use TrophyForum\SubForums\Domain\SubForumRepository;
use TrophyForum\SubForums\Domain\SubForums;

final class MySqlSubForumRepository extends EntityRepository implements SubForumRepository
{
    public function all(): SubForums
    {
        return new SubForums($this->findAll());
    }

    public function bySubForumId(SubForumId $id): SubForum
    {
        // @todo Implement the awesome bySubForumId() method!!!
    }
}
