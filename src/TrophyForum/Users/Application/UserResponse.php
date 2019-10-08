<?php

declare(strict_types = 1);

namespace TrophyForum\Users\Application;

use TrophyForum\Users\Domain\User;

final class UserResponse
{
    public function __invoke(User $user): array
    {
        return [
            'id'    => $user->id()->value(),
            'email' => $user->email()->value(),
            'token' => $user->token()->value(),
        ];
    }
}
