<?php

declare(strict_types = 1);

namespace Tests\TrophyForum\Posts\Domain;

use Tests\Shared\Domain\ValueObject\StubCreator;
use TrophyForum\Posts\Domain\PostVisualization;

final class PostVisualizationStub
{
    public static function create(int $visualization): PostVisualization
    {
        return new PostVisualization($visualization);
    }

    public static function random(): PostVisualization
    {
        return self::create(StubCreator::random()->numberBetween(0, 1000));
    }
}
