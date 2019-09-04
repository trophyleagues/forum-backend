<?php

declare(strict_types = 1);

namespace TrophyForum\Users\Application\Register;

use Shared\Domain\ValueObject\Country;
use Shared\Domain\ValueObject\Email;
use Shared\Domain\ValueObject\Password;

final class RegisterUserCommandHandler
{
    private $register;

    public function __construct(UserRegister $register)
    {
        $this->register = $register;
    }

    public function handle(RegisterUserCommand $command): void
    {
        $email    = new Email($command->email());
        $password = new Password($command->password());
        $country  = new Country($command->country());

        $this->register->__invoke($email, $password, $country);
    }
}
