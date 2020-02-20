<?php

declare(strict_types = 1);

namespace Tests\Shared\Domain\ValueObject;

use InvalidArgumentException;
use Shared\Domain\ValueObject\Uuid;
use Tests\TestCase;

final class UuidTest extends TestCase
{
    /** @test */
    function tryCreate(): void
    {
        $uuidStub = UuidStub::random();

        $uuid = new Uuid($uuidStub->value());

        $this->assertSame($uuid->value(), $uuidStub->value());
    }

    /** @test */
    function tryCreateInvalidUuid(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new Uuid('test');
    }
}
