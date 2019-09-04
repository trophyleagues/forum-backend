<?php

declare(strict_types = 1);

namespace TrophyForum\Users\Application\Register;

use Shared\Domain\ValueObject\Country;
use Shared\Domain\ValueObject\Email;
use Shared\Domain\ValueObject\Password;
use TrophyForum\Users\Domain\UserRepository;

final class UserRegister
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Email $email, Password $password, Country $country): void
    {
        $this->repository->add($email, $password, $country);
    }
}
