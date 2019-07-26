<?php

declare(strict_types = 1);

namespace TrophyForum\Users\Domain;

use Shared\Domain\ValueObject\Email;
use Shared\Domain\ValueObject\Password;

interface UserRepository
{
    public function login(Email $email, Password $password): ?User;
}
