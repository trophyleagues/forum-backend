<?php

declare(strict_types = 1);

namespace TrophyForum\Users\Application\Login;

use function Lambdish\Phunctional\apply;
use function Lambdish\Phunctional\pipe;
use Shared\Domain\ValueObject\Email;
use Shared\Domain\ValueObject\Password;
use TrophyForum\Users\Application\UserResponse;

final class LoginUserQueryHandler
{
    private $login;

    public function __construct(UserLogin $login)
    {
        $this->login = pipe($login, new UserResponse());
    }

    public function handle(LoginUserQuery $query): array
    {
        $email    = new Email($query->email());
        $password = new Password($query->password());

        return apply($this->login, [$email, $password]);
    }
}
