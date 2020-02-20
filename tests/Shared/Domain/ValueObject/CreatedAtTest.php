<?php

declare(strict_types = 1);

namespace Tests\Shared\Domain\ValueObject;

use DateTime;
use Shared\Domain\ValueObject\CreatedAt;
use Tests\TestCase;

final class CreatedAtTest extends TestCase
{
    /** @test */
    function tryBuild(): void
    {
        $dateTime  = new DateTime();
        $createdAt = new CreatedAt($dateTime);

        $this->assertSame($createdAt->value(), $dateTime->format('Y-m-d h:i:s'));
        $this->assertSame($createdAt->dateTime()->format('Y-m-d h:i:s'), $dateTime->format('Y-m-d h:i:s'));
    }
}
