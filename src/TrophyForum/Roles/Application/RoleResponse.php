<?php

declare(strict_types = 1);

namespace TrophyForum\Roles\Application;

use TrophyForum\Authors\Application\AuthorResponse;
use TrophyForum\Roles\Domain\Role;

final class RoleResponse
{
    public function __invoke(Role $role): array
    {
        return [
            'name'   => $role->name()->value(),
            'author' => (new AuthorResponse())->__invoke($role->author()),
        ];
    }
}
