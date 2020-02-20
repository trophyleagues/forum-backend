<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\SubForums\Infrastructure;

use Shared\Domain\ValueObject\Uuid;
use Tests\TrophyForum\SubForums\Domain\SubForumStub;
use TrophyForum\SubForums\Domain\SubForum;
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

    public function bySubForumId(Uuid $id): SubForum
    {
        return isset($_SESSION['sub_forums'][$id->value()]) ? $_SESSION['sub_forums'][$id->value()] : null;
    }

    public function save(SubForum $subForum): void
    {
        $_SESSION['sub_forums'][$subForum->id()->value()] = $subForum;
    }
}
