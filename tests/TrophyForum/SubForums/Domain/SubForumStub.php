<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\SubForums\Domain;

use Shared\Domain\ValueObject\CreatedAt;
use Shared\Domain\ValueObject\UpdatedAt;
use Tests\Shared\Domain\ValueObject\CreatedAtStub;
use Tests\Shared\Domain\ValueObject\UpdatedAtStub;
use TrophyForum\SubForums\Domain\SubForum;
use TrophyForum\SubForums\Domain\SubForumId;
use TrophyForum\SubForums\Domain\SubForumName;

final class SubForumStub
{
    public static function create(SubForumId $id, SubForumName $name, CreatedAt $createdAt, UpdatedAt $updatedAt)
    {
        return new SubForum($id, $name, $createdAt, $updatedAt);
    }

    public static function random()
    {
        return self::create(
            SubForumIdStub::random(),
            SubForumNameStub::random(),
            CreatedAtStub::random(),
            UpdatedAtStub::random()
        );
    }
}
