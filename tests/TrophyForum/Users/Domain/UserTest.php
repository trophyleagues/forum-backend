<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\Users\Domain;

use Tests\Shared\Domain\ValueObject\PasswordStub;
use Tests\TestCase;
use TrophyForum\Users\Domain\User;

final class UserTest extends TestCase
{
    /** @test */
    function tryBuild(): void
    {
        $stub = UserStub::random();

        $subForum = new User(
            $stub->id(),
            $stub->email(),
            PasswordStub::random(),
            $stub->token()
        );

        $this->assertSame($stub->id()->value(), $subForum->id()->value());
        $this->assertSame($stub->email()->value(), $subForum->email()->value());
        $this->assertSame($stub->token()->value(), $subForum->token()->value());
    }
}
