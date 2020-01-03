<?php

declare(strict_types = 1);

namespace TrophyForum\Posts\Infrastructure\Persistence;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Shared\Infrastructure\Doctrine\Types\IntType;
use TrophyForum\Posts\Domain\PostVisualization;

final class PostVisualizationType extends IntType
{
    const NAME = 'post_visualization';

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new PostVisualization((int) $value);
    }
}
