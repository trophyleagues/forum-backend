<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\SubForums\Domain;

use Tests\Shared\Domain\ValueObject\UuidStub;
use TrophyForum\SubForums\Domain\SubForumId;

final class SubForumIdStub
{
    public static function create(string $id): SubForumId
    {
        return new SubForumId($id);
    }

    public static function random(): SubForumId
    {
        return self::create(UuidStub::random());
    }
}
