<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\Roles\Domain;

use Tests\TestCase;
use TrophyForum\Roles\Domain\Role;

final class RoleTest extends TestCase
{
    /** @test */
    function try_build()
    {
        $stub = RoleStub::random();

        $role = new Role(
            $stub->id(),
            $stub->name(),
            $stub->author()
        );

        $this->assertSame($stub->id()->value(), $role->id()->value());
        $this->assertSame($stub->name()->value(), $role->name()->value());
        $this->assertSame($stub->author()->id()->value(), $role->author()->id()->value());
    }
}
