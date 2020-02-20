<?php

declare(strict_types = 1);

namespace Tests\Shared\Domain\ValueObject;

use Shared\Domain\ValueObject\InLike;

final class InLikeStub
{
    public static function create(int $inLike): InLike
    {
        return new InLike($inLike);
    }

    public static function random(): InLike
    {
        return self::create(StubCreator::random()->numberBetween(0, 100));
    }
}
