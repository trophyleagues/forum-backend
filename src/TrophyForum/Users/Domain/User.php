<?php

declare(strict_types = 1);

namespace TrophyForum\Users\Domain;

use Shared\Domain\ValueObject\Email;
use Shared\Domain\ValueObject\Password;

final class User
{
    private $id;
    private $email;
    private $password;
    private $token;

    public function __construct(UserId $id, Email $email, Password $password, UserToken $token)
    {
        $this->id       = $id;
        $this->email    = $email;
        $this->password = $password;
        $this->token    = $token;
    }

    public function id(): UserId
    {
        return $this->id;
    }

    public function email(): Email
    {
        return $this->email;
    }

    public function token(): UserToken
    {
        return $this->token;
    }
}
