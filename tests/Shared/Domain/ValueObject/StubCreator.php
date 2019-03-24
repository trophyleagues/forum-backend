<?php

declare(strict_types = 1);

namespace Tests\Shared\Domain\ValueObject;

use Faker\Factory;

final class StubCreator
{
    private static $faker;

    protected static function faker()
    {
        return self::$faker = self::$faker ?: Factory::create();
    }

    public static function random()
    {
        return self::faker();
    }
}
