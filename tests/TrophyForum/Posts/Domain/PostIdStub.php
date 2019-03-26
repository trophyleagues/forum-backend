<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\Posts\Domain;

use Tests\Shared\Domain\ValueObject\UuidStub;
use TrophyForum\Posts\Domain\PostId;

final class PostIdStub
{
    public static function create(string $id): PostId
    {
        return new PostId($id);
    }

    public static function random(): PostId
    {
        return self::create(UuidStub::random());
    }
}
