<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\Users\Domain;

use Shared\Domain\ValueObject\Email;
use Shared\Domain\ValueObject\Password;
use Shared\Domain\ValueObject\Uuid;
use Tests\Shared\Domain\ValueObject\EmailStub;
use Tests\Shared\Domain\ValueObject\PasswordStub;
use Tests\Shared\Domain\ValueObject\UuidStub;
use TrophyForum\Users\Domain\User;
use TrophyForum\Users\Domain\UserToken;

final class UserStub
{
    public static function create(Uuid $id, Email $email, Password $password, UserToken $token): User
    {
        return new User($id, $email, $password, $token);
    }

    public static function random(): User
    {
        return self::create(
            UuidStub::random(),
            EmailStub::random(),
            PasswordStub::random(),
            UserTokenStub::random()
        );
    }
}
