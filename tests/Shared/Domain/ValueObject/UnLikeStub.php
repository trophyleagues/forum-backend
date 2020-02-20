<?php

declare(strict_types = 1);

namespace Tests\Shared\Domain\ValueObject;

use Shared\Domain\ValueObject\UnLike;

final class UnLikeStub
{
    public static function create(int $unLike): UnLike
    {
        return new UnLike($unLike);
    }

    public static function random(): UnLike
    {
        return self::create(StubCreator::random()->numberBetween(0, 100));
    }
}
