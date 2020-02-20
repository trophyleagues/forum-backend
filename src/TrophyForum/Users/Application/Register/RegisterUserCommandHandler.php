<?php

declare(strict_types = 1);

namespace TrophyForum\Users\Application\Register;

use Shared\Domain\ValueObject\Country;
use Shared\Domain\ValueObject\Email;
use Shared\Domain\ValueObject\Password;
use Tests\TrophyForum\Authors\Domain\AuthorIdStub;
use TrophyForum\Authors\Application\Create\AuthorCreator;
use TrophyForum\Authors\Domain\AuthorName;

final class RegisterUserCommandHandler
{
    private $register;
    private $authorCreator;

    public function __construct(UserRegister $register, AuthorCreator $authorCreator)
    {
        $this->register      = $register;
        $this->authorCreator = $authorCreator;
    }

    public function handle(RegisterUserCommand $command): void
    {
        $email    = new Email($command->email());
        $password = new Password($command->password());
        $country  = new Country($command->country());

        $this->register->__invoke($email, $password, $country);

        $this->authorCreator->__invoke(AuthorIdStub::random(), new AuthorName('Name'));
    }
}
