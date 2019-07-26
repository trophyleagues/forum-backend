<?php

declare(strict_types = 1);

namespace TrophyForum\Users\Application\Login;

use Shared\Domain\ValueObject\Email;
use Shared\Domain\ValueObject\Password;
use TrophyForum\Users\Domain\User;
use TrophyForum\Users\Domain\UserNotFound;
use TrophyForum\Users\Domain\UserRepository;

final class UserLogin
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Email $email, Password $password): User
    {
        $user = $this->repository->login($email, $password);

        if (null === $user) {
            throw new UserNotFound(sprintf('The user <%s> does not exists', $email->value()));
        }

        return $user;
    }
}
