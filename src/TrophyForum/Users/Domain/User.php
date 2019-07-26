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

    public function __construct(UserId $id, Email $email, Password $password)
    {
        $this->id       = $id;
        $this->email    = $email;
        $this->password = $password;
    }

    public function id(): UserId
    {
        return $this->id;
    }

    public function email(): Email
    {
        return $this->email;
    }
}
