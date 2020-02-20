<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\Users\Domain;

use Tests\Shared\Domain\ValueObject\StubCreator;
use TrophyForum\Users\Domain\UserToken;

final class UserTokenStub
{
    public static function create(string $token): UserToken
    {
        return new UserToken($token);
    }

    public static function random(): UserToken
    {
        return self::create(StubCreator::random()->password);
    }
}
