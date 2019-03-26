<?php

declare(strict_types = 1);

namespace Shared\Infrastructure\Slug;

use Cocur\Slugify\Slugify;

final class SlugGenerator
{
    public static function generate(string $slug): string
    {
        $slugify = new Slugify();

        return $slugify->slugify($slug);
    }
}
