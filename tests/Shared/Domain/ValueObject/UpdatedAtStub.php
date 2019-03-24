<?php

declare(strict_types = 1);

namespace Tests\Shared\Domain\ValueObject;

use Shared\Domain\ValueObject\UpdatedAt;

final class UpdatedAtStub
{
    public static function create(\DateTime $updatedAt)
    {
        return new UpdatedAt($updatedAt);
    }

    public static function random()
    {
        return self::create(DateTimeStub::random());
    }
}
