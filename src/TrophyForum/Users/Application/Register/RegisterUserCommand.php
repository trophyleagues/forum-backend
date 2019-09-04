<?php

declare(strict_types = 1);

namespace TrophyForum\Users\Application\Register;

final class RegisterUserCommand
{
    private $email;
    private $password;
    private $country;

    public function __construct(string $email, string $password, string $country)
    {
        $this->email    = $email;
        $this->password = $password;
        $this->country  = $country;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function password(): string
    {
        return $this->password;
    }

    public function country(): string
    {
        return $this->country;
    }
}
