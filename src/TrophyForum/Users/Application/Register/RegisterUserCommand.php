<?php

declare(strict_types = 1);

namespace TrophyForum\Users\Application\Register;

final class RegisterUserCommand
{
    private $name;
    private $email;
    private $password;
    private $country;

    public function __construct(string $name, string $email, string $password, string $country)
    {
        $this->name     = $name;
        $this->email    = $email;
        $this->password = $password;
        $this->country  = $country;
    }

    public function name(): string
    {
        return $this->name;
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
