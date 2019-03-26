<?php

declare(strict_types = 1);

namespace TrophyForum\Roles\Application;

use Doctrine\ORM\PersistentCollection;

final class RolesResponse
{
    public function __invoke(PersistentCollection $roles = null): array
    {
        $response = [];

        if (null === $roles) {
            return $response;
        }

        foreach ($roles as $role) {
            $response[] = (new RoleResponse())->__invoke($role);
        }

        return $response;
    }
}
