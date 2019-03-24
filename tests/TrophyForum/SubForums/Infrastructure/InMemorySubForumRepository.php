<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\SubForums\Infrastructure;

use Tests\TrophyForum\SubForums\Domain\SubForumStub;
use TrophyForum\SubForums\Domain\SubForum;
use TrophyForum\SubForums\Domain\SubForumId;
use TrophyForum\SubForums\Domain\SubForumRepository;
use TrophyForum\SubForums\Domain\SubForums;

final class InMemorySubForumRepository implements SubForumRepository
{
    public function all(): SubForums
    {
        return new SubForums(
            [
                SubForumStub::random(),
                SubForumStub::random(),
                SubForumStub::random(),
            ]
        );
    }

    public function bySubForumId(SubForumId $id): SubForum
    {
        // @todo Implement the awesome bySubForumId() method!!!
    }
}
