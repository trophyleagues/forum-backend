<?php

declare(strict_types = 1);

namespace Tests\Shared\Domain\ValueObject;

use Shared\Domain\ValueObject\CreatedAt;

final class CreatedAtStub
{
    public static function create(\DateTime $createdAt)
    {
        return new CreatedAt($createdAt);
    }

    public static function random()
    {
        return self::create(DateTimeStub::random());
    }
}
